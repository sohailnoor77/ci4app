<?php

namespace App\Controllers;

class Page extends BaseController
{
    protected $helpers = ['form', 'auth'];
    public function about()
    {
        $data = [
            'name' => 'Sohail Noor',
            'title' => 'About'
        ];
        return view('about', $data);
    }

    // Login
    public function login()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login', $data);
    }

    // Signup
    public function signup()
    {
        $data = [
            'title' => 'Signup'
        ];
        return view('signup', $data);
    }

    public function contact()
    {
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate([
                'email' => 'required',
                'name' => 'required',
                'message' => 'required',
            ])) {
                // var_dump($this->validator->getErrors());
                // $errors = $this->validator->listErrors('my_list');
                $errors = $this->validator;
            }
            $data = [
                'email' => 'sohail@jmm.ltd',
                'title' => 'Contact',
                'form_error' =>  isset($errors) ? $errors : [],
                'c_f' => [
                    'form_open' => form_open('/contact'),
                    'email' => form_input(['type' => 'email', 'class' => 'form-control', 'name' => 'email', 'value' => $this->request->getPost('email')]),
                    'name' => form_input(['type' => 'text', 'class' => 'form-control', 'name' => 'name', 'value' => $this->request->getPost('name')]),
                    'message' => form_textarea(['class' => 'form-control', 'name' => 'message', 'value' => $this->request->getPost('message')]),
                ],
            ];
        } else {
            $data = [
                'email' => 'sohail@jmm.ltd',
                'title' => 'Contact',
                'form_error' => null,
                'c_f' => [
                    'form_open' => form_open('/contact'),
                    'email' => form_input(['type' => 'email', 'class' => 'form-control', 'name' => 'email']),
                    'name' => form_input(['type' => 'text', 'class' => 'form-control', 'name' => 'name']),
                    'message' => form_textarea(['class' => 'form-control', 'name' => 'message']),
                ],
            ];
        }

        echo '<p class="alert alert-success container my-3">Form Submitted</p>';
        return view('contact-us', $data);
    }
}