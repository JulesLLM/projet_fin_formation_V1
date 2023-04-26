<?php
    namespace App\Controller;
    
    use Framework\Controller\AbstractController;
    use App\Entity\Patient;
    use App\Entity\Praticien;
    
    class LogoutController extends AbstractController {
        
        //Deconnexion User
        public function deconnexion() {
            // Si l'utilisateur est connecté, détruire la session
            if (isset($_SESSION['id'])) {
                // Détruire toutes les variables de sessiosn
                $_SESSION = array();
            
                // Supprimer le cookie de session
                if (isset($_COOKIE[session_name()])) {
                    setcookie(session_name(), '', time() - 42000, '/');
                }
            
                // Détruire la session
                session_destroy();
            }
            
            // Rediriger l'utilisateur vers la page de connexion
            header("Location: home");
            exit();
        }
        
        //Deconnexion Admin
        public function deconnexionPraticien() {
            // Si l'utilisateur est connecté, détruire la session
            if (isset($_SESSION['praticien'])) {
                // Détruire toutes les variables de sessiosn
                $_SESSION = array();
            
                // Supprimer le cookie de session
                if (isset($_COOKIE[session_name()])) {
                    setcookie(session_name(), '', time() - 42000, '/');
                }
            
                // Détruire la session
                session_destroy();
            }
            
            // Rediriger l'utilisateur vers la page de connexion
            header("Location: home");
            exit();
        }
    }
?>