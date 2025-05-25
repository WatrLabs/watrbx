<?php
use watrlabs\router\Routing;
use watrlabs\watrkit\sanitize;
use watrlabs\authentication;
use watrbx\gameserver;
use watrbx\sitefunctions;

global $router; // IMPORTANT: KEEP THIS HERE!
global $db;

function create_error($error, $otherstuff = array(), $code = 400){
    header("Content-type: application/json");
    http_response_code($code);
    $array = array(
        "success"=>false,
        "error"=>$error,
        "data"=>$otherstuff
    );
    
    return json_encode($array);
}

function create_success($msg, $otherstuff = array(), $code = 200){
    header("Content-type: application/json");
    http_response_code($code);
    $array = array(
        "success"=>true,
        "msg"=>$msg,
        "data"=>$otherstuff
    );
    
    return json_encode($array);
}

function get_signature($script)
    {
        $signature = "";
        openssl_sign($script, $signature, file_get_contents("../storage/PrivateNut.pem"), OPENSSL_ALGO_SHA1);
        return base64_encode($signature);
    }
 
$router->get('/Login/Negotiate.ashx', function() {
    $auth = $_GET["suggest"] ?? 0;
    setcookie(".ROBLOSECURITY", $auth, time() + 8600, "/", ".watrbx.xyz");
    //setcookie(".ROBLOSECURITY", $session, $expiration, "/", ".watrbx.xyz");
});

$router->get('/Setting/QuietGet/ClientAppSettings/', function() {

});

$router->get("/character-model", function(){
    header("Content-type: application/json");
    die(file_get_contents("../storage/character.json"));
});

$router->get("/avatar-thumbnail-3d/", function(){
    header("Content-type: application/json");
    
    die(file_get_contents("../storage/character.json"));
});

$router->get('/avatar-thumbnail-3d/json', function(){
    // {"Url":"https://web.archive.org/web/20150801002803/http://t5.rbxcdn.com/682ceca48cd03e698aa5e0dc65c758b7","Final":true}

    header("Content-type: application/json");

    $json = array(
        "Url"=>"https://www.watrbx.xyz/avatar-thumbnail-3d/",
        "Final"=>true
    );

    die(json_encode($json));
});

$router->get('/thumbnail/resolve-hash/{the}', function($the){
    // {"Url":"https://web.archive.org/web/20150801002803/http://t5.rbxcdn.com/682ceca48cd03e698aa5e0dc65c758b7","Final":true}

    header("Content-type: application/json");

    $json = array(
        "Final"=>true,
        "Url"=>"https://www.watrbx.xyz/thumbnail/3dfiles/$the",
        "width"=>500,
        "height"=>500
    );

    die(json_encode($json));
});

$router->post('/api/v1/asset-upload', function(){

    $auth = new authentication();

    if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["product"]) && isset($_POST["robux"]) && isset($_POST["robux"]) && isset($_FILES["asset"]) && $auth->hasaccount()){

        $md5 = md5_file($_FILES["asset"]["tmp_name"]);
        global $db;

        $title = htmlspecialchars($_POST["title"]);
        $description = htmlspecialchars($_POST["description"]);
        $robux = (int)$_POST["robux"];
        $tix = (int)$_POST["tix"];
        $prodcategory = $_POST["product"];

        $asset = $db->table("assets")->where("fileid", $md5)->first();

        if($asset == null){

            $info = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);

            $insert = array(
                "prodcategory"=>$prodcategory,
                "name"=>$title,
                "description"=>$description,
                "robux"=>$robux,
                "tix"=>$robux,
                "fileid"=>$md5,
                "created"=>time(),
                "updated"=>time(),
                "owner"=>$info->id
            );

            try {
                
                if(move_uploaded_file($_FILES["asset"]["tmp_name"], "../storage/assets/$md5")){
                    $insertid = $db->table("assets")->insert($insert);
                    die("Asset uploaded with asset id: " . $insertid);
                }

            } catch(ErrorException $e){
                die("Failed to upload asset!");
            }

        } else {
            die("Asset already exists with ID: " . $asset->id);
        }

    } else {
        die("Something was empty.");
    }
});

$router->get('/messages/api/get-messages', function(){
    header("Content-type: application/json");
    echo file_get_contents("../storage/faked.json");
    die();
});

$router->get('/notifications/api/get-notifications', function(){
    header("Content-type: application/json");
    echo file_get_contents("../storage/faked.json");
    die();
});

