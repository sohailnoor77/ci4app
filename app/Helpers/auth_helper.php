<?php

function loggedIn()
{
    $user = session()->get('user');

    if ($user && $user['isLoggedIn']) {
        return true;
    }

    return false;
}

function allowEdit($username)
{
    $user = session()->get('user');
    if ($user['username'] === $username) {
        return true;
    }

    return false;
}