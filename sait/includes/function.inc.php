<?php
    function loginUser($pdo,$userName,$pwd){
        $emailExist = emailExist($pdo,$userName);
        if($emailExist === false){
            return json_encode('Not User');
        }
        $pwdHashed = $emailExist ->userPwd;

        $checkPwd = password_verify($pwd,$pwdHashed);
        if($checkPwd === false){
            header('location:../login.php&error=wrongpwd');
            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION['userid'] = $emailExist->userId;
            echo $_SESSION['userid'];
            header('location:../index.php?ok=Yes');
            exit();
        }
    }

//     function emptyField($fiels){
//         $result = false;
//         foreach ($fiels as $field)
//         {
//                 if(empty($field)){
//                     $result = true;
//                     break;
//                 }
//         }
//         return $result;
        
//     }

//     function missPassword($pwd, $pwdrepeat){
//         $result = false;
//         if($pwd !== $pwdrepeat)
//         {
//             $result = true;
//         }
//         return $result;

//     }
function existUser($pdo,$mail)
{
       
    $result = false;
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$mail]);
        
    if($stmt)
    {
        if($stmt->rowCount() === 0)
        {
            return $result;
        }
        else
        {
            $result = true;
            return $result;
        }
    }
        
}


function createUser($pdo,$name,$email,$pwd)
{
         $sql = "INSERT INTO users (fullname,email,password) VALUES (?,?,?);";
         try{
             $stmt = $pdo->prepare($sql);
             $hashPwd = password_hash($pwd, PASSWORD_BCRYPT);
             $stmt -> execute([$name, $email, $hashPwd]);
             header('location: ../regist.php?error=none');
         }
         catch(PDOExaption $e){
             header('location:../regist.php?error=stmt&message='. $e->getMessage());
         }
}

function checkUser($pdo,$mail)
{
         $sql = "SELECT fullname AS name, password AS pass FROM users WHERE email = ?";
         try{
             $stmt = $pdo->prepare($sql);
             $stmt -> execute([$mail]);
         }
         catch(PDOExpression $e){
             header("locations:../index.php?error=stmt&message=".$e->get);
             exit();
         }
         $row = $stmt->fetch(PDO::FETCH_LAZY);
         if($row == null)
             return 'nonuser';
         return $row;
        
        
}
function createTodo($pdo,$mail,$todo_name, $todo_text,$prog){
    $sql = "INSERT INTO todo_list (user,todo_name,todo_text/*,progress*/) VALUES (?,?,?/*,?*/);";
    try{   
        $stmt = $pdo->prepare($sql);
        $stmt -> execute([$mail, $todo_name, $todo_text/*,$prog*/]);
        return true;
        //header('location: ../profile.php?error=none');
    }
    catch(PDOExaption $e)
    {
        return false;
        //header('location:../profile.php?error=stmt&message='. $e->getMessage());
    }
}

function checkTodo($pdo,$mail)
{
    $sql = "SELECT todo_name AS name, todo_text, id,progress  FROM todo_list WHERE user = ?";
    try{
        $stmt = $pdo->prepare($sql);
        $stmt -> execute([$email]);
    }
    catch(PDOExpression $e){
        header("locations:../index.php?error=stmt&message=".$e->get);
        exit();
    }
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        return "todo_card.php";
    }
    
    if($row == null)
        return 'notodo';
       
    return $row;
}
function delTodo($pdo,$todo_name,$id)
{
    $sql = "DELETE FROM todo_list WHERE todo_name = ? and id = ?";
    try{
        $stmt = $pdo->prepare($sql);
        $stmt -> execute([$todo_name,$id]);
    }
    catch(PDOExpression $e){
        header("locations:../index.php?error=stmt&message=".$e->get);
        exit();
    }
        
}
function progressTodo($pdo,$todo_id,$prog)
{
    $sql = "SELECT progress FROM todo_list WHERE id = ?";
    try{
        $stmt = $pdo->prepare($sql);
        $stmt -> execute([$todo_id]);
    }
    catch(PDOExpression $e){
        header("locations:../index.php?error=stmt&message=".$e->get);
        exit();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
    if($row['progress'] == 'true')
        $prog = 'false';
        
        
    $sql = "UPDATE todo_list SET progress = ? WHERE id = ?";
    try{
        $stmt = $pdo->prepare($sql);
        $stmt -> execute([$prog,$todo_id]);
    }
    catch(PDOExpression $e){
        header("locations:../index.php?error=stmt&message=".$e->get);
        exit();
    }



}

    

?>