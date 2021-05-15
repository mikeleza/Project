<?php 
    header('Content-Type: application/json');

    require_once '../connection.php';

    $sqlQuery = "SELECT * FROM chart ";
    $result = $db->query($sqlQuery);


    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }


    echo json_encode($data);
