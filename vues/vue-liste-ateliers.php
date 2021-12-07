<?php session_start() ; ?>


<?php



	try {
		

		$bd = new PDO(
						'mysql:host=localhost;dbname=suivateliers' ,
						'sanayabio' ,
						'sb2021'
			) ;
			
		$sql = 'select * '
			 . 'from Ateliers ';
			 
		$st = $bd -> prepare( $sql ) ;
		
		$st -> execute() ;
		$ateliers = $st -> fetchall() ;
		
		
	
		
		
	}
	catch( PDOException $e ){
		
		echo 'Échec lors de la connexion : ' . $e->getMessage();
	}


?>

<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<title>Liste ateliers</title>
	</head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	
	<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">SB Ateliers</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbarererre-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="nav navbar-nav me-auto mb-2 mb-lg-0">
						
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item">
							<a class="nav-link" href="#"><?php echo  "Desanges" . ' ' . "LUKOMBO" ?></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../controleurs/ctrl-deconnexion.php">se déconnecte...</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<h4>
				Liste des ateliers
			</h4>
			
			<table class= "table table-striped">
				<thead>
					<tr>
						<td>Numero</td>
                        <td>Nom Ateliers</td>
                        <td>Date d'enregistrement</td>
                        <td>Date et heure de progamation</td>
                        <td>Duree (heures)</td>
                        <td>Nombre de Places</td>
                        <td></td>

					</tr>
				</thead>
				<tbody>
					
					<?php foreach( $ateliers as $unAteliers ){ ?>
						<tr>
                            <td><?php echo $unAteliers[ 'numero' ] ; ?></td>
							<td><?php echo $unAteliers[ 'theme' ] ; ?></td>
                            <td><?php echo $unAteliers[ 'dateEnre' ] ; ?></td>
                            <td><?php echo $unAteliers[ 'dateheureProg' ] ; ?></td>
                            <td><?php echo $unAteliers[ 'duree' ] ; ?></td>
                            <td><?php echo $unAteliers[ 'nbPlace' ] ; ?></td>
                            <td><a href="<?php echo 'vue-liste-stagiaires.php?ateliers=' . $unAteliers[ 'numero' ];?>">Liste des stagiaires</a></td>
						</tr>
					<?php } ?>	
				</tbody>
			</table>
	</body>
</html>
