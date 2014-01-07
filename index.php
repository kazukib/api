<?php
require_once('Controllers/Request.php');
require_once('Models/Item.php');
require_once('Views/Items.xml.php');
$test = Request::getUri();

echo $test;

$test2 = $_SERVER['SCRIPT_NAME'];

echo $test2;


$test3= str_replace($test2, '', $test);

echo $test3;

echo ltrim($test3, '/');

$test4 = Item::getdata($test3);
print_r($test4);

Itemsxml::xmlview();

