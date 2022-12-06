<?php

class Router
{
    protected $currentController = 'Users';
    protected $currentMethod = 'register';
    protected $params = [];

    public function __construct()
    {
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