$router->get('/users/friends/list-json', function(){
    die('{"UserId":1,"TotalFriends":1,"CurrentPage":0,"PageSize":18,"TotalPages":0,"FriendsType":"AllFriends","Friends":[{
      "UserId": 27518438,
      "AbsoluteURL": "/users/27518438/profile/",
      "Username": "watrabi",
      "AvatarUri": "https://watrbx.xyz/images/user.png",
      "AvatarFinal": true,
      "OnlineStatus": {
        "LocationOrLastSeen": "Website",
        "ImageUrl": "~/images/online.png",
        "AlternateText": "watrabi is online."
      },
      "Thumbnail": {
        "Final": true,
        "Url": "https://watrbx.xyz/images/user.png",
        "RetryUrl": null
      },
      "InvitationId": 0,
      "LastLocation": "",
      "PlaceId": null,
      "AbsolutePlaceURL": null,
      "IsOnline": true,
      "InGame": false,
      "InStudio": true,
      "ItemVisible": true,
      "FriendshipStatus": 2
    }]}');
});

$router->get('/catalog/contents', function(){
    die(file_get_contents("../storage/library.html"));
});

$router->get('/messages/api/get-my-unread-messages-count', function(){
    header("Content-type: application/json");
    die('{"count":0}');
});

$router->get('/friends/list', function() {
    header("Content-type: application/jsom");
    die('{"UserId":25044220,"TotalFriends":55,"StartIndex":0,"PageSize":50,"TotalPages":2,"Friends":[{"Id":426672159,"Username":"Fluxta","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/426672159/profile"},{"Id":358014716,"Username":"Alathry","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/358014716/profile"},{"Id":109448917,"Username":"TheHero6965","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/109448917/profile"},{"Id":679992669,"Username":"JReaperzTTV","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/679992669/profile"},{"Id":322351834,"Username":"drdnhs","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/322351834/profile"},{"Id":676791560,"Username":"beardotheweirdz","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/676791560/profile"},{"Id":667131446,"Username":"HackManWatch","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/667131446/profile"},{"Id":263240293,"Username":"hamburgerdude0","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/263240293/profile"},{"Id":252740159,"Username":"Seb123rock","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/252740159/profile"},{"Id":24752210,"Username":"jadynashley","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/24752210/profile"},{"Id":59398409,"Username":"IIPastel_RoseII","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/59398409/profile"},{"Id":83290061,"Username":"yummypopcorn54321","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/83290061/profile"},{"Id":271208335,"Username":"SMOKERgramps","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/271208335/profile"},{"Id":209100560,"Username":"MelonMoose2","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/209100560/profile"},{"Id":67028283,"Username":"ImperialCarnage","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/67028283/profile"},{"Id":98099622,"Username":"JamProYT","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/98099622/profile"},{"Id":121165009,"Username":"TrustyXIV","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/121165009/profile"},{"Id":87501651,"Username":"CrazyJay07","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/87501651/profile"},{"Id":273218673,"Username":"comeatmebro1234510","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/273218673/profile"},{"Id":296037216,"Username":"africantomato","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/296037216/profile"},{"Id":102625626,"Username":"xTechComputerXTechyy","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/102625626/profile"},{"Id":42627082,"Username":"Mitchcactus","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/42627082/profile"},{"Id":107764294,"Username":"poncok","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/107764294/profile"},{"Id":73859257,"Username":"flopness","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/73859257/profile"},{"Id":38106669,"Username":"xxEmilyyx","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/38106669/profile"},{"Id":36677371,"Username":"Forgotten_Doodlez","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/36677371/profile"},{"Id":94203733,"Username":"Tamyaki","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/94203733/profile"},{"Id":45228602,"Username":"mamakse","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/45228602/profile"},{"Id":58017047,"Username":"foggy6699","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/58017047/profile"},{"Id":43948391,"Username":"qdav","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/43948391/profile"},{"Id":82148828,"Username":"kalil2908","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/82148828/profile"},{"Id":126876155,"Username":"Mediums","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/126876155/profile"},{"Id":8403307,"Username":"railworks2","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/8403307/profile"},{"Id":86922446,"Username":"xxSTARSxx123","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/86922446/profile"},{"Id":96627390,"Username":"Tonayee","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/96627390/profile"},{"Id":64433413,"Username":"truker8","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/64433413/profile"},{"Id":16928186,"Username":"HttpTrish","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/16928186/profile"},{"Id":5596064,"Username":"will_ie","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/5596064/profile"},{"Id":17505355,"Username":"fancysallyrocks","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/17505355/profile"},{"Id":97782784,"Username":"XFriez","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/97782784/profile"},{"Id":105311303,"Username":"ResetMyLife","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/105311303/profile"},{"Id":31074913,"Username":"CirthonBeans","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/31074913/profile"},{"Id":73306558,"Username":"i_CodexLaw","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/73306558/profile"},{"Id":29584378,"Username":"iiDev_Waffle","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/29584378/profile"},{"Id":55876546,"Username":"pranav119","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/55876546/profile"},{"Id":57747013,"Username":"kitty17music","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/57747013/profile"},{"Id":48405917,"Username":"GraphicsSettings","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/48405917/profile"},{"Id":97121949,"Username":"iiLizzieIsHereii","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/97121949/profile"},{"Id":76451709,"Username":"xX9maryse9Xx","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/76451709/profile"},{"Id":85250556,"Username":"robloxgirl213085","UserProfileLink":"https://web.archive.org/web/20180830064736/https://www.roblox.com/users/85250556/profile"}]}');
});

