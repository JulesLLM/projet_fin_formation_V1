<?php
    // tableau pour conserver de bonnes convention de nommage
    const ALIASES = [
        'Framework' => 'lib', // fait référence aux classes du framework (dossier lib)
        'App' => 'src' // fait référence aux classes de l'application de l'utilisateur ( dossier src)
    ];
    // fonction exécutée à chaque utilisation d'une classe
    spl_autoload_register(function (string $class): void {
      //éclate la variable pour isoler les différentes parties de son namespace    
      $namespaceParts = explode('\\', $class);
      // vérification première portion du namespace de la classe = clé du tableau ALIASES
      if (in_array($namespaceParts[0], array_keys(ALIASES))) {
        //si c'est le cas, on redéfinit la première portion du namespace par le dossier équivalent  
        $namespaceParts[0] = ALIASES[$namespaceParts[0]];
      } else {
        //sinon, erreur PHP  
        throw new Exception('Namespace « ' . $namespaceParts[0] . ' » invalide. Un namespace doit commencer par : « Framework » ou « App »');
      }
      //inclusion dynamique de la classe.
      //$filepath = chaîne de caractères résultant de la concaténation de 
      //dirnoame ... = chemin racine du projet ; implode... = reconstitution du namespace
      $filepath = dirname(__DIR__) . '/' . implode('/', $namespaceParts) . '.php';
      // Si aucun fichier = erreur
      if (!file_exists($filepath)) {
        throw new Exception("Fichier « " . $filepath . " » introuvable pour la classe « " . $class . " ». Vérifier le chemin, le nom de la classe ou le namespace");
      }
      require $filepath;
    });