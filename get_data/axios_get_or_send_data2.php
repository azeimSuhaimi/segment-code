<?php

$receive_data = json_decode(file_get_contents("php://input"));

if($receive_data->firstName){
echo json_encode($receive_data);
}

?>