<?php

    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    unset($_SESSION['name']);
    session_destroy();
    $response = 
    [
        "status" => true
    ];


    echo json_encode($response);
    //header('location:../login.php');

?>