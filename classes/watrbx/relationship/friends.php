<?php

namespace watrbx\relationship;

class friends {

    private $db;

    public function __construct(){
        global $db;

        $this->db = $db;
    }

    private function buildFriendQuery($userid, $limit = null, $offset = null) {

        $q1 = $this->db->table("friends")
            ->select(["users.id", "users.username"])
            ->where("friends.userid", $userid)
            ->where("friends.status", "accepted")
            ->join("users", "users.id", "=", "friends.friendid");

        $q2 = $this->db->table("friends")
            ->select(["users.id", "users.username"])
            ->where("friends.friendid", $userid)
            ->where("friends.status", "accepted")
            ->join("users", "users.id", "=", "friends.userid");

        if($limit){
            $q1 = $q1->limit($limit);
            $q2 = $q2->limit($limit);
        }

        if($offset){
            $q1 = $q1->offset($offset);
            $q2 = $q2->offset($offset);
        }

        return [$q1, $q2];
    }

    public function are_friends($userid, $friendid) {
        global $db;
    
        $isfriends = $db->table('friends')
            ->where(function($query) use ($userid, $friendid) {
                $query->where('userid', $userid)
                      ->where('friendid', $friendid)
                      ->where("status", "accepted");
            })
            ->orWhere(function($query) use ($userid, $friendid) {
                $query->where('userid', $friendid)
                      ->where('friendid', $userid)
                      ->where("status", "accepted");
            })
            ->first();
    
        return $isfriends !== null;
    }

    public function get_friends($userid, $limit = null, $offset = null) {
        [$query1, $query2] = $this->buildFriendQuery($userid, $limit, $offset);

        $friends1 = $query1->get();
        $friends2 = $query2->get();

        $all_friends = array_merge($friends1, $friends2);

        if ($limit) {
            $all_friends = array_slice($all_friends, 0, $limit);
        }

        return $all_friends;
    }

    public function get_friend_count($userid){

        global $db;

        [$query1, $query2] = $this->buildFriendQuery($userid);

        $friends1 = $query1->count();
        $friends2 = $query2->count();

        $all_friends = $friends1 + $friends2;

        return $all_friends;

    }

    public function get_requests($userid) {
        global $db;
        $requests = $db->table("friends")
            ->select([
                'friends.id'      => 'invitation_id',
                'friends.userid',
                'friends.friendid',
                'friends.status',
                'users.id'        => 'user_id',
                'users.username',
            ])
            ->where("friendid", $userid)
            ->where("status", "pending")
            ->join('users', 'users.id', '=', 'friends.userid')
            ->get();

        return $requests;
    }

    public function get_pending_request($from, $to){
        global $db;
        return $db->table("friends")->where("friendid", $from)->where("userid", $to)->first();
    }

    public function has_pending($to, $from){
        global $db;
        
            $isfriends = $db->table('friends')
                ->where(function($query) use ($to, $from) {
                    $query->where('userid', $to)
                          ->where('friendid', $from)
                          ->where("status", "pending");
                })
                ->orWhere(function($query) use ($to, $from) {
                    $query->where('userid', $from)
                          ->where('friendid', $to)
                          ->where("status", "pending");
                })
                ->first();
        
            return $isfriends !== null;
    }

    public function add_friend($to, $from){
        global $db;

        if(!$this->has_pending($to, $from) || !$this->has_pending($from, $to)){
            $insert = array(
                "userid"=>$from,
                "friendid"=>$to,
                "date"=>time()
            );
    
            $db->table("friends")->insert($insert);
            return 1; // success
        } else {
            return 0; // 0 = already friends
        }
    }

    public function remove_friend($to, $from){
        // im not doing this my brain hurts
        // someone else do this im out
    }

}