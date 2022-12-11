<form class ="card" action = "includes/todo.inc.php" method = "post">
    <?php
     $_SESSION['todo_name'] = $row['name'];
     $_SESSION['todo_id'] = $row['id'];
    ?>
    <input type="text" placeholder="" value='<?php print($row['name']);?>' name = "name" placeholder="Заголовок" readonly>
    <textarea name="todo_text "  id="" cols="30" placeholder="Доп.информация" rows="10" readonly><?php print($row['todo_text']);?></textarea>
    <button type ="submit" name="submit">
        <h5>Удалить</h5>
    </button>
</form>