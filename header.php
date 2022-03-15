<?php
//Headers
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
header('Authorization: APP_KEY');

include_once('../config/Database.php');
include_once('../models/Item.php');

// Instantiate database and conenction to it

$database = new Database();
$db = $database -> connect();

$item = new Item($db);
