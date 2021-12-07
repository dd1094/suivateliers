<?php
	
	$login = $_GET[ 'login' ] ;
	$mdp = $_GET[ 'mdp' ] ;
	
	try {

		$bd = new PDO(
						'mysql:host=localhost;dbname=suivateliers' ,
						'sanayabio' ,
						'sb2021'
			) ;
			
		$sql = 'select login , mdp , prenom '
			 . 'from Client '
			 . 'where login = sha2(:login,512) '
			 . 'and mdp = sha2(:mdp,512)' ;
			 
		$st = $bd -> prepare( $sql ) ;
		
		$st -> execute( array( 
								':login' => $login ,
								':mdp' => $mdp 
						) 
					) ;
		$resultat = $st -> fetchall() ;
			
		unset( $bd ) ;
		
		if( count( $resultat ) == 1 ) {
			session_start() ;
			$_SESSION[ 'prenom' ] = $resultat[0]['prenom'] ;
			$_SESSION[ 'login' ] =  $resultat[0]['login'] ;
			
			header( 'Location: ../vues/vue-liste-ateliers.php' ) ;
		}
		else {
			header( 'Location: ../index.php?echec=1&login=' . $login ) ;
		}
	}
	catch( PDOException $e ){
		
		header( 'Location: ../vues/vue-connexion.php?echec=0') ;
	}

?>
