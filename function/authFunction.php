<?php

function setAuth($user)
{
    $_SESSION['auth'] = $user;
}

function auth()
{
    return  isset($_SESSION['auth']) ? $_SESSION['auth'] : null;
}

function isLogin()
{
    if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
        return true;
    } else {
        return false;
    }
}

function onlyAuth()
{
    if (!isLogin()) {
        redirect('/login');
    }
}
function onlyGuest()
{
    if (isLogin()) {
        redirect('/');
    }
}