$router->get('/presence/users', function() {
    header("Content-type: application/jsom");
    json_encode(array());
    die();
});

$router->post('/game-instances/shutdown', function(){
    global $db;
    $auth = new authentication();
    $gameserver = new gameserver();

    if(isset($_POST["placeId"]) && isset($_POST["gameId"]) && $auth->hasaccount()){
        $placeid = $_POST["placeId"];
        $jobid = $_POST["gameId"];

        $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]); // TODO: Check for group access as well ( Implement $auth->hasperm($userid, $assetid) )
        $assetinfo = $db->table("assets")->where("id", $placeid)->first();

        if($userinfo->id == $assetinfo->owner){
            if($gameserver->end_job($jobid)){
                die(create_success("Game shutdown requested.", '', 200));
            } else {
                die(create_error("Failed to shutdown game!", '', 500));
            }
        } else {
            die(create_error("You don't have the authorization to do this!", '', 403));
        }

    } else {
        die(create_error("You're not authenticated or something wasn't posted!", '', 400));
    }
});

$router->get('/api/v1/all-gameservers', function(){
    $gs = new gameserver();
    $allgameservers = $gs->get_gameservers();
    header("Content-type: application/json");
    
    if($allgameservers == null){
        die(create_error("Failed to get gameservers!", "", 500));
    } else {
        die(json_encode($allgameservers));
    }
});

$router->get('/games/getgameinstancesjson', function() {
    header("Content-type: Application/json");
    // stolen afterworld response
    //die('{"PlaceId":1,"ShowShutdownAllButton":true,"Collection":[{"Capacity":50,"ShowSlowGameMessage":false,"Guid":"17be-fb-ff-40-1efc148","PlaceId":1,"CurrentPlayers":[{"Id":290,"Username":"p2p","Thumbnail":{"rowId":0,"rowHash":null,"rowTypeId":0,"Url":"http:\/\/www.aftwld.xyz\/Thumbs\/Avatar.ashx?userId=128&x=75&y=75","IsFinal":true}}],"UserCanJoin":false,"ShowShutdownButton":true,"JoinScript":"Roblox.GameLauncher.joinGameInstance(1, \'17be-fb-ff-40-1efc148\');"}],"TotalCollectionSize":1}'); 
    if(isset($_GET["placeId"])){
        $placeid = (int)$_GET["placeId"];
        $auth = new authentication();

        global $db;
        $allservers = $db->table("game_instances")->where("placeid", $placeid)->get();

        $json = array(
            "PlaceId" => "$placeid",
            "ShowShutdownAllButton" => true,
            "Collection" => array(),
            "TotalCollectionSize" => 0
        );

        foreach($allservers as $server){

            $playerlist = array();
            $allplayers = $db->table("activeplayers")->where("jobid", $server->serverguid)->where("placeid", $server->placeid)->get();

            $playerList = array();

            foreach ($allplayers as $playerthing) {
                $userinfo = $auth->getuserbyid($playerthing->userid);
                $playerList[] = array(
                    "Id" => $userinfo->id,
                    "Username" => $userinfo->username,
                    "Thumbnail" => array(
                        "rowId" => 0,
                        "rowHash" => null,
                        "rowTypeId" => 0,
                        "Url" => "http://www.watrbx.xyz/usersmall.png",
                        "IsFinal" => false
                    )
                );
            }

            $json['Collection'][] = array(
                "Capacity"=>10,
                "ShowSlowGameMessage"=>false,
                "Guid"=>$server->serverguid,
                "PlaceId"=>$server->placeid,
                "CurrentPlayers"=>$playerList,
                "UserCanJoin"=>true,
                "ShowShutdownButton"=>false,
                "JoinScript"=>"",
            );
        }

        $json['TotalCollectionSize'] = count($json['Collection']);

        die(json_encode($json));
    }

});

