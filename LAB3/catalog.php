<?php
$place = "";
$price = "";
$dates = "";
$datep = "";
//session_start();
if (isset($_POST['delete']) && isset($_POST['cbs'])) {

    unset($_SESSION['Item']); //Удаление сессионной записи

}

if (!empty($_SESSION['Item']['place'])) {

    $place = $_SESSION['Item']['place'];
    $price = $_SESSION['Item']['price'];
    $dates = $_SESSION['Item']['dates'];
    $datep = $_SESSION['Item']['datep'];
}

function html_table($data = array())
{
    $rows = array();
    foreach ($data as $row) {
        $cells = array();
        foreach ($row as $cell) {
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    return "<table class='table'><tr class = 'hdr'><td>Место</td><td>Цена, р</td><td>Дата отправления</td><td>Дата возвращения</td><td>Выбрать</td></tr>" . implode('', $rows) . "</table>";
}

$checkb = "<div class='checkbox'><label><input type='checkbox'>  </label> </div>";
$data = array(
    array('1' => 'Москва', '2' => '10200', '3' => '07.02.2020', '4' => '07.02.2021', '5' => $checkb),
    array('1' => 'Санкт-Петербург', '2' => '12000', '3' => '07.02.2020', '4' => '07.02.2021', '5' => $checkb),
    array('1' => 'Калининград', '2' => '22000', '3' => '07.02.2020', '4' => '07.03.2020', '5' => $checkb)
);

$buffArray = array('1' => $place, '2' => $price, '3' => $dates, '4' => $datep, '5' => $checkb);
if (!empty($_SESSION['Item']['place'])) array_push($data, $buffArray);

?>

<head>
    <meta charset='utf-8' />
    <link href="../css/mystyle_catalog.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="ctlg">
        <!-- <a href="index.php?page=5" class='btn btn-default' type="submit">Добавить</a> -->
        <!-- <button onclick="location.href='index.php?page=5'" type='submit' class='btn btn-default'>Добавить</button> -->
        <?php
        echo html_table($data);
        ?>
        <button onclick="location.href='index.php?page=5'">Добавить</button>
        <button type='submit' class='btn btn-default'>Удалить</button>
    </div>
</body>