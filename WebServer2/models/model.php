<?php 
function getDatabaseConnexion() {
			try {
			    $user = "dbo773402748";
			    $pass= "label-4881";
				$pdo = new PDO('mysql:host=db773402748.hosting-data.io;dbname=db773402748', $user, $pass);
				 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $pdo;
				
			} catch (PDOException $e) {
			    print "Erreur !: " . $e->getMessage() . "<br/>";
			    die();
			}
}


function passwordtest($email, $pass){
		$email = $email;
		$pass = $pass;
		$bdd = getDatabaseConnexion();	
		$req = $bdd->prepare('SELECT email, pass FROM personne WHERE email = :email');
		$req->execute(array(
			'email' => $email));
		
		return $req;
}
function logout(){
	$_SESSION = array();
	session_destroy();
}

function reserve($hour,$date,$roomID,$email){
	$con = getDatabaseConnexion();
	$personID = getPersonID($email);
	$requete = $con->prepare("INSERT INTO reservation(SalleID,Date_Res,HeureDebut,personID) VALUES ('$roomID','$date','$hour','$personID')");
	$requete->execute(array(
		'date' => $date,
		'hour' => $hour,
		'personID' => $personID,
		'roomID' => $roomID
		));
	
}

function getPersonID() {
			$con = getDatabaseConnexion();
			$requete = $con->prepare("SELECT personID FROM personne where email=:email");
			$requete->execute(array(
				'email' =>$_SESSION["email"]
				));
			$data=$requete->fetch();
			$personID = $data["personID"];
			return $personID;
		}
function cancelReservation($idReservation){
	$con = getDatabaseConnexion();
	$requete = $con->prepare("DELETE from reservation where idReservation=:idReservation");
	$requete-> execute(array(
	'idReservation' => $idReservation
	));
}
function getReservations()
{
		$con = getDatabaseConnexion();
		$personID = getPersonID(); 
		$requete = $con->prepare("SELECT idReservation,NomSalle,Date_Res,HeureDebut from reservation left join salles on reservation.SALLEID=salles.salleID where personID=:personID");
		$requete->execute(array(
		'personID' =>$personID
		));
		return $requete;
}

function getNbReservation()
{
		$con = getDatabaseConnexion();
		$personID = getPersonID(); 
		$requete = $con->prepare("SELECT count(*) as nombre,idReservation,NomSalle,Date_Res,HeureDebut from reservation left join salles on reservation.salleID=salles.salleID where personID=:personID");
		$requete->execute(array(
		'personID' =>$personID
		));
		$data =$requete->fetch();
		return $data;
}
		
function getSalle($hour,$date){
	$con = getDatabaseConnexion();
	$requete = $con->prepare("SELECT * FROM salles where SALLEID not in(Select salleID from reservation where Date_res='$date' and HeureDebut='$hour')	");
			$requete->execute(array(
				'date' => $date,
				'hour' => $hour
			));
	return $requete;
	}
function getAgendaLink(){
	$con = getDatabaseConnexion();
	$email = $_SESSION["email"];
	$requete = $con->prepare("SELECT agendaLink from classes left join personne on classes.idClasse=personne.idClasse where email=:email");
	$requete->execute(array(
		'email' => $email));
	$data =$requete->fetch();	
	return $data;
}
function getAccount() {
			$con = getDatabaseConnexion();
			$email = $_SESSION["email"];
			$requete = $con->prepare("SELECT Nom,Prenom,NomDepartement,NomClasse,img from personne left join classes on personne.idClasse=classes.idClasse left join departement on personne.departementID=departement.departementID where email=:email");
			$requete->execute(array(
				'email' =>$email));
			$data=$requete->fetch();
			
			return $data;
		}