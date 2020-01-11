<div class="ctlg">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data"  action="/index.php?page=4">
        <input type="hidden" name="action" value="update">
        <input type='hidden' name='id' value="<?php echo $_GET['id']; ?>">
        <div class="form-group">
            <label class="col-sm-2 control-label">Место отдыха</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Лондон" name='place' value="<?php echo $_GET['place']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Цена, р</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="100 000р" name='price' value="<?php echo $_GET['price']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Дата отправления</label>
            <div class="col-sm-10">
                <input class="form-control" name='dates' value="<?php echo $_GET['dates']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Дата возвращения</label>
            <div class="col-sm-10">
                <input class="form-control" name='datep' value="<?php echo $_GET['datep']; ?>">
            </div>
        </div>
        <div class="filecss">
        <input class="form-control" type="hidden" name='filename' value="<?php echo $_GET['filename']; ?>">
            <input class="form-control" type="file" name='uploadfile'>
        </div>
        <div class="btncenter">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Обновить</button>
                </div>
            </div>
        </div>
    </form>
</div>