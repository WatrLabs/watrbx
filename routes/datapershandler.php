<?php

global $router;

$router->group('/persistence', function($router) {  
    $router->post('/increment', function(){

        global $db;
        
        $placeId = isset($_GET['placeId']) ? intval($_GET['placeId']) : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $target = isset($_GET['target']) ? $_GET['target'] : null;
        $scope = isset($_GET['scope']) ? $_GET['scope'] : null;
        $pageSize = isset($_GET['pageSize']) ? intval($_GET['pageSize']) : null;
        $by = isset($_GET['by']) ? intval($_GET['by']) : null;

        $update = [
            "value"=>"value + $by",
        ];

        $db->table("datastores")->where("pid", $placeId)->where("dkey", $key)->where("type", $type)->where("scope", $scope)->where("target", $target)->update($update);
        
        $objectresult = $db->table("datastores")->where("pid", $placeId)->where("dkey", $key)->where("type", $type)->get();

        $arrayresult = array_map(fn($row) => (array) $row, $objectresult);

        usort($arrayresult, function ($a, $b) {
            return $b['value'] - $a['value'];
        });

        $entries = [];
        for ($i = 0; $i < $pageSize; $i++) {
            if ($i < count($result)) {
                $entries[] = [
                    "Target" => $result[$i]['target'],
                    "Value" => $result[$i]['value']
                ];
            }
        }

        $response = [
            "Entries" => $entries,
            "ExclusiveStartKey" => "boyfluxsiglet"
        ];

        header("Content-Type: application/json");
        echo json_encode($response);
        
    });
    
    $router->post('/set', function() {
        global $db;
        if (isset($_GET["placeId"]) && isset($_GET["key"]) && isset($_GET["type"]) && isset($_GET["scope"]) && isset($_GET["target"]) && isset($_GET["valueLength"]) && isset($_POST["value"])) {
            
            $pid = $_GET["placeId"];
            $key = $_GET["key"];
            $type = $_GET["type"];
            $scope = $_GET["scope"];
            $target = $_GET["target"];
            $length = $_GET["valueLength"];
            $value = $_POST["value"];
            
            $insert = [
                "pid"=>$pid,
                "dkey"=>$key,
                "type"=>$type,
                "scope"=>$scope,
                "target"=>$target,
                "length"=>$length,
                "value"=>$value
            ];
            
            $db->table("datastores")->insert($insert);

            $values = [
                ["Value" => $_POST["value"], "Scope" => $scope, "Key" => $key, "Target" => $target]
            ];
            exit(json_encode(["data" => $values], JSON_NUMERIC_CHECK));
        } else {
            $json = array("error" => "Bad Request");
            http_response_code(400);
            die(json_encode($json));
        }
    });
    
    $router->post('/getSortedValues', function() {
        global $db;
        
        if(isset($_GET["key"])&&isset($_GET["placeId"])&&isset($_GET["scope"])){
            $key = (string)$_GET["key"];;
            $pid = (int)$_GET["placeId"];;
            $scope = (string)$_GET["scope"];
            $limit = 0;
            $limitSet = isset($_GET["pageSize"]);
            if($limitSet){
                $limit = (int)$_GET["pageSize"];
            }

            $notresult = $db->table('datastores')->where('type', 'sorted')->where('pid', $pid)->where('dkey', $key)->where('scope', $scope);
            if($limitSet){
                $notresult->limit($limit); 
            }       
            $result = $notresult->get();
            $entries = [];
            foreach($result as &$data){
                array_push($entries,array("Target"=>$data->target,"Value"=>$data->value));
            }
            exit(json_encode(["data"=>array("Entries"=>$entries)], JSON_NUMERIC_CHECK));
            
        }
    });

    $router->post('/getV2', function() {
        global $db;
        if (isset($_GET["placeId"]) && isset($_GET["scope"]) && isset($_GET["type"])) {
            
            function removeEverythingBefore($in, $before) {
                $pos = strpos($in, $before);
                return $pos !== FALSE
                    ? substr($in, $pos + strlen($before), strlen($in))
                    : "";
            }
            
            $values=[];
            $input = file_get_contents('php://input');
            $qkeys = explode("&",substr($input, 1));
            $tempTable = array();
            foreach($qkeys as &$val){
                $after = substr($val, 0, strpos($val, "="));
                $tempTable[$after]=removeEverythingBefore($val,"=");
            }
            $qkeys = $tempTable;
            $tempTable = null;
            
            $key = (string)urldecode($qkeys['qkeys[0].key']);

            if (isset($qkeys['qkeys[0].target']) && isset($qkeys['qkeys[0].key'])) {
                $target = urldecode($qkeys['qkeys[0].target']);
                $key = urldecode($qkeys['qkeys[0].key']);
                $pid = $_GET["placeId"];
                $scope = $_GET["scope"];
                $type = $_GET["type"];

                $result = $db->table("datastores")->where("pid", $pid)->where("dkey", $key)->where("scope", $scope)->where("target", $target)->where("target", $target)->get();

                $values = [];
                foreach ($result as &$data) {
                    array_push($values, ["Value" => $data->value, "Scope" => $data->scope, "Key" => $data->dkey, "Target" => $data->target]);
                }
                $conn = null;
                exit(json_encode(["data" => $values], JSON_NUMERIC_CHECK));
            } else {
                $json = array("error" => "Bad Request");
                http_response_code(400);
                die(json_encode($json));
            }
        } else {
            $json = array("error" => "Bad Request");
            http_response_code(400);
            die(json_encode($json));
        }
    });
}, '');