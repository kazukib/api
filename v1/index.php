<?php
require_once('api_server.php');

$id_checker = array(
        'path' => $_SERVER['REQUEST_URI'],
    );

preg_match('~[0-9]{4}~', $id_checker['path'], $match);
$id_call = $match[0];
if(strlen($id_call) != 0){
ApiServer::item_id($id_call);
}else{

ApiServer::item();
}
