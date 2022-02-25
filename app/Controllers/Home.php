<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Database;

class Home extends BaseController
{
    public function index()
    {
        // Facebook Login API Config

        // $config = [
        //     'callback' => base_url('/home'),
        //     'keys' => [
        //         'id' => '701127541255099',
        //         'secret' => 'e9690205af8da37e8c26c90718d713bd',
        //     ],
        // ];

        // $facebook = new Facebook($config);

        // var_dump($facebook);
        // die;
        // try {
        //     $facebook->authenticate();

        //     $accessToken = $facebook->getAccessToken();
        //     $userProfile = $facebook->getUserProfile();
        //     $apiResponse = $facebook->apiRequest('statuses/home_timeline.json');
        // } catch (\Exception $e) {
        //     echo 'Oops, we ran into an issue! ' . $e->getMessage();
        // }

        $data = [
            'title' => 'Home',
        ];

        return view('home', $data);
    }
}