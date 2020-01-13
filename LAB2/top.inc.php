<form class='formHeader' method="POST" action="/index.php">
<input type="hidden" name="logintime" value="<?php echo date('d.m.Y, H:i:s', time())?>">
<input type="hidden" name="action" value="auth">
    <div class='form-inline'>
        <div class='form-group'>
            <label for='login'>Логин:</label>
            <input class='form-control' name='login'>
        </div>
        <div class='form-group'>
            <label for='password'>Пароль:</label>
            <input type='password' class='form-control' name='password''>
        </div>
        <button type='submit' class='btn btn-default'>Войти</button>
    </div>
</form>
