<?php
if(isset($_COOKIE['login']))
?>
<div class="contentdiv">
	<div class="butdiv">
		<h1>Inscription</h1>
		<p class="butp" style="color:<?php echo $Vocab_errorSub[$errorSub][1]; ?>;">
			<i><?php echo $Vocab_errorSub[$errorSub][0]; ?></i>
		</p>
		
		<hr>
		<!--FORMULAIRE D'INSCRIPTION-->
		<form method="post" action="subscrib.php">
		
			<label for="pseudo">
				<a class="infobulle">
				   <img src="img/icon_what.png" alt="?"> 
				   <span><img src="img/icon_infobulle.png">
					Entrez un identifiant de 20 caractères composés exclusivement de lettre sans accent ni symbole ni espace.
				   </span>
				</a>
				Pseudo :
			</label>
			
			<input name="login" type="text" autocomplete="off" placeholder="Votre pseudo" id="pseudo" minlength="4" maxlength="20" required>


			<label for="password">
				<a class="infobulle">
					<img src="img/icon_what.png" alt="?"> 
					<span><img src="https://www.scriptol.fr/images/apache.png">
					La description avec une image.
					</span>
				</a>
				Password :
			</label>
			
			<input name="pass" autocomplete="off" type="password" id="password" placeholder="******" required>
				
				
			<label for="password2">
				Répéter :
			</label>
			
			<input name="pass2" autocomplete="off" type="password" id="password2" placeholder="******" required>


			<label for="mail">
				E-mail:
			</label>

			<input name="mail" type="email" id="email" placeholder="Votre adresse mail" required>
			
			<br>
			
			<label class="longlabel" for="reglement">
				<small>Accepter les <a href="">conditions d'utilisation</a></small>
			</label>
			
			<input name="regl" class="checkb" id="reglement" checked type="checkbox" value="1">
			
			<label class="longlabel" for="cookies2">
				<a class="infobulle">
					<img src="img/icon_what.png" alt="?"> 
					<span><img src="https://www.scriptol.fr/images/apache.png">
					La description avec une image.
					</span>
				</a>
				<small>Rester connécté grace à un cookie</small>
			</label>
			
			<input name="cooki" class="checkb" id="cookies2" checked type="checkbox">
			
			<input type="submit" value="S'inscrire par e-mail">
		</form>
		<hr>
		
		
		<button class="loginBtn loginBtn--facebook">
			S'inscrire avec Facebook
		</button>

		<button class="loginBtn loginBtn--google">
			S'inscrire avec Google
		</button>

	 </div>
	<div class="butdiv">
		<h1>Connexion</h1>
		<p class="butp" style="color:<?php echo $Vocab_errorCo[$errorCo][1]; ?>;">
			<?php echo $Vocab_errorCo[$errorCo][0]; ?>
		</p>
		<hr>
		<form method="post" action="trait/connect.php">
		
			<label for="pseudo"> Pseudo ou mail:</label>
			<input name="pseudo1" type="text" placeholder="Votre pseudo" id="pseudo1" >

			<label for="password1"> Mot de passe :</label>
			<input name="password" type="text" placeholder="Mot de passe" id="password1" >

			<input name="cookies" id="cookies1" checked type="checkbox"><label for="cookies1"> Rester connecté</label>

			<input type="submit" value="Se connecter">
		</form>
		<hr>
		
		<button class="loginBtn loginBtn--facebook">
			Connexion rapide Facebook
		</button>

		<button class="loginBtn loginBtn--google">
			Connexion rapide Google
		</button>
		<hr>
		<p class="butp">
			<br>
			<?php
				$temp = count($simcraft->connectedMembers());
				if($temp > 0){
					echo "Il y a <b>".$simcraft->connectedMembers()." membres</b> connectés sur le site actuellement.";
				}else{
					echo "Il n'y a <b>aucun membre</b> connecté sur le site en ce moment.";
				}
			?>
		</p>
	</div>
</div>