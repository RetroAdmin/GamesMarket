<?php
	/*
	Template Name: Inscription
	*/


/*************************************************************************************/
/* 												  	ENVOIE FORMULAIRE INSCRIPTION 												*/
/*************************************************************************************/

		if(isset($_POST['submit']) && !empty($_POST['submit'])){
			// Init Var ----------------------------------------------------------------------------------------------
				$nbErreur = 0;

			// Check password ----------------------------------------------------------------------------------------
				if(!isset($_POST['password']) || empty($_POST['password'])){
					$nbErreur ++;
					$errorPasswordEmpty = true;
				}
				if(!isset($_POST['confirmation']) || empty($_POST['confirmation'])){
					$nbErreur ++;
					$errorConfirmationEmpty = true;
				}
				if(!isset($errorPasswordEmpty) && !isset($errorConfirmationEmpty)){
					if($_POST['password'] != $_POST['confirmation']){
						$nbErreur ++;
						$errorConfirmation = true;
					}
				}

			// Check username ----------------------------------------------------------------------------------------
				if(!isset($_POST['pseudo']) || empty($_POST['pseudo'])){
					$nbErreur ++;
					$errorPseudoEmpty = true;
				}
				else if(get_user_by('login', $_POST['pseudo'])){
					$nbErreur ++;
					$errorPseudoUsed = true;
				}

			// Check Email --------------------------------------------------------------------------------------------
				if(!isset($_POST['email']) || empty($_POST['email'])){
					$nbErreur ++;
					$errorEmailEmpty = true;
				}
				else{
					if(get_user_by('email', $_POST['email'])){
						$nbErreur ++;
						$errorEmailUsed = true;
					}
					else if(!is_email($_POST['email'])){
						$nbErreur ++;
						$errorEmailInvalid = true;
					}
				}

			// Si aucune erreur trouvée --------------------------------------------------------------------------------
				if($nbErreur == 0){
					// Creation du compte
	       		wp_create_user( $_POST['pseudo'], $_POST['password'], $_POST['email']);
					// Connexion
						$creds = array(
							'user_login'    => $_POST['email'],
							'user_password' => $_POST['password'],
							'remember'      => true
						);
		        $user = wp_signon( $creds, false );
					  wp_redirect('/');
	        	// if(is_wp_error($user)) echo json_encode($user->get_error_message());
				}

		}


		get_header();

?>
<style media="screen">
	.formGM input{
		margin:0;
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
				<h1 class="entry-title">S'Enregistrer</h1>
			</header>

			<form action="#" method="post" class="formGM" id="formInscription">
				<div class="row">
					<label for="">E-mail</label>
					<input type="email" name="email" class="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
					<?php if(isset($errorEmailEmpty) && $errorEmailEmpty==true) echo '<span class="error">Veuillez saisir un pseudo.</span>'; ?>
					<?php if(isset($errorEmailInvalid) && $errorEmailInvalid==true) echo '<span class="error">Veuillez saisir un email valide.</span>'; ?>
					<?php if(isset($errorEmailUsed) && $errorEmailUsed==true) echo '<span class="error">Cet email est déjà utilisé.</span>'; ?>
				</div>
				<div class="row">
					<label for="">Pseudo</label>
					<input type="text" name="pseudo" class="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>" required>
					<?php if(isset($errorPseudoEmpty) && $errorPseudoEmpty==true) echo '<span class="error">Veuillez saisir un pseudo.</span>'; ?>
					<?php if(isset($errorPseudoUsed) && $errorPseudoUsed==true) echo '<span class="error">Ce pseudo est déjà utilisé.</span>'; ?>
				</div>
				<div class="row">
					<label for="">Mot de passe</label>
					<input type="password" name="password" class="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" required>
					<?php if(isset($errorPasswordEmpty) && $errorPasswordEmpty==true) echo '<span class="error">Veuillez saisir un mot de passe.</span>'; ?>
				</div>
				<div class="row">
					<label for="">Confirmation</label>
					<input type="password" name="confirmation" class="confirmation" value="<?php if(isset($_POST['confirmation'])) echo $_POST['confirmation']; ?>" required>
					<?php if(isset($errorConfirmationEmpty) && $errorConfirmationEmpty==true) echo '<span class="error">Veuillez re-saisir votre mot de passe.</span>'; ?>
					<?php if(isset($errorConfirmation) && $errorConfirmation==true) echo '<span class="error">Les mots de passe doivent être identiques.</span>'; ?>
				</div>
				<input type="submit" name="submit" value="S'inscrire" class="submit">
				<a href="#" title="Se connecter !" class="connexion">J'ai déjà un compte</a>
			</form>


		</article>
	</div>
</div>


<script type="text/javascript">

	if(jQuery('#formInscription').length){
		var form = jQuery('#formInscription');

		// Saisie Email
			form.find('.email').keyup(function() {

				jQuery.ajax({ type: 'POST', dataType: "json", url: "/gamesmarket/wp-admin/admin-ajax.php",
					data: ({
						action : 'getUsernameByMail',
						mail : form.find('.email').val()
					})
				}).done(function(result) {
					console.log(result);
					form.find('.pseudo').val( result );
				});

			});
	}

</script>


<?php get_footer(); ?>
