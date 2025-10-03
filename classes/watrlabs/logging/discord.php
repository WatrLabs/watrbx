<?php
namespace watrlabs\logging;

class discord {

    private $webhookurl = null;

    function __construct(){
        if($_ENV["internalwebhook"] !== null || $_ENV["internalwebhook"] !== ""){
            $this->webhookurl = $_ENV["internalwebhook"];
        }
    }

    public function set_webhook_url($url){
        $this->webhookurl = $url;
    }

    public function internal_log($log, $title = "Internal Log"){
        $embed = [
            [
                "title" => $title,
                "type" => "rich",
                "description" => $log,
                "timestamp" => $timestamp = date("c", strtotime("now")),
                "color" => hexdec( "3366ff" ),
            ]
        ];

        $this->send_webhook($this->webhookurl, null, null, $embed);
        return true;
    }

    public function abuse_report($log, $title = "Abuse Report!"){
        $embed = [
            [
                "title" => $title,
                "type" => "rich",
                "description" => $log,
                "timestamp" => $timestamp = date("c", strtotime("now")),
                "color" => hexdec( "3366ff" ),
            ]
        ];

        $this->send_webhook($this->webhookurl, null, null, $embed);
        return true;
    }

    public function send_webhook($url, $username = null, $msg = null, $embed = null){
        $timestamp = date("c", strtotime("now"));

        $json_data = json_encode([
            "content" => $msg,
            "username" => $username,
            "tts" => false,
            "embeds" => $embed
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);

        curl_close( $ch );
        // done the todo
        if($curl_error || $http_code < 200 || $http_code >= 300){
            error_log("watrbx.wtf, discord webhook failed: HTTP $http_code - $curl_error"); // il just do this
            return false;
        }

        return true;
    }

}