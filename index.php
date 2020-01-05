<?php
echo "<link href='css/bootstrap/bootstrap.css' rel='stylesheet'/>";
echo "<link href='css/mystyle_index.css' rel='stylesheet'/>";
include 'LAB2/lib.inc.php';
// include 'LAB3/auth.php';
?>
<html>

<head>
	<meta charset='utf-8' />
	<title>Главная страница!</title>
</head>

<body>
	<script src='js/bootstrap.js'></script>
	<div class='divflex'>
		<div class='logo'></div>
		<!-- Верхняя панель -->
		<?php
		include 'LAB2/top.inc.php';
		?>
		<!-- /Верхняя панель -->
		<!-- Основной контент -->
		<form class='mainform'>
			<!-- Меню -->
			<?php
			$page = "";
			include 'LAB2/menu.inc.php';
			if (!empty($_GET['page'])) $page = $_GET['page'];
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
			}
			?>
			<!-- /Меню -->
			<!-- <div class='textFont'>
					Совмещение отдыха с познанием жизни, истории и культуры народов - одна из задач, которую в полной
					мере способен решать туризм. ... Социальное значение туризма .Туризм как вид отдыха помогает
					восстановить силы и трудоспособность человека и соответственно — психофизиологические ресурсы общества.
					Россия богата экскурсионными маршрутами и объектами: белокаменная Москва, Санкт–Петербург – город
					музей,
					многоликая Карелия, памятники древнерусских городов Золотого кольца, необъятный Байкал, вулканы
					Камчатки…
					Москва является самым посещаемым туристами местом в России. Величие Кремля, Красная площадь, Собор
					Василия
					Блаженного, Поклонная гора, незабываемые прогулки по Москве наполнят туристов русским духом, а
					посещение
					известных во всем мире музеев и галерей подарят непременно массу ярких впечатлений.					
				</div> -->
		</form>
		<!-- /Основной контент -->
		<!-- Нижняя панель -->
		<?php
		include 'LAB2/bottom.inc.php';
		?>
		<!-- /Нижняя панель -->
	</div>
</body>

</html>