<?php
//require_once('Api/Controllers/Request.php');
use \Controllers_Request;

$test = Request::getUri();

echo $test;

$test2 = $_SERVER['SCRIPT_NAME'];

echo $test2;


$test3= str_replace($test2, '', $test);

echo $test3;

echo ltrim($test3, '/');
