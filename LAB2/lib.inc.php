<?php
    $menu = array(
        "Главная страница"=>"../index.php",      
        "Лабораторная работа №1"=>"LAB1/lab_rab1.html",       
        "Лабораторная работа №2"=>"LAB2/lab_rab2.php",
        "Лабораторная работа №3"=>"LAB3/lab_rab3.php");    
    function getMenu($menu)   
    {         
        foreach ($menu as $link=>$href)   
        {        
            echo "<a href=\"$href\" class='btn btn-default'>", $link, '</a>';     
        }               
    } 
?>