<?php

namespace App\Core;

class App {

    private $controller = "Home";
    private $action = "Index";
    private $params = [];

    function __construct(){
        
        //process url
        $url = $this -> urlProcess();
// die(var_dump($url));
        $GLOBALS['currentRoute'] = $url[0];

        if(strtolower($url[0]) == "admin"){
            $GLOBALS['currentRoute'] = $url[1];

            if(!isset($_SESSION['admin']) && \strtolower($url[1]) != "login") {
                $url[1] = "login";
                $url[2] = "index";
            }

            unset($url[0]);

            if(file_exists(CONT . DS . "admin" . DS . ucfirst($url[1]) . "Controller.php")){
                $this->controller = ucfirst($url[1]);
                unset($url[1]);
            }

            $this->controller = $this->controller . "Controller";

            require_once(CONT . DS . "admin" . DS . $this->controller . ".php");

            $this->controller = new $this->controller;

            //assign action
            if(isset($url[2]) && method_exists($this->controller, $url[2])){
                $this->action = $url[2];
                unset($url[2]);
            }

            //parmas
            $this->params = $url ? array_values($url):[];

            //call function in controller. Controller -> Action -> Paramsters

            call_user_func_array([$this->controller, $this->action], $this->params);

        } else {
            if(file_exists(CONT . DS . ucfirst($url[0]) . "Controller.php")){
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        $this->controller = $this->controller . "Controller";

        require_once(CONT . DS . $this->controller . ".php");

        $this->controller = new $this->controller;

        //assign action
        if(isset($url[1]) && method_exists($this->controller, $url[1])){
            $this->action = $url[1];
            unset($url[1]);
        }

        //parmas
        $this->params = $url ? array_values($url):[];

        //call function in controller. Controller -> Action -> Paramsters

        call_user_func_array([$this->controller, $this->action], $this->params);
        }
        
    }

    private function urlProcess(){

        if(isset($_GET['url'])){
            $url = explode('/', filter_var(trim($_GET['url'])));

            if ($url[0]  == "admin"){
                if(!isset($url[1])){
                    return[
                        "admin",
                        "Home",
                        "Index"
                    ];
                }
            } 
            return $url;
        } else {
            return[
                "Home",
                "Index"
            ];
        }
    }

}

?>