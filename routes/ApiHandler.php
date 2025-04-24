<?php
// ../routes/template.php

// make sure you replace setup<PHP FILE NAME>Routes function

function compileerror($error = "Unknown"){
    $errorarray = array(
        "success"=>false,
        "error"=> $error
    );
    
    return json_encode($errorarray);
};

function setupApiHandlerRoutes($router) {
        $router->get('/api/get-quote', function() {
                header("Content-type: application/json");
                include(baseurl . "/conn.php");
                $quotefetch = $pdo->prepare("SELECT * FROM quotes ORDER BY RAND () LIMIT 1");
                $quotefetch->execute();
                $quote = $quotefetch->fetch(PDO::FETCH_ASSOC);
                $authorfetch = $pdo->prepare("SELECT username FROM users WHERE id = ?");
                $authorfetch->execute([$quote["author"]]);
                $authorname = $authorfetch->fetch(PDO::FETCH_ASSOC);
                $quote["author"] = $authorname["username"];
                die(json_encode($quote));
        });
        
        $router->get('/api/get-players', function() {
            
            header("Content-type: application/json");
            
            try {
            
                if(isset($_GET["pid"])){
                    include baseurl . "/conn.php";
                    $stmt = $pdo->prepare("SELECT COUNT(*) as usrcount FROM `activeplayers` WHERE pid = ?");
                    $placeid = $_GET["pid"];
                    $stmt->execute([$placeid]);
                    $playingcount = $stmt->fetchColumn();
                    echo json_encode(array("playercount"=>$playingcount));
                } else {
                    include baseurl . "/conn.php";
                    $stmt = $pdo->prepare("SELECT COUNT(*) as usrcount FROM `activeplayers`");
                    $stmt->execute();
                    $playingcount = $stmt->fetchColumn();
                    $stmt = $pdo->prepare("SELECT COUNT(*) as opengames FROM `games`");
                    $stmt->execute();
                    $gamescount = $stmt->fetchColumn();
                    $stmt = $pdo->prepare("
                        SELECT g.place, g.jobid, g.isactive, COUNT(ap.id) AS playercount
                        FROM `games` g
                        LEFT JOIN `activeplayers` ap ON g.place = ap.pid
                        GROUP BY g.place, g.jobid, g.isactive
                    ");
                    $stmt->execute();
                    $gamesdata = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    echo json_encode(array("playercount"=>$playingcount, "gamesopen"=>$gamescount, "gamesopendata"=> $gamesdata));
                }
                
            } catch (ErrorException $e) {
                $compilederror = compileerror(array("message" => "An internal server error occurred!", "code"=> 500));
                die($compilederror);
            } catch (PDOException $e) {
                $compilederror = compileerror(array("message" => "An internal database error occurred!", "code"=> 500, "errmsg"=>$e)); // I should probably make a class for this so I can just do like $watrbx->throwerror(); and have like presets
                die($compilederror);
            }

        });
}
