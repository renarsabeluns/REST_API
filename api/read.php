<?php

include_once('../header.php');

$result = $item -> read();
$num = $result->rowCount();

if($num > 0){
    //Item array
    $items_arr = array();
    $items_arr['data']=array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $items_unit = array(
            'id' => $id,
            'name'=>$name,
            'price'=>$price,
            'properties'=>$properties
        );

        array_push($items_arr['data'], $items_unit);
    }
    
    //Format to JSON

    echo json_encode($items_arr);

} else {
//No Items

echo json_encode(array('message'=>'No items found'));

}
?>