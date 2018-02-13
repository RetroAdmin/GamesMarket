<?php
	/*
	Template Name: Inscription
	*/
	get_header();

	if(isset($_POST['submit']) && !empty($_POST['submit'])){

		// Affichage Data
			echo 'Pseudo : '.$_POST['pseudo'].'<br>';
			echo 'Mail : '.$_POST['email'].'<br>';
			echo 'Mot de passe : '.$_POST['password'].'<br>';
			echo 'Confirmation : '.$_POST['confirmation'].'<br>';
			echo '<hr>';

		// Check password confirmation
			if($_POST['password'] == $_POST['confirmation']) echo 'Mots de passe identiques<hr>';
			else echo 'Mots de passe non identiques !<hr>';

		// Check username
			if(get_user_by('login', $_POST['pseudo'])) echo 'Pseudo déja utilisé !<br>';
			else echo 'Pseudo disponible.<br>';
		// Check Email
			if(get_user_by('email', $_POST['email'])) echo 'Email déja utilisé !<hr>';
			else echo 'Email disponible.<hr>';

	}


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
					<input type="email" name="email" class="email" value="" required>
				</div>
				<div class="row">
					<label for="">Pseudo</label>
					<input type="text" name="pseudo" class="pseudo" value="" required>
				</div>
				<div class="row">
					<label for="">Mot de passe</label>
					<input type="password" name="password" class="password" value="" required>
				</div>
				<div class="row">
					<label for="">Confirmation</label>
					<input type="password" name="confirmation" class="confirmation" value="" required>
				</div>
				<input type="submit" name="submit" value="S'inscrire" class="submit">
			</form>


		</article>
	</div>
</div>


<script type="text/javascript">

	if(jQuery('#formInscription').length){
		var form = jQuery('#formInscription');

		// Saisie Email
			form.find('.email').keyup(function() {

				jQuery.ajax({ type: 'POST', dataType: "json", url: "/betaccess/wp-admin/admin-ajax.php",
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
