<?php
	$case = $map->getCaseTabInfo($player->x, $player->y, $col, $row);
	$isProprio = $map->isProprio($case['id'], $player['id']))
?>
<td class="<?php echo $case['terrain'];?> map_terrain">
	<div class="<?php echo $case['bat'];?> map_bat">
		<img src="img/map/<?php echo $case['bat']; ?>.png">
		<span class="infobulle">
			Case content
		</span>
	</div>
</td>