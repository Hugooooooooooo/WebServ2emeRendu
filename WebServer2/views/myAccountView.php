<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/Account.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <title></title>
  </head>
   <header>
	<?php require('header/header.php'); ?>
    </header>
  <body>
    <section>
      <div class="top__nav">
        <ul>
          <li>Help <i class="	fa fa-question-circle fa-2x"></i></li>
          <li>Messages<i class="fa fa-comments-o fa-2x"></i><span class="notification">Nb</span></li>
          <li> <?php echo $Prenom; ?> <i class="fa fa-caret-down fa-2x"></i></li>
        </ul>
      </div>
      <div class="welcome__block">
          <div>
			<img src="https://www.artworkcircle.lu/wp-content/uploads/Fb.jpeg" class="hihi">
            <div>
              <h1>Bonjour, <?php echo $Prenom; ?></h1>
              <p><?php echo " Departement ".$NomDepartement."<br> Classe ". $NomClasse ?></p>
            </div>
          </div>
          <div>
            <h1 class="large"> <?php echo $nbReservation; ?></h1>
            <p>Salles reservées</p>
            <p><a href="index.php?action=reservation">Réserver une salle</a></p>
          </div>
          <div>
            <span class="alert">
              <h3>Faîtes un don et recevez un bisou de Rachel</h3>
             <a href="#"><p>Faire un magnifique don</p></a>
            </span>
          </div>
      </div>

      <div class="grid">
        <div class="column lg12 sm12">
          <div class="advert">
             <button type="button" class="close"><i class="material-icons">&#xE5CD;</i></button>
             <h3>Bienvenue, <?php echo $Nom; ?></h3>
             <p>Le site est actuellement en cours de construction. Si vous rencontrez un problème, allez vous plaindre.</p>
            <p><a href="#">Se plaindre</a></p>
          </div>
        </div>
      </div>

      <div class="grid">
        <div class="column lg12">
          <h3 class="section__title">Réservations</h3>
        </div>
        <div class="column lg8 md12 sm12">
          <div class="widget">
            <table>
              <thead>
                <tr>
                <td>Salle</td>
                <td>Date</td>
                <td>à partir (1H)</td>
                </tr>
              </thead>
              <tbody>
			  <?php 
			while ($liste = $reservations->fetch())
			{
				$idReservation = $liste["idReservation"];
			echo '
			
				<tr>
                  <td>'.$liste["NomSalle"].'</td>
                  <td>'.$liste["Date_Res"].'</td>
                  <td>'.$liste["HeureDebut"].'</td>
				   <form action="index.php?idReservation='.$idReservation.'&action=cancelReservation" method="post" id="delete2">
                    <td><button type="submit" form="delete2" class="closeRes2"><i class="fa fa-remove x2"></i></button></td>
                  </form>
                </tr>';
			}
			?>

				
              </tbody>
              </table>
              <div class="add">
                <button type="submit" class="add"><i class="fa fa-search-plus fa-2x"></i><a href="index.php?action=reservation">Faire une réservation</a></button>
              </div>
          </div>
          <h3 class="section__title">
            L'actualité
          </h3>
          <div class="widget">
            <div class="sub__title">
              Cette semaine
            </div>
            <div class="row">
              <div class="block">
                <h4>Fête de fin d'année</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum laoreet ultrices. Curabitur fermentum nisl vitae nulla aliquet, rutrum hendrerit purus rutrum.</p>
              <span class="time">September 5, 2016</span>
              </div>
              <div class="block">
                 <img src="http://www.ville-stnicolas82.fr/uploads/tx_usermanifestations/fete_04.jpg" style="width:250px;height:150px;">
              </div>
            </div>
            <div class="row">
              <div class="block">
                <h4>Titre d'un article</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum laoreet ultrices. Curabitur fermentum nisl vitae nulla aliquet, rutrum hendrerit purus rutrum.</p>
              <span class="time">September 5, 2016</span>
              </div>
              <div class="block">
               
              </div>
            </div>
            <div class="row">
              <div class="block">
                <h4>Avis de poursuite d'études </h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum laoreet ultrices. Curabitur fermentum nisl vitae nulla aliquet, rutrum hendrerit purus rutrum.</p>
              <span class="time">September 5, 2016</span>
              </div>
              <div class="block">
 		
                <img src="https://stid.iutmetz.univ-lorraine.fr/img/poursuiteEtude.gif" style="width:250px;height:150px;">
              </div>
            </div>
            <div class="add">
            <button type="button" class="add"><i class="material-icons">&#xE8EF;</i> Voir toutes l'actualités</button>
            </div>
          </div>
        </div>
        <div class="column lg4 md12 sm12">
          <div class="widget">
            <div class="title"><h3>EDT Hugues inch</h3></div>
            <div class="list">
              <ul>
                <li></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
      $( ".close" ).click(function() {
        $( ".advert" ).fadeOut( "slow")
      });
    </script>
  </body>
</html>
