<?php
if(isset($_SESSION['email']) and isset($_SESSION['password']))
{   
    require('profile.php');
}
?>



<!DOCTYPE html>
<html>
	<head>
	<meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
		<title>
        Сайт
		</title>
		<link href="Вт 7стиль.css" rel="stylesheet">
		
        
    </head>
<body onLoad="checkHash();">
	<header>
                <div class= "time4school">
                    <div class="school">
                        <button OnClick ="makeRequest('main.php')"><img src='images\logo.png'></button>
                    
                            <h1>VidTranslator</h1>
                    </div>
					<div>
					</div>
                    <form  method="Post" >
                        <?php
                        session_start();
                        if(isset($_SESSION['email']) and isset($_SESSION['password']))
                        {
                        ?>
                        
                            <input type="button" name="log" value="<?php $_SESSION['email'] ?>" OnClick ="makeRequest('profile.php')">
                            <?php
                        }
                        else
                        {
                            ?>
                            <input type="button" name="log" img src='images\pers.png' OnClick ="makeRequest('login.php')">
                            <?php
                        }

                        ?>
                        
                    </form>
  
                </div>
                

             
	</header>
	<div id="wrapper">

	</div>
    
	



    <script type = "text/javascript" language="javascript" src="function.js"></script>
	<footer>
		<h1>END<h1>
	</footer>
</body>




</html>