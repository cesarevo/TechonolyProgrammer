
<div class ="profile">   
    <form>
        <?php
        session_start();
         if(isset($_SESSION['email']) and isset($_SESSION['password']))
         {
            require_once 'includes/dbpdoconnection.inc.php';
            require_once 'includes/function.inc.php';
             ?>
                <script>
                    profemail = <?=$_SESSION['email']?>;
                </script>
                <form  action = "" method = "post" onLoad = "loadtodo(event,'<?=$_SESSION['email']?>')">
                <h1>ПРОФИЛЬ</h1>
                    
                    <H4>Имя:<?=$_SESSION['name']?></H4>
                    <h4>Email:<?=$_SESSION['email']?> </h4>
                    <button name="submit" Onclick="logout(event)">
                        <h5>Выйти</h5>
                    </button>
                    <h4>Список дел:</h4>      
                    <div id ="todolist">

                    </div>
                </form>
            <?php
            
            require 'todo.php';
           
            ?>
             <?php
             
         }
         else{
            header('location:login.php');
         }

        ?>
    </form>
                         
</div>
