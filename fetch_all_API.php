<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $result = $config->fetchAllAPI();

    $records = [];

    while ($record = mysqli_fetch_assoc($result)) {
        array_push($records, $record);
    }

    $res['data'] = $records;


} else {
    $res['msg'] = "Only GET request is allowed...";
}

echo json_encode($res);

?>