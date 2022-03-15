<?php
include_once('../header.php');
header('Access-Control-Allow-Methods: POST');


$data = json_decode(file_get_contents("php://input"));

$item->price = $data ->price;
$item->name = $data ->name;
$item->properties = $data ->properties;

if($item ->create()){
    echo json_encode(array('message'=>'Item Created'));
} else {
    echo json_encode(array('message'=>'Item Not Created'));
}
?>