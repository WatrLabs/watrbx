<?php

namespace asteroid;

class containers {

    // TODO: Potentially implement the ability to create containers?

    private $containerurl = 0;
    private $containerport = 0;
    private $containerid = "";
    private $containerkey = "";

    function __construct(){
        if($_ENV["CONTAINERURL"]){
            $this->containerurl = $_ENV["CONTAINERURL"];
        }

        if($_ENV["CONTAINERPORT"]){
            $this->containerport = $_ENV["CONTAINERPORT"];
        }

        if($_ENV["CONTAINERID"]){
            $this->containerid = $_ENV["CONTAINERID"];
        }

        if($_ENV["CONTAINERKEY"]){
            $this->containerkey = $_ENV["CONTAINERKEY"];
        }
    }

    public function send_get_request($url){

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Container-Key: " . $this->containerkey,
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
            "Container-Key: " . $this->containerkey,
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

    public function get_container_files($container = null, $key = null){
        if($container == null && $key == null){
            $container = $this->containerid;
            $key = $this->containerkey;
        } else {
            $this->set_container_key($key);
        }

        $urlcontainer = urlencode($container);
        $allfilesurl = $this->compile_url("/api/containers/$urlcontainer/files");
        $response = $this->send_get_request($allfilesurl);

        if($response){
            return json_decode($response);
        } else {
            return false;
        }

    }

    public function get_container_info($container = null, $key = null){
        if($container == null && $key == null){
            $container = $this->containerid;
            $key = $this->containerkey;
        } else {
            $this->set_container_key($key);
        }

        $urlcontainer = urlencode($container);
        $allfilesurl = $this->compile_url("/api/containers/$urlcontainer/info");
        $response = $this->send_get_request($allfilesurl);

        if($response){
            return json_decode($response);
        } else {
            return false;
        }
    }

    // TODO: Add the ability for multiple files

    public function upload_file($filepath, $filename = '', $location = '', $container = null, $key = null){
        if($container == null && $key == null){
            $container = $this->containerid;
            $key = $this->containerkey;
        } else {
            $this->set_container_key($key);
        }

        if($filename == ''){
            $filename = basename($filepath);
        }

        $upload = [
            "location"=>$location,
            "files"=> new \CURLFile(
                $filepath,
                mime_content_type($filepath),
                $filename
            )
        ];

        $urlcontainer = urlencode($container);
        $allfilesurl = $this->compile_url("/api/containers/$urlcontainer/files/new");
        $response = $this->send_post_request($allfilesurl, $upload);

        if($response){
            return json_decode($response);
        } else {
            return false;
        }

    }

    public function does_file_exist($file, $container = null, $key = null){

        // TODO: Implement.

    }

}