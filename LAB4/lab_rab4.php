<div class="ctlg">
    <?php

    $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));

    $query = "DROP TABLE tovars";
    $result = mysqli_query($link, $query);// or die("Ошибка " . mysqli_error($link));

    $query = "CREATE Table tovars
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    company VARCHAR(200) NOT NULL
)";

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if ($result) {
        echo "Создание таблицы прошло успешно";
    }

    $query = "SELECT * FROM tovars";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    echo getTableByBaseSimple($result);

    echo "Добавление одной записи в таблицу";
    $query = "INSERT INTO tovars VALUES(NULL, 'name 1','company 1')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    
    $query = "SELECT * FROM tovars";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    echo getTableByBaseSimple($result);

    $query = "DROP TABLE tovars";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if ($result) {
        echo "Удаление таблицы прошло успешно";
    }

    mysqli_close($link);

    ?>
</div>