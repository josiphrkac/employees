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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_URL);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'repeat_password' => trim($_POST['repeat_password']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'repeat_password_error' => ''
            ];

            if (empty($data['name'])) {
                $data['name_error'] = 'Username required';
            }
            if (empty($data['email'])) {
                $data['email_error'] = 'Email required';
            } else {
            }
            if (empty($data['password'])) {
                $data['passwor_error'] = 'Password required';
            }
            if (empty($data['repeat_password'])) {
                $data['repeat_password_error'] = 'Must repeat password';
            }
            if (empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['repeat_password_error'])) {
                $this->userModel->registerUser($data);
                $this->view('register', $data);
            }



            $this->view('register', $data);
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'repeat_password' => '',
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'repeat_password_error' => ''
            ];



            $this->view('register', $data);
        }
    }
    public function login()
    {
        $data = [];
        $this->view('login', $data);
    }
}
