<form class='formVault'>
	<div class='form-inline'>
	<p class='text-center'>
		<?php
			$date = date('d/m/y H:i:s', time());
			echo 'Время открытия страницы: ' . "$date" ;
			echo "<br>";
			$version = apache_get_version();
			echo "$version";
		?>
	</p>
	</div>
</form>