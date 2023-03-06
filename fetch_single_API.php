<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $result = $config->fetchSingelAPI($id);

    $record = mysqli_fetch_assoc($result);

    if ($record != null) {
        $res['data'] = $record;
    } else {
        $res['msg'] = "data not found...";
    }
} else {
    $res['msg'] = "Only POST request is allowed...";
}

echo json_encode($res);

?>