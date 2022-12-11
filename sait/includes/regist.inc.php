<?php 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $errors_fields = [];
        
        require_once 'dbpdoconnection.inc.php';
        require_once 'function.inc.php';

        if(existUser($pdo,$email))
        {
            $errors_fields = 
            [
                "status" => false,
                "message" => 'Дfнная почта уже используется'
            ]; 
        }
        if(empty($errors_fields))
        {
                createUser($pdo,$name,$email,$pwd);
                $errors_fields = 
                [
                    "status" => true,
                    "message" => 'Регистрация успешна'
                ];
                echo json_encode($errors_fields);
        }
        else
                echo json_encode($errors_fields);
            
?>