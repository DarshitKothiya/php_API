<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    parse_str(file_get_contents('php://input'), $_DELETE);

    $id = $_DELETE['id'];

    $result = $config->deleteAPI($id);

    if ($result) {
        $res['msg'] = "Message deleted successfully...";
    } else {
        $res['msg'] = "Message deleteion Failed...";
    }
} else {
    $res['msg'] = "Only POST request is allowed...";
}

echo json_encode($res);

?>