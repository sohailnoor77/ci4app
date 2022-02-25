<?php

namespace App\Validation;

use App\Models\UserModel;
use CodeIgniter\HTTP\RequestInterface;
use Config\Services;

class VerifyPassword
{
    protected $request;

    public function __construct(?RequestInterface $request = null)
    {
        if ($request === null) {
            $request = Services::request();
        }

        $this->request = $request;
    }

    public function verify($password)
    {
        $userModel = new UserModel();
        $user  = $userModel->find(session()->get('user')['user_id']);
        $verify = password_verify($password, $user['password']);

        if ($verify) {
            return true;
        } else {
            return false;
        }
    }
}