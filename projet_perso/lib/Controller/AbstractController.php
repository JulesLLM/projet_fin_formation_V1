<?php
// rôle : implémenter une méthode pour retourner une page HTML et une pour effectuer des redirections
namespace Framework\Controller;
// abstract : met à disposition des méthodes, elle ne sera jamais instancié
abstract class AbstractController {
    // rôle de renderView : retourner une page HTML
    // template = string, nom du template HTML à retourner ; data = tableau de données à transmettre au template (optionnel)
    protected function renderView(string $template, array $data = []): string {
        //stocke le chemin vers le template
        $templatePath = dirname(__DIR__, 2) . '/view/template/pages/' . $template;
        // le chemin vers le layout du site web est inclus et retourné par la fonction
        return require_once dirname(__DIR__, 2) . '/view/template/layout.php';
        // dirname(..., 2) = spécifie qu'on souhaite remonter de deux niveaux de dossiers
        }
    
    // rôle de redirectToRoute() = effectuer des redirections    
    // name = string, nom de la route vers laquelle rediriger ; params = tableau des paramètres d'URL GET ( optionnel)
    protected function redirectToRoute(string $name, array $params = []): void {
        //$_SERVER [...] = chemin complet ainsi que nom du fichier courant
        // $uri = génère URL complète avec comme paramètre $_GET['page']
        $uri = $_SERVER['SCRIPT_NAME'] . "?page=" . $name;
        // création d'un nouveau tableau et array_push ajoute un élément au tableau    
        if (!empty($params)) {
          $strParams = [];
          foreach ($params as $key => $val) {
            array_push($strParams, urlencode((string) $key) . '=' . urlencode((string) $val));
          }
          $uri .= '&' . implode('&', $strParams);
        }
        // effectue la redirection vers l'URL générée dynamiquement
        header("Location: " . $uri);
        die;
      }
      
     protected function sanitize($name) {
        if (isset($_POST[$name])) {
            if (!empty($_POST[$name])) {
                return trim(htmlspecialchars($_POST[$name]));
            }
        }
        return null;
    }
}