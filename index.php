<?php
$page = "";
if (!empty($_GET['page'])) $page = $_GET['page'];
if ($page == 4) {
	if ($_POST['action'] == "add") {
		session_start();
		$item = array();
        $item['place'] = strip_tags(trim($_POST['place']));
        $item['price'] = strip_tags(trim($_POST['price']));
        $item['dates'] = strip_tags(trim($_POST['dates']));
		$item['datep'] = strip_tags(trim($_POST['datep']));
		array_push($_SESSION['Item'], $item);
		header("Location: /index.php?page=4");
		exit;
	}
	else if ($_POST['action'] == 'delete' && isset($_POST['id']))
	{
		foreach($_SESSION['Item'] as $key => $item) {
			if ($item['id'] == $_POST['id'])
			{
				unset($_SESSION['Item'][$key]);
				break;
			}

		}		
	}
	session_start();
	if (!is_array($_SESSION['Item'])) $_SESSION['Item'] = array();
	// print_r($_SESSION['Item']);
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
		<!-- Верхняя панель -->
		<?php
		include 'LAB2/top.inc.php';
		?>
		<!-- /Верхняя панель -->
		<!-- Основной контент -->
		<div class='mainform'>
			<!-- Меню -->
			<div class='btn-group-vertical'>
				<?php
				include 'LAB2/lib.inc.php';
				getMenu($menu);
				?>
			</div>
			<?php
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
				default:
					echo '<h3>Сработал switch default</h3>';
					break;
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