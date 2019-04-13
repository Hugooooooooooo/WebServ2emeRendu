<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Réservation</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js"></script>
  </head>  
<?php 
while ($chambres = $rooms->fetch())
			{
				$SalleID=$chambres["SalleID"];
			echo '
          <div class="col-lg-6 col-sm-12">
            <div class="well well-lg">
              <p>Salle '.$chambres["NomSalle"].'</p>
              <img class="text-center" src="images/salleInfo.jpg" alt="sInfo">
              <form action="index.php?idsalle='.$SalleID.'&date='.$date.'&hour='.$hour.'" method="post"><input class="btn btn-warning" type="submit" name="Reserver" value="reserver"></form>
            </div>
          </div>';
			}
