<div class ="regist">
    
        <form >
            <h1>РЕГИСТРАЦИЯ</h1>
            
            <input type="text" placeholder="Full Name" name = "regist-name">
            <input type="email" placeholder="Email" name = "regist-email">
            <input type="password"placeholder="Пароль" name = "regist-pass">
            <input type="password"placeholder="Повторите пароль" name ="regist-reqpass">
            <button type ="submit" name="submit" OnClick="registration(event)">
                <h5>Зарегистрироваться</h5>
            </button>
            <p>Уже есть аккаунт? - <a OnClick ="makeRequest('login.php')">Авторизируйтесь</a> </p>
            <div class= "msg" name = "msg"></div>
        </form>

    
</div>