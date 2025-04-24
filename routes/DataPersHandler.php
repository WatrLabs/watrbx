<?php

function setupDataPersHandlerRoutes($router) {
    $router->group('/persistence', function($router) {
        
        $router->post('/increment', function(){
            
            include(baseurl . "/conn.php");
            
            $placeId = isset($_GET['placeId']) ? intval($_GET['placeId']) : null;
            $type = isset($_GET['type']) ? $_GET['type'] : null;
            $key = isset($_GET['key']) ? $_GET['key'] : null;
            $target = isset($_GET['target']) ? $_GET['target'] : null;
            $scope = isset($_GET['scope']) ? $_GET['scope'] : null;
            $pageSize = isset($_GET['pageSize']) ? intval($_GET['pageSize']) : null;
            $by = isset($_GET['by']) ? intval($_GET['by']) : null;
           
            $stmt = $pdo->prepare("UPDATE datastores SET value = value + ? WHERE pid = ? AND `dkey` = ? AND type = ? AND scope = ? AND target = ?");
            $stmt->execute([$by, $placeId, $key, $type, $scope, $target]);

            $stmt = $pdo->prepare("SELECT * FROM datastores WHERE pid = ? AND `dkey` = ? AND type = ?");
            $stmt->execute([$placeId, $key, $type]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            usort($result, function ($a, $b) {
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
            if (isset($_GET["placeId"]) && isset($_GET["key"]) && isset($_GET["type"]) && isset($_GET["scope"]) && isset($_GET["target"]) && isset($_GET["valueLength"]) && isset($_POST["value"])) {
                
                $pid = $_GET["placeId"];
                $key = $_GET["key"];
                $type = $_GET["type"];
                $scope = $_GET["scope"];
                $target = $_GET["target"];
                $length = $_GET["valueLength"];
                $value = $_POST["value"];
                
                include(baseurl . "/conn.php");
                
                include_once("../pagehandler/logging.php");
                weblog("Datastore Update\n\nKey:  " . $key . "\nTarget: " . $target . "\nValue: " . $value);
                
                $setdata = $pdo->prepare("INSERT INTO datastores (pid, dkey, type, scope, target, length, value) VALUES (:pid, :dkey, :type, :scope, :target, :length, :value)");
                $setdata->bindParam(':pid', $pid, PDO::PARAM_INT);
                $setdata->bindParam(':dkey', $key, PDO::PARAM_STR);
                $setdata->bindParam(':type', $type, PDO::PARAM_STR);
                $setdata->bindParam(':scope', $scope, PDO::PARAM_STR);
                $setdata->bindParam(':target', $target, PDO::PARAM_STR);
                $setdata->bindParam(':length', $length, PDO::PARAM_STR);
                $setdata->bindParam(':value', $value, PDO::PARAM_STR);
                $setdata->execute();
                
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
            
            include(baseurl . "/conn.php");
           
           if(isset($_GET["key"])&&isset($_GET["placeId"])&&isset($_GET["scope"])){
	            $query = "SELECT * FROM datastores WHERE type=\"sorted\" AND pid=:pid AND `dkey`=:key AND scope=:scope";
	            $key = (string)$_GET["key"];;
	            $pid = (int)$_GET["placeId"];;
	            $scope = (string)$_GET["scope"];
	            $limit = 0;
	            $limitSet = isset($_GET["pageSize"]);
	            if($limitSet){
		            $query = $query . " LIMIT :limit";
		            $limit = (int)$_GET["pageSize"];
	            }
	            $stmt = $pdo->prepare($query);
	            $stmt->bindParam(':key', $key, PDO::PARAM_STR); 
	            $stmt->bindParam(':pid', $pid, PDO::PARAM_INT); 
	            $stmt->bindParam(':scope', $scope, PDO::PARAM_STR); 
	            if($limitSet){
		        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT); 
	            }       
	            $stmt->execute();
	            $entries = [];
	            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	            foreach($result as &$data){
		            array_push($entries,array("Target"=>$data["target"],"Value"=>$data["value"]));
	            }
	            exit(json_encode(["data"=>array("Entries"=>$entries)], JSON_NUMERIC_CHECK));
               
           }
        });

        $router->post('/getV2', function() {
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
	            
	            include_once("../pagehandler/logging.php");
	            weblog("Datastore access\n\nKey:  " . $key);

                if (isset($qkeys['qkeys[0].target']) && isset($qkeys['qkeys[0].key'])) {
                    $target = urldecode($qkeys['qkeys[0].target']);
                    $key = urldecode($qkeys['qkeys[0].key']);
                    $pid = $_GET["placeId"];
                    $scope = $_GET["scope"];
                    $type = $_GET["type"];
                    weblog("Datastore access\n\nTarget: " . $target);
                    include(baseurl . "/conn.php");

                    $setdata = $pdo->prepare("SELECT * FROM datastores WHERE pid = :pid AND scope = :scope AND type = :type AND dkey = :dkey AND target = :target ORDER BY id DESC");
                    $setdata->bindParam(':dkey', $key, PDO::PARAM_STR);
                    $setdata->bindParam(':pid', $pid, PDO::PARAM_STR);
                    $setdata->bindParam(':scope', $scope, PDO::PARAM_STR);
                    $setdata->bindParam(':type', $type, PDO::PARAM_STR);
                    $setdata->bindParam(':target', $target, PDO::PARAM_STR);
                    $setdata->execute();
                    $result = $setdata->fetchAll(PDO::FETCH_ASSOC);

                    $values = [];
                    foreach ($result as &$data) {
                        array_push($values, ["Value" => $data["value"], "Scope" => $data["scope"], "Key" => $data["dkey"], "Target" => $data["target"]]);
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
    });
}
