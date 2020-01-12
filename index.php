<?php
require 'LAB4/connection.php';
$page = "";
$top = 'LAB2/top.inc.php';
$IsPwd;
$lastlog;
header('Cache-control: no-store');
session_start();

if ($_POST['action'] == 'auth' || $_POST['login'] == 'Выйти') {
	$_SESSION['login'] = $_POST['login'];
	
	$_SESSION['IsPwd'] = false;
	$link = mysqli_connect($host, $user, $password, $database)
		or die("Ошибка " . mysqli_error($link));

	$query = "SELECT * FROM authusers WHERE login = '{$_POST['login']}'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	$row = mysqli_fetch_row($result);
	if ($row != null)
		$IsPwd = hash_equals($row['2'], crypt($_POST['password'], $row['2']));
	mysqli_close($link);

	if ($_SESSION['login'] == 'admin' && $IsPwd) {
		$lastlog = $_COOKIE["LastLog"];
		$_SESSION['IsPwd'] = $IsPwd;
		setcookie("LastLog", $_POST['logintime'], 0x7FFFFFFF);
	}
}

include 'LAB2/lib.inc.php';
$newid = 1;

if (is_array($_SESSION['Item'])) {
	foreach ($_SESSION['Item'] as $key => $obj) {
		if (intval($obj['id']) > $newid) {
			$newid = intval($obj['id']);
		}
	}
	$newid++;
}

if (!empty($_GET['page']))
	$page = $_GET['page'];

if ($_POST['action'] == 'reg') {
	$link = mysqli_connect($host, $user, $password, $database)
		or die("Ошибка " . mysqli_error($link));
	$pwd = crypt($_POST['password']);
	$query = "INSERT INTO authusers VALUES(NULL, '{$_POST['login']}','{$pwd}', '{$_POST['email']}')";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	mysqli_close($link);
}

if ($page == 4 || $page == 7) {
	if ($_POST['action'] == 'view') {
		header("Location: /index.php?page=6&action=view&id={$_POST['id']}&place={$_POST['place']}&price={$_POST['price']}&dates={$_POST['dates']}&datep={$_POST['datep']}&filename={$_POST['filename']}");
	}
	if ($_POST['action'] == 'edit') {
		header("Location: /index.php?page=7&action=view&id={$_POST['id']}&place={$_POST['place']}&price={$_POST['price']}&dates={$_POST['dates']}&datep={$_POST['datep']}&filename={$_POST['filename']}");
	}
	if ($_POST['action'] == 'lab3') {
		header("Location: /index.php?page=3&action=view&id={$_POST['id']}&place={$_POST['place']}&price={$_POST['price']}&dates={$_POST['dates']}&datep={$_POST['datep']}&filename={$_POST['filename']}");
	}
	if ($_POST['action'] == "add" || $_POST['action'] == "update") {
		$item = array();
		$item['place'] = strip_tags(trim($_POST['place']));
		$item['price'] = strip_tags(trim($_POST['price']));
		$item['dates'] = strip_tags(trim($_POST['dates']));
		$item['datep'] = strip_tags(trim($_POST['datep']));
		$item['id'] = strip_tags(trim($_POST['id']));
		$item['filename'] = strip_tags(trim($_POST['filename']));

		if (!empty($_FILES['uploadfile']['name'])) {
			$tmp_path = 'downloads/tmp/';
			$file_path = 'downloads/images/';
			$name = resize($_FILES['uploadfile']);
			$uploadfile = $file_path . $name;
			if (@copy($tmp_path . $name, $file_path . $name))
				$uploadlink = "downloads/images/" . $name;
			unlink($tmp_path . $name);
			$item['filename'] = $uploadlink;
		} else $item['filename'] = strip_tags(trim($_POST['filename']));

		$link = mysqli_connect($host, $user, $password, $database)
			or die("Ошибка " . mysqli_error($link));

		if ($_POST['action'] == "add") {
			$query = "INSERT INTO travel VALUES(NULL, '{$item['place']}','{$item['price']}', '{$item['dates']}', '{$item['datep']}', '{$item['filename']}')";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		}

		if ($_POST['action'] == "update") {
			$query = "UPDATE travel set place = '{$item['place']}', price = '{$item['price']}', dates = '{$item['dates']}', datep = '{$item['datep']}', imagepath = '{$item['filename']}' where id = '{$item['id']}'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		}

		mysqli_close($link);

		header("Location: /index.php?page=4");
		exit;
	} else if ($_POST['action'] == 'delete' && isset($_POST['id'])) {

		$link = mysqli_connect($host, $user, $password, $database)
			or die("Ошибка " . mysqli_error($link));

		$query = "DELETE FROM travel where id = '{$_POST['id']}'";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

		mysqli_close($link);
	}

	if (!is_array($_SESSION['Item'])) $_SESSION['Item'] = array();
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8' />
	<link href='css/bootstrap/bootstrap.css' rel='stylesheet' />
	<link href='css/mystyle_index.css' rel='stylesheet' />
	<link href="../css/mystyle_catalog.css" rel="stylesheet" type="text/css" />
	<title>Главная страница</title>
</head>

<body>
	<!-- <script src='js/bootstrap.js'></script> -->
	<div class='divflex'>
		<div class='logo'></div>
		<?php
		if ($_SESSION['login'] != 'admin' || $_SESSION['IsPwd'] != true) include $top;
		else echo "<form class='formHeader' method='POST' action='/index.php'><div class='form-inline'><a>Вы авторизованы под именем {$_SESSION['login']}     </a><button class='btn btn-default' name='login' value='Выйти'>Выйти</button></div></form>";
		?>
		<div class='mainform'>
			<div class='btn-group-vertical'>
				<?php getMenu($menu); ?>
			</div>
			<?php
			if ($_SESSION['login'] == 'admin' && $_SESSION['IsPwd'] == true) {
				switch ($page) {
					case 1:
						include 'LAB1/lab_rab1.html';
						break;
					case 2:
						include 'LAB2/lab_rab2.php';
						break;
					case 3:
						include 'LAB3/lab_rab3.php';
						break;
					case 4:
						include 'LAB3/catalog.php';
						break;
					case 5:
						include 'LAB3/add.php';
						break;
					case 6:
						include 'LAB3/item.php';
						break;
					case 7:
						include 'LAB3/edit.php';
						break;
					case 8:
						include 'LAB4/registration.php';
						break;
					default:
						echo '<div class="ctlg"><p>
						Россия богата экскурсионными маршрутами и объектами: белокаменная Москва, Санкт–Петербург – город
						музей,
						многоликая Карелия, памятники древнерусских городов Золотого кольца, необъятный Байкал, вулканы
						Камчатки…
						Москва является самым посещаемым туристами местом в России. Величие Кремля, Красная площадь, Собор
						Василия
						Блаженного, Поклонная гора, незабываемые прогулки по Москве наполнят туристов русским духом, а
						посещение
						известных во всем мире музеев и галерей подарят непременно массу ярких впечатлений.
					</p></div>';
						break;
				}
			} else include 'LAB4/registration.php';
			?>
		</div>
		<?php
		if ($page != 6) include 'LAB2/bottom.inc.php';
		?>
	</div>
</body>

</html>