<?php

namespace watrlabs;

class api{
    static function create_error($error, $otherstuff = array(), $code = 400){
        header("Content-type: application/json");
        http_response_code($code);
        $array = array(
            "success"=>false,
            "error"=>$error,
            "data"=>$otherstuff
        );
    
        return json_encode($array);
    }

    static function create_success($msg, $otherstuff = array(), $code = 200){
        header("Content-type: application/json");
        http_response_code($code);
        $array = array(
            "success"=>true,
            "msg"=>$msg,
            "data"=>$otherstuff
        );
    
        return json_encode($array);
    }
}