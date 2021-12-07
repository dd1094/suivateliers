<?php session_start() ; ?>


<?php

	
    
    $numero = $_GET['ateliers'];

	try {
		 

		$bd = new PDO(
						'mysql:host=localhost;dbname=suivateliers' ,
						'sanayabio' ,
						'sb2021'
			) ;
			
		$sql = "select  numero,aes_decrypt(nom,\"Clé\"),aes_decrypt(prenom,\"Clé\"),aes_decrypt(ville,\"Clé\") from Client as c inner join Participer as p on c.numero = p.numClt where numAte = '$numero'";
			 
		$st = $bd -> prepare( $sql ) ;
		
		$st -> execute() ;
		$stagiaire= $st -> fetchall() ;
		
		
	
		
		
	}
	catch( PDOException $e  ){
		
		echo 'Échec lors de la connexion : ' . $e->getMessage();
        echo "\nPDO::errorCode(): ", $dbh->errorCode();
		
	}

    ?>

    <!DOCTYPE html>
    <html lang="fr">
    
        <head>
            <meta charset="utf-8">
            <title>Liste des stagiares</title>
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
                                <a class="nav-link" href="#"><?php echo "Desanges" . ' ' . "LUKOMBO"  ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../controleurs/ctrl-deconnexion.php">se déconnecte...</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <h4>
                    Liste des stagiaires
                </h4>
                
                <table class= table table-striped>
                    <thead>
                        <tr>
                            <td>Numéro </td>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>Ville</td>

                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach( $stagiaire as $unStagiaire ){ ?>
                            <tr>
                                <td><?php echo $unStagiaire[ 'numero'] ; ?></td>
                                <td><?php echo $unStagiaire[ "aes_decrypt(nom,\"Clé\")" ] ; ?></td>
                                <td><?php echo $unStagiaire[ "aes_decrypt(prenom,\"Clé\")" ] ; ?></td>
                                <td><?php echo $unStagiaire[ "aes_decrypt(ville,\"Clé\")" ] ; ?></td>
                            </tr>
                        <?php } ?>
                        
                    </tbody>
                    
                </table>
                
        </body>
    </html>
