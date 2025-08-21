<?php
use watrlabs\router\Routing;
use watrlabs\authentication;

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get("/mobileapi/check-app-version", function() {
    header("Content-type: applcation/json");
    die('{"data":{"UpgradeAction":"None"}}');
});

$router->post('/mobileapi/login', function(){
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
                $loginarray["UserInfo"]["UserName"] = $userinfo->username;
                $loginarray["UserInfo"]["RobuxBalance"] = $userinfo->robux;
                $loginarray["UserInfo"]["TicketsBalance"] = $userinfo->tix;
                $loginarray["UserInfo"]["UserID"] = $userinfo->id;
            }
        }

        die(json_encode($loginarray));
    } else {
        die('{
  "errors": [
    {
      "code": 1,
      "message": "Somethings not right"
    }
  ]
}');
    }
});

$router->get("/device/initialize", function() {
    header("Content-type: applcation/json");
    die('{"browserTrackerId":1234567890,"appDeviceIdentifier":null}'); 
});

$router->post("/device/initialize", function() {
    header("Content-type: applcation/json");
    die('{"browserTrackerId":1234567890,"appDeviceIdentifier":null}'); 
});

$router->get('/sponsoredpage/list-json', function(){
    header("Content-type: application/json");
    die('{"success":true}');
});