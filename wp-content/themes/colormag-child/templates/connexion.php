<?php
	/*
	Template Name: Connexion
	*/

	// Si le formulaire à été envoyé
		if(isset($_POST['submit']) && !empty($_POST['submit'])){

			// Init
				$nbErreur = 0;

			// Check Email
				if(!isset($_POST['email']) || empty($_POST['email']) ){
					$errorEmailEmpty = true;
					$nbErreur ++;
				}
				else if(! get_user_by('email', $_POST['email'])){
					$errorEmailInvalid = true;
					$nbErreur ++;
				}

			// Check s'il y a un password
				if(!isset($_POST['password']) || empty($_POST['password']) ){
					$errorPasswordEmpty = true;
					$nbErreur ++;
				}

			// Connexion (si pas d'erreur)
				if($nbErreur == 0){
					// Connexion
			      $creds = array();
			      $creds['user_login'] = $_POST['email'];
			      $creds['user_password'] = $_POST['password'];
			      $creds['remember'] = true;
			      $user = wp_signon( $creds, false );
			      if(is_wp_error($user)) {
							$errorPasswordWrong = true;
			      }
			      else {
						  wp_redirect('/mon-compte');
			      }
				}

		}

		get_header();

?>
<style media="screen">
	.formGM input{
		margin:0;
	}
	.formGM input[type="submit"]{
		background-color: #2C9ECA;
		color:#fff;
	}
	.formGM > .row{
		position:relative;
		padding-left:115px;
		margin-bottom: 20px;
	}
	.formGM > .row label{
		position: absolute;
		left:0;
		top:50%;
		transform:translateY(-50%);
	}
	.formGM .submit{
		margin:0 auto;
		width:114px;
	}
	.formGM .error{
		font-size: 12px;
		color: #f30000;
		display:block;
	}
	.formGM a.connexion{
		display: block;
    font-size: 11px;
    margin: 8px 0 0 3px;
	}
</style>




<div id="primary">
	<div id="content" class="clearfix">
		<article class="type-page">

			<header class="entry-header">
				<h1 class="entry-title">Se Connecter</h1>
			</header>

			<form action="#" method="post" class="formGM" id="formInscription">
				<div class="row">
					<label for="">E-mail</label>
					<input type="email" name="email" class="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
					<?php if(isset($errorEmailEmpty) && $errorEmailEmpty==true) echo '<span class="error">Veuillez saisir une addresse email.</span>'; ?>
					<?php if(isset($errorEmailInvalid) && $errorEmailInvalid==true) echo '<span class="error">Aucun compte n\'est associé à cette addresse email.</span>'; ?>
				</div>
				<div class="row">
					<label for="">Mot de passe</label>
					<input type="password" name="password" class="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" required>
					<?php if(isset($errorPasswordEmpty) && $errorPasswordEmpty==true) echo '<span class="error">Veuillez saisir un mot de passe.</span>'; ?>
					<?php if(isset($errorPasswordWrong) && $errorPasswordWrong==true) echo '<span class="error">Mot de passe incorrect.</span>'; ?>
				</div>
				<input type="submit" name="submit" value="S'inscrire" class="submit">
				<a href="#" title="Se connecter !" class="connexion">Créer un compte</a>
			</form>


		</article>
	</div>
</div>




<?php get_footer(); ?>
