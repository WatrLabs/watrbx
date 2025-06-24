<?php

namespace watrlabs\router;
use watrlabs\watrkit\pagebuilder;

class Routing {
    
    protected array $routes = [];
    protected array $prefix = [];
    protected $currentprefix = '';
    protected $currentmiddleware = null;

    public function get(string $uri, callable $callback) {
        $fullUri = $this->currentprefix . (rtrim($uri, '/') ?: '/');

        if ($this->currentmiddleware) {
            $originalcallback = $callback;
            $middleware = $this->currentmiddleware;
            
            $callback = function() use ($middleware, $originalcallback) {
                $middleware();
                return call_user_func_array($originalcallback, func_get_args());
            };
        }

        $this->routes['GET'][strtolower($fullUri)] = $callback;
    }

    public function post(string $uri, callable $callback) {
        $fullUri = $this->currentprefix . (rtrim($uri, '/') ?: '/');

        if ($this->currentmiddleware) {
            $originalcallback = $callback;
            $middleware = $this->currentmiddleware;
            
            $callback = function() use ($middleware, $originalcallback) {
                $middleware();
                return call_user_func_array($originalcallback, func_get_args());
            };
        }

        $this->routes['POST'][strtolower($fullUri)] = $callback;
    }
    
    public function put(string $uri, callable $callback) {
        $fullUri = $this->currentprefix . (rtrim($uri, '/') ?: '/');

        if ($this->currentmiddleware) {
            $originalcallback = $callback;
            $middleware = $this->currentmiddleware;
            
            $callback = function() use ($middleware, $originalcallback) {
                $middleware();
                return call_user_func_array($originalcallback, func_get_args());
            };
        }

        $this->routes['PUT'][strtolower($fullUri)] = $callback;
    }
    
    public function del(string $uri, callable $callback) {
        $fullUri = $this->currentprefix . (rtrim($uri, '/') ?: '/');

        if ($this->currentmiddleware) {
            $originalcallback = $callback;
            $middleware = $this->currentmiddleware;
            
            $callback = function() use ($middleware, $originalcallback) {
                $middleware();
                return call_user_func_array($originalcallback, func_get_args());
            };
        }

        $this->routes['DELETE'][strtolower($fullUri)] = $callback;
    }
    
    public function connect(string $uri, callable $callback) {
        $fullUri = $this->currentprefix . (rtrim($uri, '/') ?: '/');

        if ($this->currentmiddleware) {
            $originalcallback = $callback;
            $middleware = $this->currentmiddleware;
            
            $callback = function() use ($middleware, $originalcallback) {
                $middleware();
                return call_user_func_array($originalcallback, func_get_args());
            };
        }

        $this->routes['CONNECT'][strtolower($fullUri)] = $callback;
    }
    
    public function options(string $uri, callable $callback) {
        $fullUri = $this->currentprefix . (rtrim($uri, '/') ?: '/');

        if ($this->currentmiddleware) {
            $originalcallback = $callback;
            $middleware = $this->currentmiddleware;
            
            $callback = function() use ($middleware, $originalcallback) {
                $middleware();
                return call_user_func_array($originalcallback, func_get_args());
            };
        }

        $this->routes['OPTIONS'][strtolower($fullUri)] = $callback;
    }
    
    public function trace(string $uri, callable $callback) {
        $fullUri = $this->currentprefix . (rtrim($uri, '/') ?: '/');

        if ($this->currentmiddleware) {
            $originalcallback = $callback;
            $middleware = $this->currentmiddleware;
            
            $callback = function() use ($middleware, $originalcallback) {
                $middleware();
                return call_user_func_array($originalcallback, func_get_args());
            };
        }

        $this->routes['TRACE'][strtolower($fullUri)] = $callback;
    }
    
    public function patch(string $uri, callable $callback) {
        $fullUri = $this->currentprefix . (rtrim($uri, '/') ?: '/');

        if ($this->currentmiddleware) {
            $originalcallback = $callback;
            $middleware = $this->currentmiddleware;
            
            $callback = function() use ($middleware, $originalcallback) {
                $middleware();
                return call_user_func_array($originalcallback, func_get_args());
            };
        }

        $this->routes['PATCH'][strtolower($fullUri)] = $callback;
    }
    
    public function group($prefix, $routes, $middleware = null) {
        $previousprefix = $this->currentprefix;
        $previousmiddleware = $this->currentmiddleware;
    
        $this->currentprefix .= rtrim($prefix, '/');
        $this->currentmiddleware = $middleware;
        
        $routes($this);
        
        $this->currentprefix = $previousprefix;
        $this->currentmiddleware = $previousmiddleware;
    }

    public function dispatch($uri, $method) {
        
        $uri = rtrim($uri, '/') ?: '/';
        
        if (isset($this->routes[$method][$uri])) {
            return call_user_func($this->routes[$method][$uri]);
        }
        
        if(isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routepattern => $callback){
                $regex = $this->convertregex($routepattern);
                
                if(preg_match($regex, $uri, $matches)) {
                    array_shift($matches);
                    return call_user_func_array($callback, $matches);
                }
                
            }
        }
        
        foreach($this->routes as $registeredmethod => $routesformethod){
            if(isset($routesformethod[$uri])){
                return $this->return_status(405);
            }
        }
            
        return $this->return_status(404);
    }

    public function addrouter($routername) {
        require_once "../routes/{$routername}.php";
    }

    static function return_status($statuscode){
        $pagebuilder = new pagebuilder();
        $pagebuilder->get_template("status_codes/$statuscode");
        http_response_code($statuscode);
    }
    
    protected function convertregex($pattern) {
        $regex = preg_replace('#\{[^/]+\}#', '([^/]+)', $pattern);
        return '#^' . $regex . '$#';
    }

}
