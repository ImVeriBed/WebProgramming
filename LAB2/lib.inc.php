<?php
$menu = array(
    "Главная страница" => "../index.php",
    "Лабораторная работа №1" => "index.php?page=1",
    "Лабораторная работа №2" => "index.php?page=2",
    "Лабораторная работа №3" => "index.php?page=3",
    "Каталог" => "/index.php?page=4",
    "Регистрация" => "/index.php?page=8"
);
function getMenu($menu)
{
    foreach ($menu as $link => $href) {
        echo "<a href=\"$href\" class='btn btn-default'>", $link, '</a>';
    }
}

function html_table($data = array())
{
    $rows = array();
    foreach ($data as $row) {
        $cells = array();
        foreach ($row as $key => $cell) {
            if ($key != 'filename' && $key != 'id') $cells[] = "<td>{$cell}</td>";
        }
        array_push(
            $cells,
            "<td><form method='POST' action='/index.php?page=4'>
         <input type='hidden' name='action' value='view'>
         <input type='hidden' name='id' value={$row['id']}>
         <input type='hidden' name='place' value={$row['place']}>
         <input type='hidden' name='price' value={$row['price']}>
         <input type='hidden' name='dates' value={$row['dates']}>
         <input type='hidden' name='datep' value={$row['datep']}>
         <input type='hidden' name='filename' value={$row['filename']}>
         <button type='submit' class='btn btn-default'>Открыть</button>
         </form></td>"
        );
        array_push(
            $cells,
            "<td><form method='POST' action='/index.php?page=4'>
         <input type='hidden' name='action' value='delete'>
         <input type='hidden' name='id' value={$row['id']}>
         <button type='submit' class='btn btn-default'>Удалить</button>
         </form></td>"
        );
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    return "<table class='table'><tr class = 'hdr'><td>Место</td><td>Цена, р</td><td>Дата отправления</td><td>Дата возвращения</td><td>Просмотр</td><td>Удаление</td></tr>" . implode('', $rows) . "</table>";
}

function getTableByBase(mysqli_result $result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo "<table class='table'><tr class = 'hdr'>
    <th>Id</th>
    <th>Место</th>
    <th>Цена</th>
    <th>Дата поездник</th>
    <th>Дата возвращения</th>
    <th>Изображение</th>
    <th>Просмотр</th>
    <th>Удаление</th>       
    </tr>";

    for ($i = 0; $i < $rows; ++$i) {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        for ($j = 0; $j < 6; ++$j) echo "<td>$row[$j]</td>";

        echo "<td><form method='POST' action='/index.php?page=4'>
        <input type='hidden' name='action' value='view'>
        <input type='hidden' name='id' value={$row['0']}>
        <input type='hidden' name='place' value={$row['1']}>
        <input type='hidden' name='price' value={$row['2']}>
        <input type='hidden' name='dates' value={$row['3']}>
        <input type='hidden' name='datep' value={$row['4']}>
        <input type='hidden' name='filename' value={$row['5']}>
        <button type='submit' class='btn btn-default'>Открыть</button>
        </form></td>";

        echo "<td><form method='POST' action='/index.php?page=4'>
        <input type='hidden' name='action' value='delete'>
        <input type='hidden' name='id' value={$row['0']}>
        <button type='submit' class='btn btn-default'>Удалить</button>
        </form></td>";

        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

function resize($file)
{
    global $tmp_path;
    //Ограничение по ширине в пикселях
    $max_size = 250;
    //Cоздание исходного изображения на основе исходного файла
    $src = imagecreatefromjpeg($file['tmp_name']);
    //Определение ширины и высоты изображения
    $w_src = imagesx($src);
    $h_src = imagesy($src);
    if ($w_src > $max_size) {
        //Вычисление пропорций
        $ratio = $w_src / $max_size;
        $w_dest = round($w_src / $ratio);
        $h_dest = round($h_src / $ratio);
        //Создание пустого изображения
        $dest = imagecreatetruecolor($w_dest, $h_dest);
        //Копирование старого изображения в новое с изменением параметров
        imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
        //Вывод изображения и очистка памяти
        imagejpeg($dest, $tmp_path . $file['name']);
        imagedestroy($dest);
        imagedestroy($src);
        return $file['name'];
    } else {
        //Вывод изображения без изменения и очистка памяти
        imagejpeg($src, $tmp_path . $file['name']);
        imagedestroy($src);
        return $file['name'];
    }
}

function calculation()
{
    $arr = array();
    switch (strip_tags(trim($_POST['location']))) {
        case 1:
            $arr['location'] = 1000;
            break;
        case 2:
            $arr['location'] = 2000;
            break;
        case 3:
            $arr['location'] = 3000;
            break;
        case 4:
            $arr['location'] = 4000;
            break;
    }

    switch (strip_tags(trim($_POST['season']))) {
        case 1:
            $arr['season'] = 1000;
            break;
        case 2:
            $arr['season'] = 2000;
            break;
        case 3:
            $arr['season'] = 3000;
            break;
        case 4:
            $arr['season'] = 4000;
            break;
    }

    switch (strip_tags(trim($_POST['age']))) {
        case 1:
            $arr['age'] = 1000;
            break;
        case 2:
            $arr['age'] = 2000;
            break;
        case 3:
            $arr['age'] = 3000;
            break;
        case 4:
            $arr['age'] = 4000;
            break;
    }

    switch (strip_tags(trim($_POST['stars']))) {
        case 1:
            $arr['stars'] = 1000;
            break;
        case 2:
            $arr['stars'] = 2000;
            break;
        case 3:
            $arr['stars'] = 3000;
            break;
        case 4:
            $arr['stars'] = 4000;
            break;
    }
    $result = $arr['location'] + $arr['season'] + $arr['age'] + $arr['stars'];
    echo "<h3>Стоимость проживания: {$result}</h3>";
}
