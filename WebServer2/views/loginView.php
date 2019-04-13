<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css"/>
    <title>Connexion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <body>
    <div class="sidenav">
         <div class="login-main-text">
            <h2>Bienvenue,</h2>
            <p>Connectez-vous au site universitaire de l'IUT Paris Descartes <br>
            pour accéder à votre emplois du temps, à l'actualité, réserver une salle...</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="index.php?action=loginVerifyController" method="post">
                 <img src="logo.png" alt="logo iut">
                  <div class="form-group">
                     <label>Adresse mail</label>
                     <input type="email" class="form-control" id="email" name="email" placeholder="exemple@gmail.com">
                  </div>
                  <div class="form-group">
                     <label>Mot de passe</label>
                     <input type="password" class="form-control" id="pass" name="pass" placeholder="Votre mot de passe">
                  </div>
				  <?php 
				  if(isset($_GET['action'])&&$_GET['action']=='error'){
				  echo '<p id="errorLogin" style="color: #BC0000">Adresse mail ou mot de passe incorrectes</p>';
				  }				  
				  ?>
                  <button type="submit" class="btn btn-black" id="next">Login</button>
               </form>
            </div>
         </div>
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>