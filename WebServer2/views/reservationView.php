<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/headerCSS.css">
    <link rel="stylesheet" media="screen and (max-width: 1200px)" href="css/styleXS.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <header>
	<?php require('header/header.php'); ?>
    </header>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="main">
            <h3>Critères</h3>
            <form id="book-form" method='POST' action='index.php?action=reserveController'>
              <p>Date</p>
              <div class="stick"></div>
              <input type="date" name="date">
              <p>Horaires</p>
              <div class="stick"></div>
              <select class="hour_select" name="hour">
                <option value="8:00:00">8h-9h</option>
				<option value="9:00:00">9h-10h</option>
				<option value="10:00:00">10h-11h</option>
				<option value="11:00:00">11h-12h</option>
				<option value="12:00:00">12h-13h</option>
				<option value="13:00:00">13h-14h</option>
				<option value="14:00:00">14h-15h</option>
				<option value="15:00:00">15h-16h</option>
				<option value="16:00:00">16h-17h</option>
				<option value="17:00:00">17h-18h</option>
				<option value="18:00:00">18h-19h</option>
				<option value="19:00:00">19h-20h</option>
              </select>
              <br>
              <div class="center">
                <input type="submit" name="" value="Valider">
              </div>
            </form>
          </div>
        </div>
			<?php
			if (isset($date)) {
			?> 
			<div class="col-md-6">
			<?php
			while ($chambres = $rooms->fetch())
			{
				$SalleID=$chambres["SalleID"];
			echo' 
		
			
          <div class="contain">
            <div class="classroom">
              <h5>Salle '.$chambres["NomSalle"].'</h5>
              <img src="images/salle.jpg" alt="">
              <form action="index.php?idsalle='.$SalleID.'&date='.$date.'&hour='.$hour.'" method="post" id="btn-book">
                <input type="submit" name="book" value="Réserver">
              </form>
            </div>
        </div>';
			}
			}
			?>
      </div>
    </div>

    <footer></footer>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
