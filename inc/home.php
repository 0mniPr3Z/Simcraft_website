<?php $article = $simcraft->getLastArt(); ?>
<div class="contentdiv">
	<div class="homediv">
		<h1>Bienvenue sur <?php echo ucfirst($vocabSite[0]); ?></h1>
		<hr>
		
		<div>
				<iframe
					src="https://www.youtube.com/embed/33VrwHT2ybU"
					title="YouTube video player"
					frameborder="0"
					allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
					allowfullscreen class="videoPlaya">
				</iframe>
				<h2> <?php echo utf8_encode($article['title']); ?></h2>
				<p> 
					<?php echo utf8_encode(substr($article['intro'], 0, 250)); ?>
				</p><p>
					<?php echo utf8_encode(substr($article['content'], 0, 250)); ?>...
					<a href="article-">Voir la suite</a></p>
					
		</div>
		
		
		<div><hr>
				<h2> Petit historique de la série</h2>
				<p>
					La série "Les Simpson" est crée par Matt Groening et produite par Gracie
					Films pour la Twentieth Century Fox et la Fox Network.<br>
					Les Simpson apparurent dès 1987, aux Etats-Unis, sous forme de courts
				dessins animés, pour le "Tracey Ullman Show".</p>
		</div>
	</div>
</div>