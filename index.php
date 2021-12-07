<?php 
	if( isset($_GET[ 'login' ]) ){
		$login = $_GET[ 'login' ] ;
	} 
	else {
		$login = '' ;	
	} 
?>

<!DOCTYPE html> 
<html lang="fr"> 
	
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
	</head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<body>
		
		<h1>Connexion</h1>
		<div class="mb-3 row">
			<form action="controleurs/ctrl-connecter.php" method="GET">
			<label>Nom de connexion</label>
			<input type="text" name="login" value="<?php echo $login ; ?>"/>
		<br>
		<br>
			<label>Mot de passe</label>
			<input type="password"   name="mdp" />
		</div>
		<br>
		<button  type="submit" class="btn btn-outline-dark">Valider</button>
		<button type="reset" class="btn btn-outline-dark">Annuler</button><br><br>
			<?php if( isset($_GET[ 'echec' ]) ){ ?>
						<?php if( $_GET[ 'echec' ] == 1 ){ ?>			
							<div class="alert alert-dark" role="alert">
								Nom de connexion ou mot de passe incorrect.
							</div>
						<?php } else if( $_GET[ 'echec' ] == 0 ){ ?>
							<div class="alert alert-dark" role="alert">
								Site momentanément indisponible.
							</div>
						<?php } ?>
					<?php } ?>
		</form> 
	</body>
	
	
	
