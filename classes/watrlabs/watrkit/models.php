<?php

namespace watrlabs\watrkit;

class models {
    
    static function getmodel($model){
        
        if(file_exists("../models/$model.php")){
            require_once("../models/$model.php");
        } else {
            throw new ErrorException("Failed to include model $model");
        }
        
    }
    
}