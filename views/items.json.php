<?php
    require_once('/api/models/item.php');
    header("Content-Type: application/json; charset=utf-8");
    $json_r = Item::getdata(price);
    echo json_encode($json_r,JSON_UNESCAPED_UNICODE);
?>
