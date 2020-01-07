<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['place']) && !empty($_POST['price']) && !empty($_POST['dates']) && !empty($_POST['datep'])) {
        session_start();
        $_SESSION['Item']['place'] = strip_tags(trim($_POST['place']));
        $_SESSION['Item']['price'] = strip_tags(trim($_POST['price']));
        $_SESSION['Item']['dates'] = strip_tags(trim($_POST['dates']));
        $_SESSION['Item']['datep'] = strip_tags(trim($_POST['datep']));
        header("Location: /index.php?page=4");
    } else echo 'Полностью заполните форму';
}

?>

<head>
    <meta charset='utf-8' />
    <link href="../css/mystyle_catalog.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="ctlg">
        <form class="form-horizontal" method='POST'>
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
            <div class="btncenter">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Сохранить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>