<?php
use watrlabs\router\Routing;
use watrlabs\authentication;

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get("/mobileapi/check-app-version", function() {
    header("Content-type: applcation/json");
    die('{"data":{"UpgradeAction":"None"}}');
});

$router->post('/mobileapi/login', function(){
    
    $errorresponse = [
        "Status"=>""
    ];

    if(isset($_POST["username"]) && isset($_POST["password"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $loginarray = array(
            "Status"=>"OK",
            "UserInfo"=> array(
                "UserName"=>"Username",
                "RobuxBalance"=>"100",
                "TicketsBalance"=>"200",
                "IsAnyBuildersClubMember"=>false,
                "ThumbnailUrl"=>"",
                "UserID"=>""
            ),
        );

        $auth = new authentication();

        $result = $auth->login($username, $password);
        global $db;
        if(isset($result["code"])){
            if($result["code"] == 200){
                $userinfo = $db->table("users")->where("username", $username)->first();

                $banresult = $auth->is_banned($userinfo->id);
                
                if($banresult == false){
                    $loginarray["UserInfo"]["UserName"] = $userinfo->username;
                    $loginarray["UserInfo"]["RobuxBalance"] = $userinfo->robux;
                    $loginarray["UserInfo"]["TicketsBalance"] = $userinfo->tix;
                    $loginarray["UserInfo"]["UserID"] = $userinfo->id;

                    die(json_encode($loginarray));
                } else {
                    $baninfo = $auth->get_ban_info($banresult);
                    $errorresponse["Status"] = "AccountNotApproved";
                    $errorresponse["PunishmentInfo"] = [
                        "PunishmentType"=>$auth->convert_ban_types($baninfo),
                        "MessageToUser"=>$baninfo->moderatornote,
                        "BeginDateString"=>date('n/j/Y g:i:s A', $baninfo->reviewed),
                        "EndDateString"=>date('n/j/Y g:i:s A', $baninfo->banneduntil),
                    ];
                    $errorresponse["UserInfo"]["UserName"] = $userinfo->username;
                    $errorresponse["UserInfo"]["RobuxBalance"] = $userinfo->robux;
                    $errorresponse["UserInfo"]["TicketsBalance"] = $userinfo->tix;
                    $errorresponse["UserInfo"]["UserID"] = $userinfo->id;
                    die(json_encode($errorresponse));
                }
            } else {
                http_response_code(400);
                $errorresponse["Status"] = "InvalidPassword";
                die(json_encode($errorresponse));
            }
        } else {
            http_response_code(400);
            $errorresponse["Status"] = "BadCookieTryAgain";
            die(json_encode($errorresponse));
        }

        die(json_encode($loginarray));
    } else {
        http_response_code(400);
        $errorresponse["Status"] = "MissingRequiredField";
        die(json_encode($errorresponse));
    }
});

$router->get("/device/initialize", function() {
    header("Content-type: applcation/json");
    die('{"browserTrackerId":1234567890,"appDeviceIdentifier":null}'); 
});

// TODO: Implement this
$router->post("/device/initialize", function() {
    header("Content-type: applcation/json");
    die('{"browserTrackerId":1234567890,"appDeviceIdentifier":null}'); 
});

// TODO: Make this for events
$router->get('/sponsoredpage/list-json', function(){
    header("Content-type: application/json");
    die('[]'); // why?
});