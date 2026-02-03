<?php
    use watrlabs\router\Routing;
    use watrlabs\authentication;
    use watrlabs\watrkit\pagebuilder;

    $pagebuilder = new pagebuilder();
    $router = new Routing();
    $auth = new authentication();

    global $db;

    if(isset($_GET["ticket"]) || isset($ticket)){
        
        if(!isset($ticket)){
            $ticket = $_GET["ticket"];
        }

        $ticketInfo = $db->table("password_tickets")->where("ticket", $ticket)->first();

        if(!$ticketInfo){
            $router->return_status(404);
            die();
        }

        $userinfo = $auth->getuserbyid($ticketInfo->userid);

    } else {
        if(!$ticketInfo){
            $router->return_status(404);
            die();
        }
    }

?>

<style>
    * {
        font-family: Tahoma;
    }

    #main {
        width: 50%;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<div id="main">
    <h1>Temporary password reset</h1>
    <small>this is temporary till the <s>develop page</s> new site is done</small>
    <br><br>
    <?php
        if(isset($message)){
            $pagebuilder->build_component("status", ["status"=>"error", "msg"=>$message]);
        }
    ?>
    <small><i>Reset the password to your <?=$userinfo->username?> account.</i></small>
    <br>
    <form method="POST" action="/api/v1/change-password">
        <input type="ticket" name="ticket" value="<?=$ticket?>" style="display: none;">
        <input type="password" name="password" placeholder="New Passowrd" required/><br><br>
        <input type="password" name="confpass" placeholder="Confirm Passowrd" required/><br><br>
        <button>Change Password</button>
    </form>
</div>