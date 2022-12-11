<?php

    if($_POST['todo_text'] == "" | $_POST['todo_name' == ""])
        $email = $_POST['email'];
        $pdo = $_POST['pdo']; 
        $masstodo = [];
        require_once 'dbpdoconnection.inc.php';
        require_once 'function.inc.php';
        
        die();
        if(checkTodo($pdo, $email) === 'notodo')
        {
             
        }
        else
        {
            $masstodo[] = checkTodo($pdo, $email);
            echo json_encode($masstodo);
        }
    else
    {
        $user = $_POST['user'];
        //$pdo = $_POST['pdo'];
        $todo_name = $_POST['todo_name']; 
        $todo_text = $_POST['todo_text']; 
        $errors_fields = true;
        

        require_once 'dbpdoconnection.inc.php';
        require_once 'function.inc.php';
        

        if(createTodo($pdo,$user,$todo_name,$todo_text))
        {
            echo json_encode($errors_fields);
        }
        else
        {
            $errors_fields = false
            echo json_encode($errors_fields);
        }
    }

?>