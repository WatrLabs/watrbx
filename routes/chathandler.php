<?php
use watrlabs\router\Routing;
use watrlabs\authentication;
use watrbx\thumbnails;
$thumbs = new thumbnails();

use watrbx\relationship\friends;
global $router; // IMPORTANT: KEEP THIS HERE!

function add_cors(){
    header('Access-Control-Allow-Origin: https://watrbx.wtf');
    header('Access-Control-Allow-Origin: https://www.watrbx.wtf');
    header('Access-Control-Allow-Credentials: true');
}

$router->get('/presence/user', function(){
    header('Access-Control-Allow-Origin: https://www.watrbx.wtf');
    header('Access-Control-Allow-Origin: https://watrbx.wtf');
    header('Access-Control-Allow-Credentials: true');

    die('{"UserPresenceType": 1}');
});

$router->get('/friends/list', function(){

    header("Content-type: application/json");
    header('Access-Control-Allow-Origin: https://www.watrbx.wtf');
    header('Access-Control-Allow-Origin: https://watrbx.wtf');
    header('Access-Control-Allow-Credentials: true');
    $auth = new authentication();
    $friends = new friends();

    if($auth->hasaccount()){
        if(isset($_GET["userId"])){

            $userid = (int)$_GET["userId"];

            $response = array(
                "Friends"=>[],
            );

            $allfriends = $friends->get_friends($userid);
                foreach ($allfriends as $friend){
                    $response["Friends"][] = [
                        "Id" => $friend->id,
                        "Username" => $friend->username,
                        "IsOnline" => true,
                        "AvatarThumb" => [
                            "Final" => true,
                            "Url" => "https://www.watrbx.wtf/images/defaultimage.png"
                        ],
                        "UserPresenceType"=>1,
                    ];
                }
                $response["TotalFriends"] = count($allfriends);
                die(json_encode($response));
            
        }
        
    }

});


$router->get('/thumbnail/avatar-headshot',function(){
    die('{"Url": "https://www.watrbx.wtf/images/defaultimage.png", "Final": true }');
});

$router->get('/thumbnail/avatar-headshots',function(){

    $result = [];
    $thumbs = new thumbnails();

    parse_str($_SERVER['QUERY_STRING'], $params);
    foreach (explode('&', $_SERVER['QUERY_STRING']) as $part) {
        if (str_starts_with($part, 'userIds=')) {
            $userIds[] = substr($part, strlen('userIds='));
        }
    }

    if(isset($userIds)){
        foreach ($userIds as $userId){
            $thumb = $thumbs->get_user_thumb($userId, "512x512", "headshot");

            $result[] = [
                "Url"=>$thumb,
                "Final"=>true
            ];

        }
        header("Content-type: application/json");
        die(json_encode($result));
    }
    header("Content-type: application/json");
    die('[{"Url": "https://www.watrbx.wtf/images/defaultimage.png", "Final": true }]');
});

