<?php

function component($name, $data = [])
{

    $dir = __DIR__ . "/../components";
    $file = $dir . "/" . $name . ".php";

    if (file_exists($file)) {
        extract($data);
        include $file;
    } else {
        return '';
    }
}
