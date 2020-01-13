<div class="ctlg">
    <?php

    $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));

    $query = "SELECT * FROM travel";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));  

    if ($result) {
        getTableByBase($result);
    }

    mysqli_close($link);
    if ($_SESSION['login'] == 'admin') echo "<a href='index.php?page=5' class='btn btn-default' type='submit'>Добавить</a>";
    ?>  
</div>