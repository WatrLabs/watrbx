<?php

namespace watrlabs\watrkit;

use watrlabs\authentication;

class pagebuilder {

    public array $config =
    [
        'title'=>'Untitled',
        'footer'=>true
    ];

    public $authed = false;
    public $legacy = false;

    public array $cssfiles = [];
    public array $metatags = [];
    public array $jsfiles = [];
    public array $footerjsfiles = [];
    
    function __construct() {
        global $currentuser;
        if($currentuser !== null){
            $this->authed = true;
        } else {
            $this->authed = false;
        }

        $currenturl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->addmetatag("og:type", "Website");
        $this->addmetatag("og:url", $currenturl);
        $this->addmetatag("og:site_name", $_ENV["APP_NAME"]);
        $this->addmetatag("og:description", $_ENV["APP_DESC"]);
    }
    
    function setlegacy($value){
        $this->legacy = $value;
    }

    public function get_from_storage($file){
        return file_get_contents("../storage/$file");
    }

    public function set_page_name($title){
        $this->config['title'] = $title;
    }

    public function toggle_footer($footer){
        if(is_bool($footer)){
            $this->config["footer"] = $footer;
        }
    }

    static function build_component($component, $data = array()){
        extract($data);
        require("../views/components/$component.php");
    }

    public function addresource($resoucelist, $resource, $push2first = false){
        if ($push2first){
            array_unshift($this->$resoucelist, $resource);
        } else {
            $this->$resoucelist[] = $resource;
        }
    }

    function addmetatag($property, $content)
	{
		$this->metatags[$property] = $content;
	}

    static function get_template($file, $data = []){
        extract($data);
        require("../views/$file.php");
    }
    
    static function get_snippet($file, $data = []){
        extract($data);
        require("../views/snippets/$file.php");
    }

    public function build_footer(){
        if($this->legacy){
            $this::get_snippet('trustefooter', [
                'footerjsfiles' => $this->footerjsfiles,
            ]);
        } else {
            $this::get_snippet('newfooter', [
                'footerjsfiles' => $this->footerjsfiles,
            ]);
        }
    }

    public function buildheader() {
        
        $this->addmetatag("og:title", $_ENV["APP_NAME"] . " - " . $this->config['title']);
        $this->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=watrbx.css&t=7');

        global $currentuser;
        $themes = new \watrbx\themes();

        if($currentuser){
            if($currentuser !== null){
                if(isset($currentuser->currenttheme)){
                    $themeinfo = $themes->getThemeInfo($currentuser->currenttheme);
                    if($themeinfo){
                        if($themeinfo->theme_url){
                            $this->addresource('cssfiles', $themeinfo->theme_url);
                        }
                    }
                }
            }
        } else {
            if(date('n') == 10){
                $this->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=halloween.css?t=12');
            }
        }

        // this HAS to be expanded in the future 
        if($this->authed){
            if($this->legacy){
                $this::get_snippet('legacy_header', [
                    'cssfiles' => $this->cssfiles,
                    'jsfiles' => $this->jsfiles,
                    'metatags' => $this->metatags,
                    'config' => $this->config
                ]);
            } else {
                $this::get_snippet('header', [
                    'cssfiles' => $this->cssfiles,
                    'jsfiles' => $this->jsfiles,
                    'metatags' => $this->metatags,
                    'config' => $this->config
                ]);
            }
        } else {
            if($this->legacy){
                $this::get_snippet('legacy_unauthed_header', [
                    'cssfiles' => $this->cssfiles,
                    'jsfiles' => $this->jsfiles,
                    'metatags' => $this->metatags,
                    'config' => $this->config
                ]);
            } else {
                $this->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=watrbx.css&t=7');
                $this::get_snippet('unauthed_header', [
                    'cssfiles' => $this->cssfiles,
                    'jsfiles' => $this->jsfiles,
                    'metatags' => $this->metatags,
                    'config' => $this->config
                ]);
            }
        }
        
    }
}