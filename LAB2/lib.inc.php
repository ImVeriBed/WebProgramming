<?php
    $menu = array(
        "Главная страница"=>"../index.php",      
        "Лабораторная работа №1"=>"LAB1/lab_rab1.html",       
        "Лабораторная работа №2"=>"LAB2/lab_rab2.php");    
    function getMenu($menu)   
    {         
        foreach ($menu as $link=>$href)   
        {        
            echo "<a href=\"$href\" class='btn btn-default'>", $link, '</a>';     
        }               
    } 
?>