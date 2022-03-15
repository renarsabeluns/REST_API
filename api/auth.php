<?php

include_once('../header.php');

$token = $item; 


if($token -> auth()){
    http_response_code(200);

    echo json_encode(
        $token->auth()
    );
    

} else {
//No Items
http_response_code(404);

echo json_encode(array('message'=>'Couldnt create token for this API'));

}
?>