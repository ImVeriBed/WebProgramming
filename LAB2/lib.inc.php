<?php
$menu = array(
    "Главная страница" => "../index.php",
    "Лабораторная работа №1" => "index.php?page=1",
    "Лабораторная работа №2" => "index.php?page=2",
    "Лабораторная работа №3" => "index.php?page=3",
    "Каталог" => "/index.php?page=4"
);
function getMenu($menu)
{
    foreach ($menu as $link => $href) {
        echo "<a href=\"$href\" class='btn btn-default'>", $link, '</a>';
    }
}

function html_table($data = array())
{
    $cnt = -1;
    $rows = array();
    foreach ($data as $row) {
        $cnt++;
        $cells = array();
        foreach ($row as $cell) {
            $cells[] = "<td>{$cell}</td>";           
        }
        array_push($cells, "<td><form method='POST' action='/index.php?page=4'><input type='hidden' name='action' value='delete'><input type='hidden' name='id' value={$cnt}><button type='submit' class='btn btn-default'>Удалить</button></form></td>");       
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    return "<table class='table'><tr class = 'hdr'><td>Место</td><td>Цена, р</td><td>Дата отправления</td><td>Дата возвращения</td><td></td></tr>" . implode('', $rows) . "</table>";
}
