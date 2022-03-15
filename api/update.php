<?php
include_once('../header.php');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input"));


$item->id = $data ->id;
$item->price = $data ->price;
$item->name = $data ->name;
$item->properties = $data ->properties;

if($item ->update()){
    echo json_encode(array('message'=>'Item Updated'));
} else {
    echo json_encode(array('message'=>'Item Not Updated'));
}
?>