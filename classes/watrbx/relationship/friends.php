<?php

namespace watrbx\relationship;

class friends {

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

    public function get_friends($userid) {
        global $db;
    
        $friends1 = $db->table("friends")
                       ->where("userid", $userid)
                       ->where("status", "accepted")
                       ->join('users', 'users.id', '=', 'friends.friendid')
                       ->get();
    
        $friends2 = $db->table("friends")
                       ->where("friendid", $userid)
                       ->where("status", "accepted")
                       ->join('users', 'users.id', '=', 'friends.userid')
                       ->get();

        $friends = array_merge($friends1, $friends2);
    
        return $friends;
    }

    public function get_requests($userid) {
        global $db;
        $requests1 = $db->table("friends")
            ->select([
                'friends.id'      => 'invitation_id',
                'friends.userid',
                'friends.friendid',
                'friends.status',
                'users.id'        => 'user_id',
                'users.username',
            ])
            ->where("userid", $userid)
            ->where("status", "pending")
            ->join('users', 'users.id', '=', 'friends.friendid')
            ->get();

        $requests2 = $db->table("friends")
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


        $requests = array_merge($requests1, $requests2);
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