$router->post('/voting/vote', function(){
    header("Content-type: application/json");

    global $db;

    $auth = new authentication();

    if(isset($_GET["assetId"]) && isset($_GET["vote"])){
        $assetid = $_GET["assetId"];
        $vote = $_GET["vote"];

        $response = [
            "Success" => true,
            "Model" => [
                "UpVotes" => null,
                "DownVotes" => null,
                "UserVote" => null
            ]
        ];
            
        if($auth->hasaccount()){
            $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);
            
            if($vote == "null"){
                $db->table("likes")->where("assetid", $assetid)->where("user", $userinfo->id)->delete();

                $upvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 1)->count();
                $downvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 0)->count();
                
                $response["Model"]["UpVotes"] = $upvotes;
                $response["Model"]["DownVotes"] = $downvotes;
                $response["Model"]["UserVote"] = null;

                die(json_encode($response));
            } else {
                $vote = filter_var($_GET['vote'] ?? null, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

                $hasvoted = $db->table("likes")->where("user", $userinfo->id)->where("assetid", $assetid)->first();

                if($hasvoted !== null){
                    if($hasvoted->vote == $vote){
                        $upvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 1)->count();
                        $downvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 0)->count();

                        $response["Model"]["UpVotes"] = $upvotes;
                        $response["Model"]["DownVotes"] = $downvotes;
                        $response["Model"]["UserVote"] = $vote;

                        die(json_encode($response));
                    } else {
                        $update = array(
                            "vote"=>$vote
                        );

                        $db->table("likes")->where("assetid", $assetid)->where("user", $userinfo->id)->update($update);

                        $upvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 1)->count();
                        $downvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 0)->count();

                        $response["Model"]["UpVotes"] = $upvotes;
                        $response["Model"]["DownVotes"] = $downvotes;
                        $response["Model"]["UserVote"] = $vote;

                        die(json_encode($response));

                    }
                }

                $insert = array(
                    "assetid"=>$assetid,
                    "vote"=>$vote,
                    "user"=>$userinfo->id
                );

                $db->table("likes")->insert($insert);

                $upvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 1)->count();
                $downvotes = $db->table("likes")->where("assetid", $assetid)->where("vote", 0)->count();

                $response["Model"]["UpVotes"] = $upvotes;
                $response["Model"]["DownVotes"] = $downvotes;
                $response["Model"]["UserVote"] = $vote;

                die(json_encode($response));
            }
        }

    } else {
        $error_array = array(
            "Success"=>false,
            "ModalType"=>"login"
        );

        die(json_encode($error_array));
    }
});

$router->get('/private-server/instance-list-json', function() {
    header("Content-type: Application/json");
    die('{"Instances": [], "CurrentPage": 1, "TotalPages": 1 }'); 
});

$router->get('/game/getauthticket', function() {
   die($_COOKIE["_ROBLOSECURITY"]); 
});

$router->post('/client-status/set', function(){
    
});

