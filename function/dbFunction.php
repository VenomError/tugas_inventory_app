<?php
function statusStockColor($status)
{

    switch ($status) {

        case "tersedia":
            return "success";
        case "hampir habis":
            return "warning";
        case "habis":
            return "danger";
        default:
            return "info";
    }
}

function stockTypeColor($type)
{

    switch ($type) {

        case "stock_in":
            return "success";
        case "stock_out":
            return "danger";
        default:
            return "info";
    }
}


function generateUUID()
{
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}
