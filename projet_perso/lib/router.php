<?php
    // Importe le fichier routes.php et donc la const ROUTES
    require dirname(__DIR__) . '/config/routes.php';
    // On récupère toutes les clés du tableau ROUTES avec la fonction array_keys(), clés = nom des routes
    $availableRouteNames = array_keys(ROUTES);
    // On vérifie si un paramètre $_GET['page'] est bien présent dans l'URL et si ce dernier est bien défini dans la liste des routes de l'utilisateur 
        if (isset($_GET['page']) && in_array($_GET['page'], $availableRouteNames)) {
          //On récupère les informations détaillées de la route
          $route = ROUTES[$_GET['page']];
          // On instancie le contrôleur concerné
          $controller = new $route['controller'];
          // On appelle sur l'objet créé la méthode 
          $controller->{$route['method']}();
        } else {
            header('Location: /projet_perso/home');
        }