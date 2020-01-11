<div class="ctlg">
    <form class="form-horizontal" method="POST" action="/index.php?page=7">
        <input type="hidden" name="action" value="edit">
        <input type='hidden' name='id' value="<?php echo $_GET['id']; ?>">
        <div class="form-group">
            <label class="col-sm-2 control-label">Место отдыха</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Лондон" name='place' value="<?php echo $_GET['place']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Цена, р</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="100 000р" name='price' value="<?php echo $_GET['price']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Дата отправления</label>
            <div class="col-sm-10">
                <input class="form-control" name='dates' value="<?php echo $_GET['dates']; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Дата возвращения</label>
            <div class="col-sm-10">
                <input class="form-control" name='datep' value="<?php echo $_GET['datep']; ?>" readonly>
            </div>
        </div>
        <div class="btncenter">
        <img src="<?php echo $_GET['filename']; ?>";
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Редактировать</button>
                </div>
            </div>
        </div>       
    </form>
</div>