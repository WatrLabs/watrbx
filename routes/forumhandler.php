<?php
use watrlabs\router\Routing;
use watrlabs\authentication;
use watrlabs\watrkit\pagebuilder;
use watrlabs\watrkit\sanitize;
use watrbx\forums;
use League\CommonMark\Environment\Environment;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Node\Inline\Image;

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
    $auth = new authentication;
    global $db;
    global $currentuser;

    if(isset($_COOKIE["csrftoken"])){
        if(!$auth->verifycsrf($_COOKIE["csrftoken"], "addreply")){
            $page::get_template("forum/AddReply", ["message"=>"An unexpected error occured!"]);
            die();
        }
    } else {
        $page::get_template("forum/AddReply", ["message"=>"An unexpected error occured!"]);
        die();
    }
    
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

        $environment = new Environment([
            'html_input' => 'strip',
        ]);

        $environment->addExtension(new CommonMarkCoreExtension());

        $environment->addEventListener(League\CommonMark\Event\DocumentParsedEvent::class,
            function (League\CommonMark\Event\DocumentParsedEvent $event) {
                $walker = $event->getDocument()->walker();

                while ($event = $walker->next()) {
                    $node = $event->getNode();
                    if ($node instanceof Image) {
                        $node->detach();
                    }
                }
            }
        );

        $converter = new MarkdownConverter($environment);
        $content = $converter->convert($content);

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
    $auth = new authentication;
    global $db;
    global $currentuser;

    $islocked = false;

    if(isset($_COOKIE["csrftoken"])){
        if(!$auth->verifycsrf($_COOKIE["csrftoken"], "addpost")){
            $page::get_template("forum/AddPost", ["message"=>"An unexpected error occured!"]);
            die();
        }
    } else {
        $page::get_template("forum/AddPost", ["message"=>"An unexpected error occured!"]);
        die();
    }
    
    if(isset($_POST["section_id"]) && isset($_POST["title"]) && isset($_POST["content"]) && $currentuser){
        $title = htmlspecialchars($_POST["title"]);
        $content = htmlspecialchars($_POST["content"]);
        $forumid = (int)$_POST["section_id"];

        $foruminfo = $forums->getCategoryInfo($forumid);

        if($foruminfo->locked == 1){
            $islocked = true;
            if(isset($currentuser)){
                if($currentuser->is_admin == 1){
                    $islocked = false;
                }
            }
        }

        if($islocked){
            $page::get_template("forum/AddPost", ["message"=>"An unexpected error occured!"]);
            die();
        }

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

        $environment = new Environment([
            'html_input' => 'strip',
        ]);

        $environment->addExtension(new CommonMarkCoreExtension());

        $environment->addEventListener(League\CommonMark\Event\DocumentParsedEvent::class,
            function (League\CommonMark\Event\DocumentParsedEvent $event) {
                $walker = $event->getDocument()->walker();

                while ($event = $walker->next()) {
                    $node = $event->getNode();
                    if ($node instanceof Image) {
                        $node->detach();
                    }
                }
            }
        );

        $converter = new MarkdownConverter($environment);
        $content = $converter->convert($content);

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
/*
https://github.com/WatrLabs/watrbx/issues/16 - hope this works
*/
$router->post("/Forum/ShowPost.aspx", function(){
    global $db;
    
    if(!isset($_POST["__EVENTTARGET"])){ // watrabi u do u
        http_response_code(400);
        die();
    }
    
    $target = $_POST["__EVENTTARGET"];
    $postid = isset($_GET["PostID"]) ? (int)$_GET["PostID"] : 0;
    
    if($postid == 0){
        http_response_code(400);
        die();
    }
    
    $forums = new forums();
    $postinfo = $forums->getPostInfo($postid);
    
    if(!$postinfo){
        http_response_code(404);
        die();
    }
    
    $categoryid = $postinfo->parent;
    // TODO: Fix next thread, previous thread only works
    if(strpos($target, "NextThread") !== false){ 
        $nextpost = $db->table("forum_posts")
            ->where("parent", $categoryid)
            ->where("id", ">", $postid)
            ->orderBy("id", "ASC")
            ->first();
        
        if($nextpost){
            header("Location: /Forum/ShowPost.aspx?PostID=" . $nextpost->id);
            die();
        } else {
            header("Location: /Forum/ShowPost.aspx?PostID=" . $postid);
            die();
        }
    } elseif(strpos($target, "PreviousThread") !== false){
        $prevpost = $db->table("forum_posts")
            ->where("parent", $categoryid)
            ->where("id", "<", $postid)
            ->orderBy("id", "DESC")
            ->first();
        
        if($prevpost){
            header("Location: /Forum/ShowPost.aspx?PostID=" . $prevpost->id);
            die();
        } else {
            header("Location: /Forum/ShowPost.aspx?PostID=" . $postid);
            die();
        }
    } else {
        http_response_code(400);
        die();
    }
});