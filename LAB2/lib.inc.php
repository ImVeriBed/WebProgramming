<?php
$menu = array(
    "Главная страница" => "../index.php",
    "Лабораторная работа №1" => "index.php?page=1",
    "Лабораторная работа №2" => "index.php?page=2",
    "Лабораторная работа №3" => "index.php?page=3"
);
function getMenu($menu, $vertical = true)
{
    //%style = "";   
    // if(!$vertical)
    //     $style = "display:inline";       
    //echo '<ul style="list-style-type:none">';      
    foreach ($menu as $link => $href) {
        echo "<a href=\"$href\" class='btn btn-default'>", $link, '</a>';
    }
}
