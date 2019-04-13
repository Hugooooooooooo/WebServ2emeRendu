<?php
require('models/model.php');
function loginController()
{
    require('views/loginView.php');
}

function loginVerifyController(){	
	$email=  isset($_POST['email'])?($_POST['email']):'';
	$pass=  isset($_POST['pass'])?($_POST['pass']):'';
	$req=passwordtest($email, $pass);
	$resultat = $req->fetch();
	$isPasswordCorrect = $pass == $resultat['pass'];
		
		if (!$resultat)
		{
			loginController();
		}
		else
		{
			if ($isPasswordCorrect) {
				$_SESSION['email'] = $email;
				$_SESSION['pass'] = $pass;
				myAccountController();
				exit();
				
			}
			else {
				loginController();
			}
		}

}



function agendaController()
{
	$data = getAgendaLink();
	$agendaLink = $data["agendaLink"];
   require('views/edtView.php');
}

function homeController()
{
    require('views/homeView.php');
}

function reservationsController()
{
	$personID = getPersonID();
	$myReservations=getReservations($personID);
	require('views/reservationsView.php'); // Extraction de chaque donnée à faire dans le view.
}

function reservationCancelController()
{
	$idReservation = $_GET['idReservation'];
	cancelReservation($idReservation);
	myAccountController();

}

function reserveChoiceController()
{
	$hour = $_POST['hour'];
	$date = $_POST['date'];    
	$rooms = getSalle($hour,$date);
	
	require('views/reservationView.php');
	
}

function reservationController(){
	$email = $_SESSION['email'];
	$roomID = $_GET['idsalle'];
	$date = $_GET['date'];
	$hour = $_GET['hour'];
	reserve($hour,$date,$roomID,$email);
	myAccountController();
	
	
}	
function myAccountController(){
	$data2 =  getNbReservation();
	$data = getAccount();
	$data3 = getAgendaLink();
			$Nom = $data["Nom"];
			$Prenom = $data["Prenom"];
			$NomDepartement = $data["NomDepartement"];
			$NomClasse = $data["NomClasse"];
			$nbReservation = $data2["nombre"];
	$reservations = getReservations();
	
	
	require('views/myAccountView.php');
}

function sessionDestroyController(){
	session_destroy();
	loginController();	
}




