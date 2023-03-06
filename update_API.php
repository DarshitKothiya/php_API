<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT , PATCH');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PATCH' || $_SERVER['REQUEST_METHOD'] == 'PUT') {

    parse_str(file_get_contents("php://input"), $_PUT_PATCH);

    $id          = $_PUT_PATCH['id'];
    $name        = $_PUT_PATCH['name'];
    $age         = $_PUT_PATCH['age'];
    $email       = $_PUT_PATCH['email'];
    $departure   = $_PUT_PATCH['departure'];
    $destination = $_PUT_PATCH['destination'];
    $seat        = $_PUT_PATCH['seat'];

    $update_res = $config->updateAPI($id, $name, $age, $email, $departure, $destination, $seat);

    if ($update_res) {
        $res['msg'] = "Record update Successfully ...";
    } else {
        $res['msg'] = "Record Updation failed ...";
    }


} else {
    $res['msg'] = "Only PUT/PATCH request is allowed . . .";
}

echo json_encode($res);
?>