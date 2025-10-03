<?php
namespace watrlabs;
// for site, not for external use
class fastflags{
    static function get($flag){
        $envflag = $_ENV["FFLAG_" . $flag] ?? null;
        if($envflag === null){
            return false;
        }
        return $envflag === "true" || $envflag === true;
    }
}