<div class="ctlg">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/index.php?page=3">
        <input type="hidden" name="action" value="lab3">
        <h3>Расчет стоимости проживания в гостинице</h3>
        <div class="form-group">
            <label class="col-sm-2 control-label">Местоположение гостиницы</label>
            <div class="col-sm-10">
                <!-- <input class="form-control" placeholder="Лондон" name='place'> -->
                <select class="form-control" name='location'>
                    <option value="1">Центр города</option>
                    <option value="2">Побережье</option>
                    <option value="3">За городом</option>
                    <option value="4">В черте города</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Время года</label>
            <div class="col-sm-10">
            <select class="form-control" name='season'>
                    <option value="1">Лето</option>
                    <option value="2">Осень</option>
                    <option value="3">Зима</option>
                    <option value="4">Весна</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Количество звезд</label>
            <div class="col-sm-10">
            <select class="form-control" name='stars'>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>                   
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Возраст проживающего</label>
            <div class="col-sm-10">
            <select class="form-control" name='age'>
                    <option value="1">0-18</option>
                    <option value="2">18-65</option>
                    <option value="3">65+</option>
                </select>
            </div>
        </div>
        <div class="btncenter">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Рассчитать</button>
                </div>
            </div>
        </div>
    </form>
    <?php
    calculation();
    ?>
</div>