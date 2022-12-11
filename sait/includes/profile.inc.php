<?php
session_start();

if (isset($_POST['submit']))
{
    
    $mail = $_SESSION['email'];
    $todo_name = $_POST['todo_name'];
    $todo_text = $_POST['todo_text'];
    $prog = 'false';
    $errors = false;


    require_once 'dbpdoconnection.inc.php';
    require_once 'function.inc.php';
        
    
        if(emptyField([$todo_name, $todo_text])){
            header('location:../profile.php?error=emptyfield');
            $errors = true;
           
        }


        if($errors===false){
            createTodo($pdo,$email,$todo_name, $todo_text,$prog);
            header('location:../profile.php?error=AddTodo');
        }

}
else
{
    header('location:../profile.php');
}

?>