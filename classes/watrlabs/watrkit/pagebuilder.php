<?php

namespace watrlabs\watrkit;

class pagebuilder {

    public array $config =
    [
        'title'=>'Untitled',
        'footer'=>true
    ];

    public array $cssfiles = [];
    public array $metatags = [];
    public array $jsfiles = [];

    public function set_page_name($title){
        $this->config['title'] = $title;
    }

    public function toggle_footer($footer){
        if(is_bool($footer)){
            $this->config["footer"] = $footer;
        }
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

    public function get_template($file, $data = []){
        extract($data);
        require("../views/$file.php");
    }
    
    public function get_snippet($file, $data = []){
        extract($data);
        require("../views/snippets/$file.php");
    }

    public function buildheader() {
        $currenturl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->addmetatag("og:type", "Website");
        $this->addmetatag("og:url", $currenturl);
        $this->addmetatag("og:site_name", $_ENV["APP_NAME"]);
        $this->addmetatag("og:title", $_ENV["APP_NAME"] . " - " . $this->config['title']);
        $this->addmetatag("og:description", $_ENV["APP_DESC"]);

        $this->addresource('cssfiles', '/assets/base.css?t=58', true);
        
        // this HAS to be expanded in the future 
        $this->get_snippet('header', [
            'cssfiles' => $this->cssfiles,
            'jsfiles' => $this->jsfiles,
            'metatags' => $this->metatags,
            'config' => $this->config
        ]);
        
    }
}
