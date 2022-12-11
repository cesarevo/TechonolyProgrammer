 <div class="login">
    <form>
        <h1>АВТОРИЗАЦИЯ</h1>
        <input type="email" placeholder="Email..." name = "login-email">
        <input type="password"placeholder="Password" name = "login-pwd">
        <button name="submit" onclick="login(event)">
            <h5>Войти</h5>
        </button>
        <p>Нет аккаунта? - <a OnClick ="makeRequest('regist.php')" >Зарегистрируйтесь</a> </p>
        <div class= "msg" name = "msg"></div>
</form>
 </div>
 