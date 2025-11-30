<?php

namespace watrbx;
use watrbx\sitefunction;
use watrlabs\authentication;
use watrbx\sitefunctions;
use watrlabs\watrkit\pagebuilder;
global $db;

class gameserver {

    private $current_server = [];
    private $connecting_user = null;
    private $close_server;
    private $grid;
    private $server;

    function __construct(){
        $func = new sitefunctions();
        $ip = $func->getip();

        $auth = new authentication();
        $this->connecting_user = $auth->geolocateip($ip);

        $this->server = $this->get_user_server();
        $this->grid = $this->get_grid($this->server);

    }

    private function get_grid($server){

        if($server){
            $Grid = new \watrbx\Grid\Open\Service("http://" . $server->wireguard_ip . ":" . $server->port);
            $this->grid = $Grid;
        }

    }

    public function ping($server, $port){
        
        return 1; // not implemented yet..

    }

    public function get_server_info($serverid){
        global $db;
        return $db->table("servers")->where("server_id", $serverid)->first();
    }

    public function calc_distance($lat1, $lon1, $lat2, $lon2)
    {

        $earthsRadius = 6371;
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        
        $deltaLat = $lat2 - $lat1;
        $deltaLon = $lon2 - $lon1;

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

    public function get_server_url($serverinfo){
        return "http://" . $serverinfo->wireguard_ip . ":" . $serverinfo->port;
    }

    public function get_user_server($userid = null){

        global $currentuser;
        $auth = new authentication();
        $userinfo = null;

        if(!$userid){
            if($currentuser){
                $userinfo = $currentuser;
            }
        } else {
            $userinfo = $auth->getuserbyid($userid);
        }

        if($userinfo){
            if($userinfo->gs_preference){
                $serverinfo = $this->get_server_info($userinfo->gs_preference);

                if($serverinfo){
                    return $serverinfo;
                }
            }
        }
        
        
        // if they don't have a gs preference or something went wrong as a fall back
        return $this->get_closest_server();


    }

    public function get_closest_server(){
        $all_servers = $this->get_all_servers();
        $auth = new authentication();

        $min_dis = PHP_INT_MAX;
        $close_server = null;

        if($all_servers !== null){
            foreach ($all_servers as $server){

                $serverlocate = $auth->geolocateip($server->ip);

                if(!isset($this->connecting_user["latitude"]) || !isset($this->connecting_user["longitude"])){
                    $this->connecting_user["longitude"] = 0;
                    $this->connecting_user["latitude"] = 0;
                }

                if(!isset($serverlocate["latitude"]) || !isset($serverlocate["longitude"])){
                    $serverlocate["longitude"] = 0;
                    $serverlocate["latitude"] = 0;
                }

                $user_lat = $this->connecting_user["latitude"];
                $user_lon = $this->connecting_user["longitude"];

                $server_lat = $serverlocate["latitude"];
                $server_lon = $serverlocate["longitude"];

                $distance = $this->calc_distance($user_lat, $user_lon, $server_lat, $server_lon);

                if ($distance < $min_dis) {
                    $min_dis = $distance;
                    $close_server = $server;
                }

            }

            return $close_server;
        } else {
            return false;
        }
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

    public function is_gameserver_ip($ip){

        global $db;

        $result = $db->table("servers")->where("ip", $ip)->first();

        if(!$result){
            $result = $db->table("servers")->where("ipv6", $ip)->first();
        }

        return $result !== null;
        
    }

    public function end_job($jobid){
        global $db;
        $jobinfo = $db->table("jobs")->where("jobid", $jobid)->first();

        $server = $this->get_server_info($jobinfo->server);

        $Grid = new \watrbx\Grid\Grid;
        //$Grid = $Grid->Close("https://group-she.gl.at.ply.gg:49837");
        $Grid = new \watrbx\Grid\Close\Service("http://" . $server->wireguard_ip . ":" . $server->port);
        $Result = $Grid->CloseJob($jobid);

        $db->table("jobs")->where("jobid", $jobid)->delete();
        $db->table("game_instances")->where("serverguid", $jobid)->delete();
        $db->table("activeplayers")->where("jobid", $jobid)->delete();

        return $Result;

    }

    static function get_active_players($placeid){
        global $db;
        return $db->table("activeplayers")->where("placeid", $placeid)->count();
    }

    static function get_visits($userid, $limit = null){
        global $db;

        $rows = $db->table("visits")
            ->select($db->raw("MAX(id) as id"))
            ->where("userid", $userid)
            ->groupBy("universeid")
            ->limit($limit ?: 1000) 
            ->get();

        if(empty($rows)){
            return false;
        }

        $ids = array_map(fn($row) => $row->id, $rows);

        $visits = $db->table("visits")
            ->whereIn("id", $ids)
            ->orderBy("id", "desc")
            ->get();

        return $visits;
    }

    public function execute_job($jobinfo, $scriptinfo, $server = null){

        if(!$server){
            $server = $this->server;
        }

        $Grid = new \watrbx\Grid\Open\Service("http://" . $server->wireguard_ip . ":" . $server->port);
        $Result = $Grid->OpenJobEx($jobinfo, $scriptinfo);
        return $Result; 

    }

    public function gen_port(){

        // TODO: Track used ports

        $port = rand(4000, 4500);
        return $port;
    }

    public function request_game($placeid, $context){


        // Context 1 - Public Game
        // Context 2 - Private Game
        // Context 3 - CloudEdit
        // (I'm just guessing)

        $func = new sitefunctions();
        $pagebuilder = new pagebuilder();
        $jobid = $func->createjobid();
        $port = $this->gen_port();
        $close_server = $this->server;
        
        $apikey = $this->create_api_key($jobid);

        $insert = array(
            "jobid"=>$jobid,
            "type"=>1,
            "assetid"=>$placeid,
            "port"=>$port,
            "apikey"=>$apikey,
            "server"=>$close_server->server_id,
        );
        
        global $db;

        $db->table("jobs")->insert($insert);

        $gamescript = $pagebuilder->get_from_storage("lua/game.lua");
        
        $jobInfo = [
            "Id"=>$jobid,
            "Expiration"=>300, 
            "Category"=>1, // Still have yet to learn what this does
            "Cores"=>2 
        ];

        $ScriptInfo = [
            "Name"=>"Game Script",
            "Script"=>$gamescript,
            "Arguments"=>[
                "placeId"=>$placeid,
                "port"=>(int)$port,
                "sleeptime"=>(int)10, // honestly don't know what this does
                "access"=>$apikey,
                "baseUrl"=>$_ENV["APP_DOMAIN"],
                "protocol"=>"http://",
                "apiKey"=>$apikey,
                "matchmakingContextId"=>$context,
                "assetGameSubdomain"=>"assetgame."
            ]
        ];

        $result = $this->execute_job($jobInfo, $ScriptInfo);

        return [$result[0], $result[1], $jobid];
    
    }

}