<?php

require 'SmsSend.php';

if(!empty($_POST['key']))
{
    $status = (new SmsSend())->block($_POST['key']);
    if($status) {
        echo json_encode([ 'status' => true, 'response' => $status ]);
    } else {
        echo json_encode([ 'status' => false ]);
    }
}