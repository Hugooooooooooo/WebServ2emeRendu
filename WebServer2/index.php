<?php
session_start();
require('controllers/controller.php');
	if (isset($_SESSION['email'])) {
		
		if(isset($_GET['action'])&&$_GET['action']=='home'){
			
			MyAccountController();
		}
		if(isset($_GET['action'])&&$_GET['action']=='reservation'){
			
			require('views/reservationView.php');
		}
		else if(isset($_GET['action'])&&$_GET['action']=='agenda'){
			agendaController();
		}
		
		else if(isset($_GET['action'])&&$_GET['action']=='reserveController'){
			reserveChoiceController();
		}
		
		else if(isset($_GET['action'])&&$_GET['action']=='destroy'){
			sessionDestroyController();
		}
		
		else if(isset($_GET['idsalle']) && isset($_GET['hour']) && isset($_GET['date'])) {
			reservationController();
		}
		else if(isset($_GET['action']) && $_GET['action']=='cancelReservation' && isset($_GET['idReservation'])) {
			reservationCancelController();
		}
		
			
		else if(isset($_GET['action'])&&$_GET['action']=='reservations'){
			reservationsController();
		}
		else if(isset($_GET['action'])&&$_GET['action']=='myAccount'){
			myAccountController();
		}
		
		
		
		else { 
			myAccountController(); // Penser à faire une page d'erreur 4040 à l'avenir;
		}
		
		
			
	}
	else if (isset($_GET['action'])&&$_GET['action']=='loginVerifyController'){
		loginVerifyController();
	}
	else {
		loginController();
	}
	
	
