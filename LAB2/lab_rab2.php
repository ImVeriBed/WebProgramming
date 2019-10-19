<?php
function dateDifference($event)
{
    $somedate = new DateTime('2029-11-19');
    $interval = date_diff($somedate, $event);
    echo $interval->format('Осталось %y лет %m месяцев %d дней %h часов');  
}

function deleteTags($input, $except)
{
    echo preg_replace('?:<|&lt;)\/?([a-z]+) *[^\/(?:<|&lt;)]*?(?:>|&gt;', $input);
}
?>

<html>
<head>
    <meta charset='utf-8' />
    <link href="../css/mystyle_labrab2.css" rel="stylesheet" type="text/css" />
    <title>Лабораторная 2</title>
</head>
<body>
    <h3> Первое задание </h3>
    <table>
        <tr> 
            <td>
                Заданная дата: 2029-11-19 
            </td> 
            <td>         
                <?php
                    dateDifference(new DateTime('now'));
                ?>           
            </td> 
        </tr>
    </table> 
</body>
</html>