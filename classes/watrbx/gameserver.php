<?php

namespace watrbx;
use watrbx\sitefunction;
use watrlabs\authentication;
use watrbx\sitefunctions;

global $db;

class gameserver {

    private $current_server = [];
    private $connecting_user = null;

    function __construct(){
        $func = new sitefunctions();
        $ip = $func->getip();

        $auth = new authentication();
        $this->connecting_user = $auth->geolocateip($ip);

    }

    public function ping($server, $port){
        
        return 1; // not implemented yet..

    }

    public function get_server_info($serverid){
        global $db;
        return $db->table("servers")->where("server_id", $serverid)->first();
    }

    public function send_get_request($uri, $server){

        if(!is_object($server)){
            $serverinfo = $this->get_server_info($server);
        } else {
            $serverinfo = $server;
        }

        if($serverinfo == null){
            return false;
        }

        $url = "http://" . $serverinfo->ip . ":" . $serverinfo->port . $uri;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);


        $response = curl_exec($curl);
        curl_close($curl);

        if($response){
            return $response;
        } else {
            echo curl_error($curl);
            return false;
        }
    }

    public function send_post_request($uri, $server, $data){

        if($server == null){
            return false;
        }

        $url = "http://" . $server->ip . ":" . $server->port . $uri;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data );
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_POST, 1);

        $response = curl_exec($curl);
        curl_close($curl);

        if($response){
            return $response;
        } else {
            echo curl_error($curl);
            return false;
        }
    }

    public function start_rcc($server, $port, $type){
        $data = array(
            "port"=>$port,
            "type"=>$type
        );

        $response = $this->send_post_request('/start', $server, json_encode($data));

        if($response){
            return true;
        } else {
            return false;
        }

    }

    public function calc_distance($lat1, $lon1, $lat2, $lon2)
    {

        $earthsRadius = 6371;
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        
        $deltaLat = ($lat2 - $lat1) * pi() / 180;
        $deltaLon = ($lon2 - $lon1) * pi() / 180;

        $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
            cos($lat1) * cos($lat2) *
            sin($deltaLon / 2) * sin($deltaLon / 2);

        $c = 2 * atan2( sqrt($a), sqrt(1 - $a) );

        return $earthsRadius * $c;
    }

    public function get_all_servers(){
        global $db;
        return $db->table("servers")->get();
    }

    public function get_port($server){
        $json = $this->send_get_request("/get-port", $server);

        if($json){
            $decoded = json_decode($json, true);
        
            if($decoded["Success"] == true){
                return $decoded["port"];
            } else {
                return false;
            }
        } else {
            return false;
        }

        return false;

        
    }

    public function get_closest_server(){
        $all_servers = $this->get_all_servers();

        if($all_servers !== null){
            foreach ($all_servers as $server){
                $auth = new authentication();
                $serverlocate = $auth->geolocateip($server->ip);


                if(!isset($this->connecting_user["latitude"]) || !isset($this->connecting_user["longitude"])){
                    $this->connecting_user["longitude"] = 0;
                    $this->connecting_user["latitude"] = 0;
                }

                $user_lat = $this->connecting_user["latitude"];
                $user_lon = $this->connecting_user["longitude"];

                $server_lat = "33.7485";
                $server_lon = "-84.3871";

                $min_dis = PHP_INT_MAX;
                $distance = $this->calc_distance($user_lat, $user_lon, $server_lat, $server_lon);

                $close_server = null;

                if ($distance < $min_dis) {
                    $min_dis = $distance;
                    $close_server = $server;
                }
                return $close_server;

            }
        } else {
            return false;
        }
    }

    public function join_game($placeid){
        // TODO
    }

    public function validate_api_key($key){
        // TODO: Add JobID support & expiration
        global $db;
        $key = $db->table("apikeys")->where("apikey", $key)->first();

        if($key == null){
            return false;
        } else {
            return true;
        }
    }

    public function get_rcc_info($rccuid){
        global $db;
        $rccinfo = $db->table("rccinstances")->where("guid", $rccuid)->first();

        if($rccinfo !== null){
            return $rccinfo;
        } else {
            return false;
        }

    }

    public function create_api_key($jobid = null, $expiration = null){
        $sitefunc = new sitefunctions();

        global $db;

        $apikey = $sitefunc->genstring(25);
        $insert = array(
            "apikey"=>$apikey,
            "jobid"=>$jobid,
            "expiration"=>$expiration
        );

        $db->table("apikeys")->insert($insert);
        return $apikey;
    }

    public function get_idle_rcc($serverid){
        global $db;

        $query = $db->table("rccinstances")->where("is_idle", 1)->where("serverid", $serverid);
        $idlercc = $query->first();

        if($query !== null){
            return $idlercc;
        } else {
            return false;
        }
        
    }

    public function end_job($jobid){
        global $db;
        $jobinfo = $db->table("jobs")->where("jobid", $jobid)->first();

        if($jobinfo !== null){
            $server = $this->get_server_info($jobinfo->server);
            $rccinstance = $this->get_rcc_info($jobinfo->rccinstance);

            $postdata = json_encode(array(
                "jobid"=>$jobid,
                "hostport"=>$jobinfo->port,
                "port"=>$rccinstance->port
            ));
            //send_post_request($uri, $server, $data){
            $killed = $this->send_post_request('/kill-job', $server, $postdata);

            $db->table("jobs")->where("jobid", $jobid)->delete();
            $db->table("game_instances")->where("serverguid", $jobid)->delete();

            return $killed;

        } else {
            return false;
        }

    }

    static function get_active_players($placeid){
        global $db;
        return $db->table("activeplayers")->where("placeid", $placeid)->count();
    }

    static function get_visits($userid){
        global $db;

        $rows = $db->table("visits")
            ->select($db->raw("MAX(id) as id"))
            ->where("userid", $userid)
            ->groupBy("universeid")
            ->get();
            
        if(empty($rows)){
            return false;
        }

        $unqiue = array_map(function($row) {
            return $row->id;
        }, $rows);
    
        return $db->table("visits")
            ->whereIn("id", $unqiue)
            ->orderBy("id", "desc")
            ->get();
    }

    public function request_game($placeid){

        $close_server = $this->get_closest_server();

        if($close_server !== false){
            $rcc = $this->get_idle_rcc($close_server->server_id);

            if($rcc){
                $func = new sitefunctions();
                $jobid = $func->createjobid();
    
                $port = $this->get_port($close_server);
                $apikey = $this->create_api_key($jobid);
        
                $insert = array(
                    "jobid"=>$jobid,
                    "type"=>1,
                    "assetid"=>$placeid,
                    "port"=>$port,
                    "apikey"=>$apikey,
                    "server"=>$close_server->server_id,
                    "rccinstance"=>$rcc->guid
                );
                
                global $db;
        
                $db->table("jobs")->insert($insert);
        
                //$uri, $server, $data
        
                $request_data = json_encode(array(
                    "url"=>"https://www.watrbx.wtf/api/v1/gameserver/load-job?jobid=".$jobid,
                    "type"=>1,
                    "hostport"=>$port,
                    "rccinstance"=>$rcc->guid
                ));
        
                $response = $this->send_post_request("/execute-job", $close_server, $request_data); 
                $decoded = json_decode($response, true);
        
                if($decoded == null){
                    return false;
                }

                $update = array(
                    "is_idle"=>0,
                    "placeid"=>$placeid
                );

                $db->table("rccinstances")->where("guid", $rcc->guid)->update($update);
                return $response;
            } else {
                //$port = $this->get_port($close_server);
                // if($this->start_rcc($close_server, $port, 1)){
                //     return true;
                // } else {
                //     return false;
                // }
                return false;
            }
            
        } else {
            return false;
        }
    }

}