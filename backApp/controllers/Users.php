<?php

class  Users extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function register()
    {
        $data = [];
        $this->view('register', $data);
    }

    public function login()
    {
        $data = [];
        $this->view('login', $data);
    }
}
