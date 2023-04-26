<?php
// squelette commun à l'ensemble des pages web
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Vérifie si la variable $data['title']. Si oui, permet d'avoir un titre personnalisé pour chaque page -->
    <title><?php if (isset($data['title'])) echo $data['title']; ?> </title>
    <!-- Vérifie si la variable $data['description'] existe, includ une balise <meta> avec description de la page. 
    Cette description est souvent utilisée par les moteurs de recherche pour afficher un court résumé de la page dans les résultats de recherche.--> 
    <?php if (isset($data['description'])) { ?>
      <meta name="description" content="<?= $data['description'] ?>">
    <?php } ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/59e575e990.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="public/js/navbar.js"></script>
    <script src="public/js/carrousel.js"></script>
    <script src="public/js/article_commentaire.js"></script>
    <script src="public/js/article_edit.js"></script>
    <script src="public/js/agenda.js"></script>
    <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
     <link rel="stylesheet" href="public/css/styles.css">
  </head>
  <body>
    <!-- Pour inclure la nav--> 
    <?php include '_navbar.php'; ?>
    <main class="wrapper">
      <!-- La variable templatePath affiche le contenu spécifique de chaque page-->
      <?php require $templatePath ?>
    </main>
    <!-- Pour inclure le footer-->
    <?php include '_footer.php'; ?>
    
    
  </body>
</html>