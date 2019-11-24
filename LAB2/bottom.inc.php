<form class='formVault'>
	<div class='form-inline'>
	<p class='text-center'>
		<?php
			$date = date('d.m.Y, H:i:s', time());
			echo 'Время открытия страницы: ' . "$date" . "<br>";
			echo apache_get_version();
		?>
	</p>
	</div>
</form>