<ul>
	<?php
		if($simcraft->connectId() == -1){
			$temp = floor(100/count($vocabPage)) - 3;
			for($i=0; $i < count($vocabPage); $i++){
				echo '<a href="'.$vocabPage[$i][0].'">';
					echo'<li style="width:'.$temp.'%;"';if($i == $pg)echo' class="active"';echo'>';
						echo '<i class="'.$vocabPage[$i][2].'"></i> ';
						echo ucfirst($vocabPage[$i][0]);
					echo'</li>';
				echo'</a>';
			}
		}else{
			$temp = floor(50/ count($vocabPage)) - 4;
			for($i=0; $i < count($vocabPageCo); $i++){
				echo '<a href="index.php?pg='.$i.'"><li style="width:'.$temp.'%;"';
				if($i == $pg)
					echo' class="active"';
				echo'>'.$vocabPageCo[$i][0].'</li></a>';
			}
		}
	?>
</ul>