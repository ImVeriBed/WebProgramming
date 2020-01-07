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
