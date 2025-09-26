<?php
use watrlabs\router\Routing;
use watrlabs\authentication;
use watrlabs\watrkit\pagebuilder;
use watrlabs\watrkit\sanitize;
use watrbx\forums;

global $router; // IMPORTANT: KEEP THIS HERE!

$router->get("/forum", function() {
    $page = new pagebuilder;
    $page::get_template("forum/index");
});

$router->get('/Forum/Moderate/DeletePost.aspx', function(){

    global $currentuser;
    global $db;

    if(isset($_GET["PostID"]) && $currentuser !== null){
        $postId = (int)$_GET["PostID"];

        if($currentuser->is_admin == 1){
            $db->table("forum_posts")->where("id", $postId)->delete();
            header("Location: /forum/");
        }

    }

});

$router->get('/Forum/Moderate/DeleteReply.aspx', function(){

    global $currentuser;
    global $db;

    if(isset($_GET["ReplyId"]) && $currentuser !== null){
        $ReplyId = (int)$_GET["ReplyId"];

        if($currentuser->is_admin == 1){
            $db->table("forum_replies")->where("id", $ReplyId)->delete();
            header("Location: /forum/");
        }

    }

});

$router->get("/Forum/Default.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("forum/index");
});

$router->get("/Forum/ShowForum.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("forum/showforum");
});

$router->get("/Forum/AddPost.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("forum/AddPost");
});

$router->get("/Forum/NewReply.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("forum/AddReply");
});

$router->post("/Forum/NewReply.aspx", function() {
    $page = new pagebuilder;
    $forums = new forums;
    global $db;
    global $currentuser;
    
    if(isset($_POST["section_id"]) && isset($_POST["content"]) && $currentuser){
        $content = htmlspecialchars($_POST["content"]);
        $replyid = (int)$_POST["section_id"];

        $postinfo = $forums->getPostInfo($replyid);

        if(!$postinfo){
            $page::get_template("forum/AddReply", ["message"=>"This forum doesn't exist!"]);
            die();
        }

        if(strlen($content) > 50000){
            $page::get_template("forum/AddReply", ["message"=>"Your content is more than 50,000 characters!"]);
            die();
        }

        if($postinfo->CanReply !== 1){
            $page::get_template("forum/AddReply", ["message"=>"You cannot reply to this post!"]);
            die();
        }

        $ratelimit = time() - 30; // this is really generous

        $created = $db->table("forum_replies")->where("userid", $currentuser->id)->where("date", ">", $ratelimit)->count();

        if($created > 2){
            http_response_code(429);
            $page::get_template("forum/AddReply", ["message"=>"You're posting too fast!"]);
            die();
        }

        $insert = [
            "content"=>$content,
            "userid"=>$currentuser->id,
            "parent"=>$replyid,
            "categoryid"=>$postinfo->parent,
            "date"=>time()
        ];

        $insertid = $db->table("forum_replies")->insert($insert);
        header("Location: /Forum/ShowPost.aspx?PostID=$replyid");
        
    }

});

$router->post("/Forum/AddPost.aspx", function() {
    $page = new pagebuilder;
    $forums = new forums;
    global $db;
    global $currentuser;
    
    if(isset($_POST["section_id"]) && isset($_POST["title"]) && isset($_POST["content"]) && $currentuser){
        $title = htmlspecialchars($_POST["title"]);
        $content = htmlspecialchars($_POST["content"]);
        $forumid = (int)$_POST["section_id"];

        $foruminfo = $forums->getCategoryInfo($forumid);

        if(!$foruminfo){
            $page::get_template("forum/AddPost", ["message"=>"This forum doesn't exist!"]);
            die();
        }

        if(strlen($title) > 60){
            $page::get_template("forum/AddPost", ["message"=>"Your title is more than 60 characters!"]);
            die();
        }

        if(strlen($content) > 50000){
            $page::get_template("forum/AddPost", ["message"=>"Your content is more than 50,000 characters!"]);
            die();
        }

        $ratelimit = time() - 30; // this is really generous

        $created = $db->table("forum_posts")->where("userid", $currentuser->id)->where("date", ">", $ratelimit)->count();

        if($created > 2){
            http_response_code(429);
            $page::get_template("forum/AddPost", ["message"=>"You're posting too fast!"]);
            die();
        }

        $insert = [
            "title"=>$title,
            "content"=>$content,
            "userid"=>$currentuser->id,
            "views"=>0,
            "parent"=>$forumid,
            "date"=>time()
        ];

        if(isset($_POST['pinneddays']) && $currentuser->is_admin == 1){
            $pinneddays = (int)$_POST['pinneddays'];

            if($pinneddays !== 0){
                $future = 86400 * $pinneddays;
                $pinneddays = time() + $future;

                $insert["isStickied"] = "1";
                $insert["StickiedDate"] = $pinneddays;
                $insert["CanReply"] = 0;

            }

        }

        if(isset($_POST['Createeditpost1$PostForm$AllowReplies'])){
            $cantReply = $_POST['Createeditpost1$PostForm$AllowReplies'];

            if($cantReply == "on"){
                $insert["CanReply"] = 0;
            }

        }

        $insertid = $db->table("forum_posts")->insert($insert);
        header("Location: /Forum/ShowPost.aspx?PostID=$insertid");
        
    }

});

$router->get("/Forum/ShowPost.aspx", function() {
    $page = new pagebuilder;
    $page::get_template("forum/showpost");
});
