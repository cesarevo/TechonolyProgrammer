<form class ="wind">
    <?php
        if (!isset($_SESSION)) {session_start();}
        //$player = "<?php echo $_SESSION['email'];
        $eml = $_SESSION['email'];
    ?>
    <input type="text" placeholder="" name = "todo_name"placeholder="Заголовок">
    <div name ="msg"> </div>
    <textarea name="todo_text" id="" cols="30" placeholder="Доп.информация" rows="10"></textarea>
   
    <button OnClick = "addtodo(event,'<?=$_SESSION['email']?>')">
        <h5>Сохранить</h5>
    </button>
</form>
