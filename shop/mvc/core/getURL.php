<?php
class App {

    protected $controller = 'home';
    protected $action = 'init';
    protected $params = [];

    function __construct() {
        $url = $this->getUrl();
        // get controller element
        if(isset($url[0]) && file_exists('./mvc/controllers/'.$url[0].'.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once './mvc/controllers/'.$this->controller.'.php';
        
        // get action element
        if(isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->action = $url[1];
            unset($url[1]);
        }

        //  get parameters element
        $this->params = $url? array_values($url) : [];
        
        $this->controller = new $this->controller;
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    private function getUrl() {
            return isset($_GET["url"])? explode("/", filter_var(trim($_GET["url"], "/"))) : [];
    }
}
?>