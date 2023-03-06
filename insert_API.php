<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name        = $_POST['name'];
    $age         = $_POST['age'];
    $email       = $_POST['email'];
    $departure   = $_POST['departure'];
    $destination = $_POST['destination'];
    $seat        = $_POST['seat'];

    $result = $config->insertAPI($name, $age, $email, $departure, $destination, $seat);

    if ($result) {
        $res['msg'] = "Message inserted successfully...";
    } else {
        $res['msg'] = "Message insertion Failed...";
    }
} else {
    $res['msg'] = "Only POST request is allowed...";
}

echo json_encode($res);

?>