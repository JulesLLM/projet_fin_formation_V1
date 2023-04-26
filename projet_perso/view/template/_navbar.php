<?php

  use App\Manager\PatientManager; 
  use App\Manager\PraticienManager; 
  
  //nom user
  if (isset($_SESSION['id'])) {
    $patientMgr = new PatientManager();
    $user = $patientMgr->loadFromId($_SESSION['id']);
  }
  //Nom praticien
  if (isset($_SESSION['praticien'])) {
    $praticienMgr = new PraticienManager();
    $user = $praticienMgr->loadFromId($_SESSION['praticien']);
  }
?>
<header>
  <nav>
    <div id="sub-menu">
      <div id="hamburger-menu">
        <svg viewBox="0 0 100 80" width="40" height="40" id="hamburger">
          <rect width="100" height="20"></rect>
          <rect y="30" width="100" height="20"></rect>
          <rect y="60" width="100" height="20"></rect>
        </svg>
      </div>
      <ul id="menu">
        <li><a href="home" id="home">Accueil</a></li>
        <li>
          <a href="view_prestation" id="prestations">Prestations</a>
        </li>
        <li><a href="articles" id="articles">Articles</a></li>
        <li><a href="calendrier" id="reservation">Réservation</a></li>
      </ul>
    </div>
  
    <div id="entreprise">
      <div id="logo-wrapper">
        <img id="img_entreprise" src="public/images/logo_cabient_xing_ming.png" alt="logo Xing Ming">
      </div>
      <div id="text-wrapper">
        <span id="n_e_1">Cabinet </span>
        <span id="n_e_2">Xing </span>
        <span id="n_e_3">Ming </span>
      </div>
    </div>

    <!-- Menu User-->
    <div id="sub-menu2">
      <?php if (isset($_SESSION['id'])) { ?>
        <a href="#" class="icone"><?= $user->getNom() ?><i class="fa-regular fa-user"></i></a>
        <div>
          <a href="account">Mon compte</a>
          <a href="rendezvous">Mes Rendez-vous</a>
          <a href="deconnexion">Se Déconnecter</a>
        </div>
                <?php } ?>
          <?php if (isset($_SESSION['praticien'])) { ?>
          <a href="#" class="icone"><?= $user->getNom() ?><i class="fa-regular fa-user"></i></a>
                <div>
                  <a href="creation_prestation">Créer une Prestation</a>
                  <a href="form_article">Créer un Article</a>
                  <a href="deconnexion<?php if (isset($_SESSION['praticien'])) { echo "_admin"; }  ?>">Se Déconnecter</a>
                </div>
          <?php }  else if (!isset($_SESSION['id']) && !isset($_SESSION['praticien'])){ ?>
                
                <i class="fa-regular fa-user"></i>
              <div>
                <a href="inscription">Inscription</a>
                <a href="login">Connexion Patient</a>
                <a href="praticien_login">Connexion Praticien</a>
              </div>
          <?php } ?>
              <!-- SVG Yin Yang-->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="-20 -20 40 40" width="24" height="24" id="yin-yang">
            <circle r="19" fill="#002147"/>
            <path fill="#FF0000" d="M0,19a19,19 0 0 1 0,-38a9.5,9.5 0 0 1 0,19a9.5,9.5 0 0 0 0,19"/>
            <circle r="3.5" cy="9.5" fill="#FF0000"/>
            <circle r="3.5" cy="-9.5" fill="#002147"/>
          </svg>
        </div>
       
  </nav>
</header>