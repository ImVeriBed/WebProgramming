<div class="ctlg">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/index.php?page=4">
        <h3 class="btncenter">Регистрация</h3>
        <input type="hidden" name="action" value="reg">
        <input type='hidden' name='id' value="<?php echo $newid; ?>">
        <div class="form-group">
            <label class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
                <input class="form-control" name='login'>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
                <input class="form-control" name='password'>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Почта</label>
            <div class="col-sm-10">
                <input class="form-control" name='email'>
            </div>
        </div>
        <div class="btncenter">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
        </div>
    </form>
</div>