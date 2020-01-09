<?php

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
    return "<table class='table'><tr class = 'hdr'><td>Место</td><td>Цена, р</td><td>Дата отправления</td><td>Дата возвращения</td><td></td></tr>" . implode('', $rows) . "</table>";
}

$items = $_SESSION['Item'];

?>

<div class="ctlg">
    <a href="index.php?page=5" class='btn btn-default' type="submit">Добавить</a>
    <?php
    echo html_table($items);
    ?>
    <button type='submit' class='btn btn-default'>Удалить</button>
</div>