$router->post('/Game/PlaceLauncher.ashx', function() {
    header("Content-type: application/json");
   $placelauncher = array(
        "jobid"=>"null",
        "status"=>0,
        "joinScriptUrl"=>"null",
        "authenticationUrl"=>"http://www.roblox.icu/Login/Negotiate.ashx",
        "authenticationTicket"=>"null",
        "message"=>"Hi!"
    ); 
    
    //$placelauncher["jobid"] = "Test";
    //$placelauncher["status"] = 2;
    //$placelauncher["joinScriptUrl"] = "http://www.watrbx.xyz/Game/Join.ashx?user=watrabi&ip=127.0.0.1&id=420&port=7894&capp=1&mship=BuildersClub&PlaceId=1";
    
    $gameserver = new gameserver();

    global $db;

    if(!$gameserver->get_closest_server()){
        http_response_code(503);
        $placelauncher["status"] = -1;
    }else {
        if(isset($_GET["placeId"])){
            global $db;
            $auth = new authentication();

            if($auth->hasaccount()){

                $placeid = (int)$_GET["placeId"];

                $gameinstance = $db->table("game_instances")->where("placeid", $placeid)->first();

                if($gameinstance !== null){

                    $func = new sitefunctions();
                    $placelauncher["status"] = 2;

                    $jobid = $gameinstance->serverguid;

                    $jobinfo = $db->table("jobs")->where("jobid", $jobid)->first();
                    $server_info = $db->table("servers")->where("server_id", $jobinfo->server)->first();

                    $port = $jobinfo->port;
                    $ip = $server_info->ip;
                    $joincode = $func->genstring(25);

                    $joinarray = array(
                        "code"=>$joincode,
                        "ip"=>$ip,
                        "port"=>$port,
                        "placeid"=>$placeid
                    );
                    
                    $db->table("join_codes")->insert($joinarray);

                    $placelauncher["jobid"] = $jobid;

                    $placelauncher["joinScriptUrl"] = "http://www.watrbx.xyz/Game/Join.ashx?joincode=" . $joincode;
                    
                } else {

                    $job = $db->table("jobs")->where("assetid", $placeid)->first();

                    if($job !== null){
                        //$gameserver->request_game($placeid);
                        $placelauncher["status"] = 1;
                    } else {
                        if($gameserver->request_game($placeid) !== false){
                                $placelauncher["status"] = 0;
                            } else {
                                var_dump($gameserver->request_game($placeid));
                            http_response_code(503);
                            $placelauncher["status"] = 0;
                            die("No gameservers available");
                        }
                        
                    } 
                }

            } else {
                $placelauncher["status"] = 12;
                http_response_code(401);
                die(json_encode($placelauncher));
            }
        } else {
            http_response_code(400);
            die(json_encode($placelauncher));
        }
    }

    die(json_encode($placelauncher));
});

$router->get('/leaderboards/rank/json', function(){
    header("Content-type: application/json");
    die("[]");
});

$router->get('/leaderboards/game/json', function(){
    header("Content-type: application/json");
    die('[]');
}); 

$router->get('/Character.aspx', function(){
    die("http://www.watrbx.xyz/Asset/BodyColors.ashx?userid=1;http://www.watrbx.xyz/asset/?id=5;http://www.watrbx.xyz/asset/?id=7;http://www.watrbx.xyz/asset/?id=10;");
});

$router->get('/users/inventory/list-json', function(){
    header("Content-type: application/json");
    die(file_get_contents("../storage/thing.json"));
});

$router->get('/users/inventory/recommended-json', function(){
    header("Content-type: application/json");
    die(file_get_contents("../storage/recomended.json"));
});

$router->get('/Game/Join.ashx', function() {

    $auth = new authentication();
    global $db;
    
    if(isset($_GET["joincode"]) && $auth->hasaccount()){

        $code = $_GET["joincode"];
        $joincode = $db->table("join_codes")->where("code", $code)->first();

        $userinfo = $auth->getuserinfo($_COOKIE["_ROBLOSECURITY"]);

        $ip = $joincode->ip;
        if($ip == "192.168.1.221"){
            $ip = "70.228.127.12";
        }
        $port = $joincode->port;
        $pid = $joincode->placeid;

        header("Content-Type: application/json");
        // Construct joinscript
        $joinscript = [
            "ClientPort" => 0,
            "MachineAddress" => $ip,
            "ServerPort" => $port,
            "PingUrl" => "",
            "PingInterval" => 20,
            "UserName" => $userinfo->username,
            "SeleniumTestMode" => false,
            "UserId" => $userinfo->id,
            "SuperSafeChat" => false,
            "CharacterAppearance" => "https://www.watrbx.xyz/Character.aspx",
            "ClientTicket" => "",
            "GameId" => $pid,
            "PlaceId" => $pid,
            "MeasurementUrl" => "", // No telemetry here :)
            "WaitingForCharacterGuid" => "26eb3e21-aa80-475b-a777-b43c3ea5f7d2",
            "BaseUrl" => "http://www.watrbx.xyz/",
            "ChatStyle" => "ClassicAndBubble",
            "VendorId" => "0",
            "ScreenShotInfo" => "",
            "VideoInfo" => "",
            "CreatorId" => "3333",
            "CreatorTypeEnum" => "User",
            "MembershipType" => "None",
            "AccountAge" => "3000000",
            "CookieStoreFirstTimePlayKey" => "rbx_evt_ftp",
            "CookieStoreFiveMinutePlayKey" => "rbx_evt_fmp",
            "CookieStoreEnabled" => true,
            "IsRobloxPlace" => false,
            "GenerateTeleportJoin" => false,
            "IsUnknownOrUnder13" => false,
            "SessionId" => "39412c34-2f9b-436f-b19d-b8db90c2e186|00000000-0000-0000-0000-000000000000|0|190.23.103.228|8|2021-03-03T17:04:47+01:00|0|null|null",
            "DataCenterId" => 0,
            "UniverseId" => 3,
            "BrowserTrackerId" => 0,
            "UsePortraitMode" => false,
            "FollowUserId" => 0,
            "characterAppearanceId" => 1
        ];

        // Encode it!
        $data = json_encode($joinscript, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);

        // Sign joinscript
        $signature = get_signature("\r\n" . $data);

        // exit
        exit("--rbxsig%". $signature . "%\r\n" . $data);
    } else {
        http_response_code(400);
        die();
    }
    
});