$router->group('/v1.0', function($router) {
    
    $router->get("/get-unread-conversation-count", function () {
        echo "1"; // implement...
    });

    $router->options("/start-one-to-one-conversation", function(){
        header("Access-Control-Allow-Origin: https://www.watrbx.wtf");
        header('Access-Control-Allow-Origin: https://watrbx.wtf');
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, x-csrf-token");
        header("Access-Control-Allow-Methods: POST, OPTIONS");
        http_response_code(200);
        die();
    });



    $router->post("/start-one-to-one-conversation", function(){
        $auth = new authentication();

        $post = file_get_contents('php://input');
        $decoded = json_decode($post, true);

        if(isset($decoded["participantUserId"]) && $auth->hasaccount()){
            $otheruser = (int)$decoded["participantUserId"];
            $otheruserinfo = $auth->getuserbyid($otheruser);

            global $currentuser;
            global $db;

            $insertid = $db->table("coversations")->insert(["isGC"=>false]);

            $participantsinsert = [
                [
                    "userid"=>$otheruserinfo->id,
                    "convoid"=>$insertid
                ],
                [
                    "userid"=>$currentuser->id,
                    "convoid"=>$insertid
                ]
            ];

            $db->table("convo_participants")->insert($participantsinsert);

            $return = [
                "Id"=> "$insertid",
                "ParticipantUsers"=> [
                  [ "Id"=> $otheruserinfo->id, "Username"=> $otheruserinfo->username ],
                  [ "Id"=> $currentuser->id, "Username"=> $currentuser->username ]
                ],
                "IsGroupChat"=> false
            ];

            header('Access-Control-Allow-Origin: https://www.watrbx.wtf');
            header('Access-Control-Allow-Origin: https://watrbx.wtf');
            header('Access-Control-Allow-Credentials: true');

            die(json_encode($return));

        } else {
            http_response_code(401);
            die();
        }
    });

    $router->get('/multi-get-latest-messages', function(){
        die('{}');
    });

    $router->get('/party/get-current', function(){
        die("{}");
    });

    $router->get('/party/get-parties-for-conversations', function(){
        die('[]');
    });

    $router->options("/send-message", function(){
        header("Access-Control-Allow-Origin: https://www.watrbx.wtf");
        header('Access-Control-Allow-Origin: https://watrbx.wtf');
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, x-csrf-token");
        header("Access-Control-Allow-Methods: POST, OPTIONS");
        http_response_code(200);
        die();
    });


    $router->post('/send-message', function(){
        $auth = new authentication();

        global $db;
        global $currentuser;

        $post = file_get_contents('php://input');
        $decoded = json_decode($post, true);

        if(isset($decoded["conversationId"]) && isset($decoded["message"]) && $auth->hasaccount()){
            $convoid = $decoded["conversationId"];
            $message = $decoded["message"];
            $time = time();

            $allparticipants = $db->table("convo_participants")->where("convoid", $convoid)->where("userid", $currentuser->id)->get();

            if(!empty($allparticipants)){
                $insert = [
                    "content"=>$message,
                    "userid"=>$currentuser->id,
                    "convoid"=>$convoid,
                    "date"=>$time
                ];

                $insertid = $db->table("convo_messages")->insert($insert);

                $response = [
                    "Id"=>$insertid,
                    "ConversationId"=>$convoid,
                    "SenderUserId"=>$currentuser->id,
                    "Content"=>$message,
                    "Sent"=>date("c", $time),
                ];

                header("Content-type: application/json");

                die(json_encode($response));

            } else {
                http_response_code(403);
                die();
            }

        } else {
            http_response_code(400);
            die();
        }

    });

    $router->get('/get-messages', function(){
        if(isset($_GET["conversationId"]) && isset($_GET["pageSize"])){
            $convoid = $_GET["conversationId"];
            $pagesize = $_GET["pageSize"];

            global $db;
            global $currentuser;

            $response = [];

            $convoinfo = $db->table("coversations")->where("id", $convoid)->first();

            if($convoinfo !== null){
                $allparticipants = $db->table("convo_participants")->where("convoid", $convoid)->where("userid", $currentuser->id)->get();

                if(!empty($allparticipants)){
                    $allmessages = $db->table("convo_messages")->where("convoid", $convoid)->orderBy("id", "DESC")->get();

                    foreach($allmessages as $message){
                        $response[] = [
                            "Id"=>$message->id,
                            "ConversationId"=>$message->convoid,
                            "SenderUserId"=>$message->userid,
                            "Content"=>htmlspecialchars($message->content),
                            "Sent"=>date('c', $message->date),
                            "Read"=>false
                        ];
                    }

                    header("Content-type: application/json");
                    die(json_encode($response));

                } else {
                    http_response_code(403);
                    die();
                }

            } else {
                http_response_code(404);
                die();
            }

        }
    });

    $router->get("/get-user-conversations", function () {
        // this is a fucking mess.
        header("Content-type: application/json");
        $auth = new authentication();
        $friends = new friends();

        if($auth->hasaccount()){

            global $db;
            global $currentuser;

            $response = [];
            $allparticipantsarray = [];

            $participantof = $db->table("convo_participants")->where("userid", $currentuser->id)->get();

            foreach ($participantof as $participant){
                $convoinfo = $db->table("coversations")->where("id", $participant->convoid)->first();
                $allparticipants = $db->table("convo_participants")->where("convoid", $participant->convoid)->get();
                foreach ($allparticipants as $otherparticipant){
                    $otherparticipantinfo = $auth->getuserbyid($otherparticipant->userid);
                    $allparticipantsarray[] = [
                        "Id"=>$otherparticipant->userid,
                        "Username"=>$otherparticipantinfo->username
                    ];
                }
                
                $response[]= [
                    "Id" => $convoinfo->id,
                    "ParticipantUsers"=>$allparticipantsarray,
                    "IsGroupChat"=>$convoinfo->isGC
                ];
                
            }

            die(json_encode($response));

        }
    });
    
}, 'add_cors');