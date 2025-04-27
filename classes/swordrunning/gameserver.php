<?php

namespace swordrunning;

class gameserver {
    
    // this is really old code (sword is a lot better about coding now :skull_praying:)
    // its from liek 2022
    // https://tjs-nut.pics/i/rpsur.png
    
    public static function guidv4($data = null) {
            $data = $data ?? random_bytes(16);
            assert(strlen($data) == 16);
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
            return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
            // this is for generating job ids.
    }
    
    public static function getRunning() {
        global $pdo;
        //global $arbiterKey;

        global $db;
        $query = $db->table("games");
        $allgames = $query->get();
        
        $games = [];
        
        foreach ($allgames as $server) {
            $games[] = array(
                "place" => htmlspecialchars($server['place']),
                "port" => htmlspecialchars($server['port']),
            );
        }
        
        return json_encode($games);
    }
    
    public static function getTopQueue() {

        global $db;
        $query = $db->table("jobs")->where("status", 0);
        $allgames = $query->get();
        
        return json_encode($allgames);
    }
    
    public static function deleteTopQueue() {
        global $db;

        $allgames = $db->table("jobs")->get();
        
        foreach ($allgames as $server) {
            $id = $server['id'];
            $db->table("jobs")->where("id", $id)->delete();

            break;
        }
    }
    
    public static function openServer($place,$port,$jobId) {
        global $db;
        $insertquery = array(
            "place"=>$place,
            "port"=>$port,
            "jobId"=>$jobId
        );

        $db->table("games")->insert($insertquery);

    }
    public static function closeServer($place) {
        global $pdo;
        global $arbiterKey;
        gameserver::sendUDP("closegame/".$place."/".$arbiterKey);
    }
    public static function checkStatus() {
        global $arbiterKey;
        if(!gameserver::sendUDP("ping/".$arbiterKey)){
            return false;
        } else {
            return true;
        }
    }

    public static function addToQueue($place) {
        global $db;
        $query = $db->table("jobs")->where("placeid", $place)->where("status", 0);
        $game = $query->first();

        if($game == NULL){ // checks if the place is already in queue and if so, skip.
            $jobid = guidv4();
            $type = 1;

            $insert = array(
                "jobid"=>$jobid,
                "jobtype"=>$type,
                "placeid"=>$place
            );

            $db->table("jobs")->insert($insert);
        }
    }
    public static function sendUDP($message) {
        global $arbiterIp;
        global $arbiterPort;
        $socket = stream_socket_client("udp://".$_ENV["arbiterIp"].":".$_ENV["arbiterPort"]."", $errno, $errstr);
        if (!$socket) {
            return $socket;
        }
        
        stream_socket_sendto($socket, $message);
    
        fclose($socket);
    }
}
?>