$router->get("/UserCheck/checkifinvalidusernameforsignup", function() {
    header("Content-type: application/json");
    
    // 0 = All Good
    // 1 = Already Taken
    // 2 = Can't Be Used
    // 3 + All Good
    
    if(isset($_GET["username"])){
        
        $sanitize = new sanitize;
        
        $username = $sanitize::get($_GET["username"]);
        
        $func = new sitefunctions();
        if($func::isbadtext($username)){
            echo json_encode(array("data"=>2));
            die();
        }

        global $db;
        $query = $db->table('users')->where('username', '=', $username);
        $row = $query->first();
    
        if($row == null){
            $data = 0;
        } else {
            $data = 1;
        }
        
        
        echo json_encode(array("data"=>0));
    } else {
        echo json_encode(array("data"=>2));
    }
});

$router->post('/api/v1/login', function() {
    if(isset($_POST["username"]) && isset($_POST["password"]) || isset($_POST["Username"]) && isset($_POST["Password"])){
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
        } elseif(isset($_POST["Username"]) && isset($_POST["Password"])){
            $username = $_POST["Username"];
            $password = $_POST["Password"];
        } else {
            die(create_error("Something wasn't posted!"));
        }
        
        // why not just change the post values? 
        
        // I'm Crazy.
        
        $auth = new authentication();
        
        $result = $auth->login($username, $password);
        
        if($result["code"] == 200){
            create_success("Succesfully Logged In!");
            header("Location: /home");
            die();
        } else {
            die(create_error($result["message"]));
        }
        
    } else {
        die(create_error("Something wasn't posted!"));
    }
});

$router->post('/api/v1/verify-captcha', function(){
    if(isset($_POST["captcha"])){
        
        $auth = new authentication();
        $func = new sitefunctions();
        $captchatoken = $_POST["captcha"];
        
        if($auth::verifycaptcha($captchatoken)){
            global $db;
            
            $ip = $func->getip(true);
            $token = $func->genstring(25);
            $expiration = time() + 8600;
            
            $insert = array(
                "token"=>$token,
                "time"=>$expiration,
                "ip"=>$ip
            );
            
            $db->table("captchaverified")->insert($insert);
            
            die(create_success("Captcha Verified!", array("token"=>$token)));
            
        } else {
            die(create_error("The captcha provided is invalid!"));
        }
        
    } else {
        die(create_error("No captcha was provided!"));
    }
});

$router->post('/api/v1/signup', function() {

    if(!$_ENV["CAN_REGISTER"]){
        die(create_error("Register is disabled."));
    }
    
    if( isset($_POST["username"]) && isset($_POST["password"])){
        
        global $db;
        
        // gender 0 = didn't specify
        // gender 1 = female
        // gender 2 = male
        
        $token = $_COOKIE["token"];
        $username = $_POST["username"];
        $pass = $_POST["password"];
        $gender = null;
        
        if(isset($_POST["gender"])){
            $gender = (int)$_POST["gender"];
        }
        
        $query = $db->table("captchaverified")->where("token", $token);
        $token = $query->first();
        
        if($token !== null){
            
            if(!$token->time < time()){
                $auth = new authentication();
                $result = $auth->createuser($username, $pass, $gender);
                
                if($result["code"] == 200){
                    die(create_success("Account Created!"));
                } else {
                    die(create_error($result["message"], "", $result["code"]));
                }
            } else {
                $db->table("captchaverified")->where("token", $token)->delete();
                die(create_error("Captcha session provided is invalid."));
            }
            
            
        } else {
            die(create_error("Captcha session provided is invalid."));
        }
        
    } else {
        die(create_error("Something wasn't provided."));
    }
    
});