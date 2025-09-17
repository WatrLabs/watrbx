<?php
namespace watrbx;

use \watrlabs\authentication;

class forums {

    private $auth;

    public function __construct() {
        $this->auth = new authentication();
    }
    
    public function getHeaders(){
        global $db;

        return $db->table("forum-header")->orderBy("priority", "ASC")->get();
    }

    public function getHeaderInfo($headerId){
        global $db;

        return $db->table("forum-header")->where('id', $headerId)->first();
    }

    public function getCategories($headerid){
        global $db;

        return $db->table("forum_categories")->where("parent", $headerid)->orderBy("priority", "ASC")->get();
    }

    public function getPostCount($categoryId){
        global $db;

        return $db->table("forum_posts")->where("parent", $categoryId)->count();
    }

    public function getPosts($categoryId){
        global $db;

        return $db->table("forum_posts")->where("parent", $categoryId)->orderBy("id", "DESC")->get();
    }

    public function getReplyCount($postId){
        global $db;

        return $db->table("forum_replies")->where("parent", $postId)->count();
    }

    public function getCategoryInfo($categoryId){
        global $db;

        return $db->table("forum_categories")->where('id', $categoryId)->first();
    }

    public function getReplies($postId){
        global $db;

        return $db->table("forum_replies")->where("parent", $postId)->orderBy("id", "DESC")->get();
    }

    public function getLastCategoryPoster($categoryId){

        global $db;
        $result = $db->table("forum_posts")->where("parent", $categoryId)->orderBy("id", "DESC")->first();

        if($result){
            $userinfo = $this->auth->getuserbyid($result->userid);

            if($userinfo){
                return [$userinfo->username, date("g:i A", $result->date)];
            }

        }

        return ["No One", ""];
    }

    public function getPostInfo($postId){
        global $db;

        $postinfo = $db->table("forum_posts")->where("id", $postId)->first();
        return $postinfo;
    }

    public function getPostAuthor($postId){
        global $db;

        $postinfo = $db->table("forum_posts")->where("id", $postId)->first();
        $userinfo = $this->auth->getuserbyid($postinfo->userid);
        return $userinfo->username;
    }

    public function getLastReplyPoster($postId){

        global $db;
        $result = $db->table("forum_replies")->where("parent", $postId)->orderBy("id", "DESC")->first();

        if($result){
            $userinfo = $this->auth->getuserbyid($result->userid);

            if($userinfo){
                return [$userinfo->username, date("g:i A", $result->date)];
            }

        } else {
            $postinfo = $db->table("forum_posts")->where("id", $postId)->first();
            $userinfo = $this->auth->getuserbyid($postinfo->userid);
            return [$userinfo->username, date("g:i A", $postinfo->date)];
        }

        return ["No One", ""];
    }

}