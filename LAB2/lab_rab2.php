<?php
echo "<link href='../css/bootstrap/bootstrap.css' rel='stylesheet'/>";
function dateDifference($event)
{
    $somedate = new DateTime('2029-11-19');
    $interval = date_diff($somedate, $event);
    echo $interval->format('Осталось %y лет %m месяцев %d дней %h часов');  
}

function deleteTags($input, $except = null)
{
    $except2 = substr_replace($except, '/', 1, 0);
    if ($except != null)
    {
        $input = str_replace($except, '&&&', $input);
        $input = str_replace($except2, '&&?', $input);    
    }
    $input = preg_replace('/(?:<|&lt;)\/?([a-z]+) *[^\/(?:<|&lt;)]*?(?:>|&gt;)/', '', $input);
    if ($except != null)
    {
        $input = str_replace('&&&', $except, $input);
        $input = str_replace('&&?', $except2, $input);
    } 
    echo 'Результат: ' . htmlspecialchars($input) . "<br>" . PHP_EOL;
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
    <table class = "table1">
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
    <h3> Второе задание </h3>
    <table class = "table2">
        <tr> 
            <td>
                Исходная строка:
                "&lta&gt 24324 &ltb&gt 34535 &lth1&gt 456 &lt/h1&gt"
                <br> 
                Исключение: "&lth1&gt"
            </td> 
            <td>         
                <?php
                    deleteTags('<a> 24324 <b> 34535 <h1> 456 </h1>', '<h1>');
                ?>           
            </td> 
        </tr>
    </table>  
    <div class="text-center">
        <a href="../index.php" class="btn btn-default">
            Вернуться назад
        </a>
    </div>
</body>
</html>