<?php

class Router
{
    protected $currentController = 'Users';
    protected $currentMethod = 'register';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        if (isset($url[0]) && file_exists('../backApp/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = $url[0];
            unset($url[0]);
        }

        require_once '../backApp/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;


        if (isset($url[1]) && method_exists($this->currentController, $this->currentMethod)) {
            $this->currentMethod = $url[1];
            unset($url[1]);
        }


        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            $users = ['Users'];
            return $users;
        }
    }
}
