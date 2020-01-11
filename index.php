<?php
$page = "";
$top = 'LAB2/top.inc.php';
session_start();

if (isset($_POST['login'])) {
	$_SESSION['login'] = $_POST['login'];
}

include 'LAB2/lib.inc.php';
$newid = 1;

if (is_array($_SESSION['Item'])) {
	// $newid = intval(end(end($_SESSION['Item']))) + 1;
	foreach ($_SESSION['Item'] as $key => $obj) {
		if (intval($obj['id']) > $newid) {
			$newid = intval($obj['id']);
		}
	}
	$newid++;
}

if (!empty($_GET['page'])) $page = $_GET['page'];
if ($page == 4 || $page == 7) {
	if ($_POST['action'] == 'view') {
		header("Location: /index.php?page=6&action=view&id={$_POST['id']}&place={$_POST['place']}&price={$_POST['price']}&dates={$_POST['dates']}&datep={$_POST['datep']}&filename={$_POST['filename']}");
	}
	if ($_POST['action'] == 'edit') {
		header("Location: /index.php?page=7&action=view&id={$_POST['id']}&place={$_POST['place']}&price={$_POST['price']}&dates={$_POST['dates']}&datep={$_POST['datep']}");
	}
	if ($_POST['action'] == "add" || $_POST['action'] == "update") {
		$item = array();
		$item['place'] = strip_tags(trim($_POST['place']));
		$item['price'] = strip_tags(trim($_POST['price']));
		$item['dates'] = strip_tags(trim($_POST['dates']));
		$item['datep'] = strip_tags(trim($_POST['datep']));
		$item['id'] = strip_tags(trim($_POST['id']));
		// $item['filename'] = strip_tags(trim($_POST['filename']));
		if ($_POST['action'] == "update") {
			foreach ($_SESSION['Item'] as $key => $value) {
				if ($value['id'] == $_POST['id']) {
					unset($_SESSION['Item'][$key]);
					break;
				}
			}
		}

		if (!empty($_FILES['uploadfile']['name'])) {
			$tmp_path = 'downloads/tmp/';
			$file_path = 'downloads/images/';
			$name = resize($_FILES['uploadfile']);
			$uploadfile = $file_path . $name;
			if (@copy($tmp_path . $name, $file_path . $name))
				$uploadlink = "downloads/images/" . $name;
			unlink($tmp_path . $name);
			$item['filename'] = $uploadlink;
			// 	echo "Изображение загружено!</br>		
			// Имя файла: " . $_FILES['uploadfile']['name'] . "</br>		
			// Тип файла: " . $_FILES['uploadfile']['type'] . "</br>		
			// Размер файла: " . $_FILES['uploadfile']['size'] . "</br>";
		}

		array_push($_SESSION['Item'], $item);
		header("Location: /index.php?page=4");
		// index.php?page=4&action=view&item=2
		exit;
	} else if ($_POST['action'] == 'delete' && isset($_POST['id'])) {
		foreach ($_SESSION['Item'] as $key => $obj) {
			if ($obj['id'] == $_POST['id']) {
				unset($_SESSION['Item'][$key]);
				break;
			}
		}
	}
	if (!is_array($_SESSION['Item'])) $_SESSION['Item'] = array();
	//unset($_SESSION['Item']);
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
	<script src='js/bootstrap.js'></script>
	<div class='divflex'>
		<div class='logo'></div>
		<!-- Верхняя панель -->
		<?php
		if ($_SESSION['login'] != 'admin') include $top;
		else echo "<form class='formHeader' method='POST' action='/index.php'><div class='form-inline'><a>Вы авторизованы под именем {$_SESSION['login']}     </a><button class='btn btn-default' name='login' value='Выйти'>Выйти</button></div></form>";
		?>
		<!-- /Верхняя панель -->
		<!-- Основной контент -->
		<div class='mainform'>
			<!-- Меню -->
			<div class='btn-group-vertical'>
				<?php getMenu($menu); ?>
			</div>
			<?php
			if ($_SESSION['login'] == 'admin') {
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
			}
			?>
			<!-- /Меню -->
		</div>
		<!-- /Основной контент -->
		<!-- Нижняя панель -->
		<?php
		include 'LAB2/bottom.inc.php';
		?>
		<!-- /Нижняя панель -->
	</div>
</body>

</html>