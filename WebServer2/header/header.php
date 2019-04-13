<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/teest.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title></title>
  </head>
  <body>
    <div class="area"></div>
    <nav class="main-menu">
    <ul>
      <li>
        <a href="index.php?action=home">
          <i class="fa fa-home fa-2x"></i>
            <span class="nav-text">
              Accueil
            </span>
        </a>

        </li>
        <li class="has-subnav">
            <a href="index.php?action=myAccount">
              <i class="fa fa-laptop fa-2x"></i>
              <span class="nav-text">
                  Mon compte
              </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="index.php?action=reservation">
               <i class="fa fa-list fa-2x"></i>
                <span class="nav-text">
                    Réserver une salle
                </span>
            </a>

        </li>
        <li>
            <a href="index.php?action=error">
                <i class="fa fa-bar-chart-o fa-2x"></i>
                <span class="nav-text">
                    Notes
                </span>
            </a>
        </li>
        <li>
            <a href="index.php?action=error">
                <i class="fa fa-address-book fa-2x"></i>
                <span class="nav-text">
                   Annuaire
                </span>
            </a>
        </li>
        <li>
           <a href="index.php?action=agenda">
               <i class="fa fa-table fa-2x"></i>
                <span class="nav-text">
                    Emploi du temps
                </span>
            </a>
        </li>
        <li>
            <a href="index.php?action=error">
               <i class="fa fa-info fa-2x"></i>
                <span class="nav-text">
                    FAQ
                </span>
            </a>
        </li>
    </ul>

    <ul class="logout">
        <li>
           <a href="index.php?action=destroy">
                 <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                    Déconnexion
                </span>
            </a>
        </li>
      </ul>
    </nav>
</body>
</html>