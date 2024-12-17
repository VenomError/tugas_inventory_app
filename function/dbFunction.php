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
