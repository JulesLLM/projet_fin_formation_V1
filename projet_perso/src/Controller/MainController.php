<?php
// contrôleur applicatif : coordonner toutes les actions propres au projet
// action = opération effectuée sur le serveur pour répondre à la demande du client. ex : enregistrer un article en BDD, envoyer un e-mail etc.
// uniquement créé par les utilisateurs du framework, implémentation de la logique métier d'une application

// référence à src/Controller
namespace App\Controller;
// On spécifie l'usage de la classe AbstractController
use Framework\Controller\AbstractController;
// héritage 
class MainController extends AbstractController {
    // méthode permettant d'afficher la page d'accueil du site
    public function home() {
    return $this->renderView('main/home.phtml', ['title' => 'Accueil']);
  }
   // imaginons ici traiter la soumission d'un formulaire de contact et envoyer un mail...      
   public function contact() {
    // après traitement, cette méthode redirige vers la route home grâce à state=success 
    return $this->redirectToRoute('home', ['state' => 'success']);
  }
}