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
                if ($this->userModel->emailChecker($data['email'])) {
                    $data['email_error'] = 'Email already in use';
                }
            }
            if (empty($data['password'])) {
                $data['password_error'] = 'Password required';
            } else {
                if (strlen($data['password']) < 5) {
                    $data['password_error'] = 'Password require at least 5 characters';
                }
            }
            if (empty($data['repeat_password'])) {
                $data['repeat_password_error'] = 'Must repeat password';
            } else 
            if ($data['repeat_password'] != $data['password']) {
                $data['repeat_password_error'] = 'Password does not match';
            }
            if (empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['repeat_password_error'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->registerUser($data)) {

                    $this->view('login', $data);
                } else {
                    die('Registration failed');
                }
            } else {
                $this->view('register', $data);
            }
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_URL);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_error' => '',
                'password_error' => '',
            ];

            if (empty($data['email'])) {
                $data['email_error'] = 'Email required to log in';
            } else {
                if ($this->userModel->emailChecker($data['email'])) {
                    //User found
                } else {
                    $data['email_error'] = 'User not found';
                }
            }
            if (empty($data['password'])) {
                $data['password_error'] = 'Password required to log in';
            }

            if (empty($data['email_error']) && empty($data['password_error'])) {
                $loggedUser = $this->userModel->loginUser($data['email'], $data['password']);

                if ($loggedUser) {
                    //create user session
                    $this->view('login', $data);
                } else {
                    $data['password_error'] = 'Password incorrect';
                    $this->view('login', $data);
                }
            } else {
                $this->view('login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => ''
            ];
            $this->view('login', $data);
        }
    }
}
