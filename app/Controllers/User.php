<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfilesModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class User extends BaseController
{
    private $userModel = NULL;
    private $profileModel = NULL;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->profileModel = new ProfilesModel();
    }

    // Signup User
    public function register()
    {
        // Begin Transaction
        $this->userModel->transBegin();

        if (!$this->userModel->insert($this->request->getPost())) {
            $this->session->setFlashdata('errors', $this->userModel->errors());
            return redirect()->to('signup')->withInput();
        }

        // Taking User ID
        $data = [
            'user_id' => $this->userModel->insertID(),
            'name' => $this->request->getPost('name'),
        ];

        if (!$this->profileModel->insert($data)) {
            $this->userModel->transRollback();
            $this->session->setFlashData('errors', $this->userModel->errors());
            return redirect()->to('signup');
        }

        $this->userModel->transCommit();
        $this->session->setFlashData('message', "User Registered Successfully");
        return redirect()->to('login');
    }

    // Login User
    public function login()
    {
        // Getting Login Input Values
        // $email = $this->request->getPost('email');
        // $password = $this->request->getPost('password');

        // Selecting User Email Exists In Database
        $user = $this->userModel->authenticate($this->request->getPost());
        if ($user) {
            $this->session->set('user', $user);
            $this->session->setFlashData('success_msg', 'Login successfully');
            return redirect()->to('home');
        }

        $this->session->setFlashData('error', 'Unknown Email OR Password');
        return redirect()->to('login')->withInput();
    }

    // Logout User
    public function logout()
    {
        $this->session->remove('user');
        $this->session->setFlashData('logout_msg', 'Logged Out Successfully');
        return redirect()->to('login');
    }

    // Profile 
    public function profile($id)
    {
        $profile = $this->profileModel->where('user_id', $id)->first();
        if (!$profile) {
            throw PageNotFoundException::forPageNotFound('User Not found');
        }
        return view('profile', $profile);
    }

    // Update Profile
    public function updateProfile($user_id)
    {
        if ($user_id != null) {
            if (
                !$this->profileModel->set((array)$this->request->getPost())->where(['user_id' => $user_id])->update()
                && !$this->userModel->update($user_id, $this->request->getPost())
            ) {
                return redirect()->back()->withInput();
            }
            $this->session->setFlashData('profileUpdate', 'Profile Updated Successfully');
            return redirect()->to('users/' . $user_id . '/profile');
        }

        return 'ID is NULL';
    }

    // Change Password
    public function changePassword()
    {
        $user_id = session()->get('user')['user_id'];
        if (!$this->userModel->update($user_id, $this->request->getPost())) {
            // var_dump($user_id);
            // die;
            $this->session->setFlashData('errors', $this->userModel->errors());
            return redirect()->back()->withInput();
        }

        $this->session->setFlashData('update_password', 'Password Change Successfully');
        return redirect()->to('users/' . $user_id . '/profile');
    }
}