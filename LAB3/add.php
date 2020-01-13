<div class="ctlg">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/index.php?page=4">
        <input type="hidden" name="action" value="add">
        <input type='hidden' name='id' value="<?php echo $newid; ?>">
        <div class="form-group">
            <label class="col-sm-2 control-label">Место отдыха</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="Лондон" name='place'>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Цена, р</label>
            <div class="col-sm-10">
                <input class="form-control" placeholder="100 000р" name='price'>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Дата отправления</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='dates'>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Дата возвращения</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='datep'>
            </div>
        </div>
        <div class="filecss">
            <input class="form-control" type="file" name='uploadfile'>
        </div>
        <div class="btncenter">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type='submit' class='btn btn-default'>Сохранить</button>"
                </div>
            </div>
        </div>
    </form>
</div>