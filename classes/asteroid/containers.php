<?php

namespace asteroid;

class containers {

    // TODO: Potentially implement the ability to create containers?
    // ok i might do TODO, watrabi give guide 
    
    private $containerurl = 0;
    private $containerport = 0;
    private $containeradminkey = "";
    private $containerkey = "";

    function __construct(){
        $this->containerurl = $_ENV["CONTAINERURL"];
        $this->containerport = $_ENV["CONTAINERPORT"];
        $this->containeradminkey = $_ENV["CONTAINERADMINKEY"];

        $post_data = [
            "role"=>"site",
            "adminKey"=>$this->containeradminkey,
        ];

        $url = $this->compile_url('/api/auth/request-token');

        $newkey = $this->send_post_request($url, json_encode($post_data));
        $decoded = json_decode($newkey);

        if(!empty($decoded)){
            if(isset($decoded->token)){
                $this->containerkey = $decoded->token;
            } else {
                throw new \ErrorException("Failed to fetch storage token");
            }
        } else {
            throw new \ErrorException("Failed to fetch storage token");
        }
        
    }

    public function send_get_request($url){

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: " . $this->containerkey,
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        if($response){
            return $response;
        } else {
            return false;
        }
    }

    public function send_post_request($url, $data = []){

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-type: application/json",
            "Authorization: " . $this->containerkey, 
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        if($response){
            return $response;
        } else {
            return false;
        }
    }

    public function compile_url($uri){
        $url = $this->containerurl . ":" . $this->containerport . $uri;
        return $url;
    }

    public function set_container_key($newkey){
        $this->containerkey = $newkey;
        return;
    }

    public function get_container_files($container = null){
        $allfilesurl = $this->compile_url("/api/files/list");
        $response = $this->send_get_request($allfilesurl);

        if($response){
            return json_decode($response);
        } else {
            return false;
        }

    }

    public function get_container_info($container = null){
        $allfilesurl = $this->compile_url("/api/about-instance");
        $response = $this->send_get_request($allfilesurl);

        if($response){
            return json_decode($response);
        } else {
            return false;
        }
    }

    // TODO: Add the ability for multiple files
    // ok bet ten add batch api
    public function upload_file($filepath = '', $base64 = '', $filename = '', $location = ''){

        if($filename == ''){
            $filename = basename($filepath);
        }

        $location = $location . $filename;
        if($base64 == ''){
            $rawfile = file_get_contents($filepath);
            $base64 = base64_encode($rawfile);
        }

        $upload = [
            "file"=>$base64,
            "path"=>$location
        ];

        $allfilesurl = $this->compile_url("/api/files/upload");
        $response = $this->send_post_request($allfilesurl, json_encode($upload));
        var_dump($response);

        if($response){
            return json_decode($response);
        } else {
            var_dump($response);
            die();
            return false;
        }

    }

}