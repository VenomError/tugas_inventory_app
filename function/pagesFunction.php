<?php

function getUrl()
{
    $url = 'index';
    if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] !== '/') {
        $url = trim($_SERVER['PATH_INFO'], '/');
    }

    return $url;
}

function renderPage($url)
{
    $path = __DIR__ . "/../pages/{$url}.php";
    if (file_exists($path)) {
        ob_start();
        include $path;
        return ob_get_clean();
    } else {
        echo "File Not Found In : pages/{$url}.php";
    }
}
