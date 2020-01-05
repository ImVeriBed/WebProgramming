<form class='formVault'>
	<p >
		<?php
		$date = date('d.m.Y, H:i:s', time());
		echo 'Время открытия страницы: ' . "$date" . "<br>";
		echo apache_get_version();
		?>
	</p>
</form>