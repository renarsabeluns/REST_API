<?php
//Headers
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once('../config/Database.php');
include_once('../models/Item.php');

// Instantiate database and conenction to it

$database = new Database();
$db = $database -> connect();

$item = new Item($db);
