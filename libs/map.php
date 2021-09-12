<table class="map">
	<?php
		for($row = 0; $row <30; $row ++){
			echo'<tr>';
				for($col = 0; $col <60; $col ++){
					include'libs/map_case.php';
				}
			echo'</tr>';
		}
	?>
</table>
		