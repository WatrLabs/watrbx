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

        $this->close_server = $this->get_closest_server();
        $this->grid = $this->get_grid($this->close_server);

    }

    private function get_grid($server){

        $Grid = new \watrbx\Grid\Open\Service("http://" . $server->ip . ":" . $server->port);
        $this->grid = $Grid;

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

    public function get_server_url($serverinfo){
        return "http://" . $serverinfo->ip . ":" . $serverinfo->port;
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

        $server = $this->close_server;
        $Grid = new \watrbx\Grid\Grid;
        //$Grid = $Grid->Close("http://group-she.gl.at.ply.gg:49837");
        $Grid = new \watrbx\Grid\Close\Service("http://" . $server->ip . ":" . $server->port);
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

        $query = $db->table("visits")
            ->select($db->raw("MAX(id) as id"))
            ->where("userid", $userid)
            ->groupBy("universeid");
            
        if($limit){
            $query->limit($limit);
        }

        $rows = $query->get();
            
        if(empty($rows)){
            return false;
        }

        $unqiue = array_map(function($row) {
            return $row->id;
        }, $rows);
    

        $query2 = $db->table("visits")
            ->whereIn("id", $unqiue)
            ->orderBy("id", "desc");
            
        if($limit){
            $query2->limit($limit);
        }

        return $query2->get();
    }

    public function execute_job($jobinfo, $scriptinfo){

        $server = $this->close_server;
        $Grid = new \watrbx\Grid\Open\Service("http://" . $server->ip . ":" . $server->port);
        //$Grid = new \watrbx\Grid\Open\Service("http://group-she.gl.at.ply.gg:49837");
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
        $close_server = $this->close_server;
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
            "Expiration"=>120, 
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
                "baseUrl"=>"watrbx.wtf",
                "protocol"=>"http://",
                "apiKey"=>$apikey,
                "matchmakingContextId"=>$context,
                "assetGameSubdomain"=>"assetgame."
            ]
        ];

        $result = $this->execute_job($jobInfo, $ScriptInfo);

        $return = [
            "Result"=>$result,
            "jobId"=>$jobid
        ];

        return $return;
    
    }

}