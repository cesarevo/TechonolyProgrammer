<?php
    /*$errors = [];
    $userName = $_POST['email'];
    $pwd = $_POST['pwd'];
   
    require_once 'dbpdoconnection.inc.php'
    require_once 'function.inc.php'

    /*$errors['notuser'] = loginUser($pdo,$userName,$pwd)
    echo json_encode($errors);*/

  
    require_once 'dbpdoconnection.inc.php';
    require_once 'function.inc.php';

    $mail = $_POST['email'];
    $pwd = $_POST['pwd'];
    
    $rows = checkUser($pdo,$mail);
    if($rows == 'nonuser')
    {
            $response = 
            [
                "status" => false,
                "message" => 'Неверный логин или пароль'
            ];
            echo json_encode($response);
            
    }
    else
    {
        $fr = password_verify($pwd, $rows['pass']);
        if ($fr) 
        {
            session_start();
            $_SESSION['email'] = $mail;
            $_SESSION['name'] = $rows['name'];
            $_SESSION['password'] = $pwd;
            
            $response = 
            [
                "status" => true
            ];
            echo json_encode($response);

        }
        else {
            $response = 
            [
                "status" => false,
                "message" => 'Неверный логин или пароль'
            ];
            echo json_encode($response);
        }
        
        
    }
    
?>