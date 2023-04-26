<?php
    namespace App\Controller;
    
    use Framework\Controller\AbstractController;
    use App\Manager\ControlPatientManager;

class PatientViewController extends AbstractController {
    
        //Puisse pas accéder si non connecté 
        public function compte() {
            if (!$_SESSION['id']) {
                //Redirect
                header("Location: home");
                die;
                }
            
            $userManager = new ControlPatientManager();
            $user = $userManager->loadUser($_SESSION['id']);
            return $this->renderView('control_patient_view.phtml', ['user' => $user, 'title' => 'Mon Compte']);
        }

        public function updateAccount() {
            if (isset($_POST['new_email']) && !empty($_POST['email'])) {
                // Déclaration des variables
                $email = trim(htmlentities($_POST['email']));
                
                // Mettre à jour le mail dans la BDD
                $userManager = new ControlPatientManager();
                $user = $userManager->updateMail($email, $_SESSION['id']);
            }
             
             if (isset($_POST['new_password']) && !empty($_POST['password'])) {
                // Déclaration des variables
                $password = trim(htmlentities($_POST['password']));
                
                // Mettre à jour le password dans la BDD
                $userManager = new ControlPatientManager();
                $user = $userManager->updatePassword(password_hash($password, PASSWORD_DEFAULT), $_SESSION['id']);
            }
            if (isset($_POST['new_nom']) && !empty($_POST['nom'])) {
                // Déclaration des variables
                $nom = trim(htmlentities($_POST['nom']));
                
                // Mettre à jour le mail dans la BDD
                $userManager = new ControlPatientManager();
                $user = $userManager->updateNom($nom, $_SESSION['id']);
            }
            if (isset($_POST['new_prenom']) && !empty($_POST['prenom'])) {
                // Déclaration des variables
                $prenom = trim(htmlentities($_POST['prenom']));
                
                // Mettre à jour le mail dans la BDD
                $userManager = new ControlPatientManager();
                $user = $userManager->updatePrenom($prenom, $_SESSION['id']);
            }
            if (isset($_POST['new_telephone']) && !empty($_POST['telephone'])) {
                // Déclaration des variables
                $telephone = trim(htmlentities($_POST['telephone']));
                
                // Mettre à jour le mail dans la BDD
                $userManager = new ControlPatientManager();
                $user = $userManager->updateTelephone($telephone, $_SESSION['id']);
            }
            if (isset($_POST['new_date_naissance']) && !empty($_POST['date_naissance'])) {
                // Déclaration des variables
                $date_naissance = trim(htmlentities($_POST['date_naissance']));
                
                // Mettre à jour le mail dans la BDD
                $userManager = new ControlPatientManager();
                $user = $userManager->updateDate_naissance($date_naissance, $_SESSION['id']);
            }
            if (isset($_POST['new_adresse']) && !empty($_POST['adresse'])) {
                // Déclaration des variables
                $adresse = trim(htmlentities($_POST['adresse']));
                
                // Mettre à jour le mail dans la BDD
                $userManager = new ControlPatientManager();
                $user = $userManager->updateAdresse($adresse, $_SESSION['id']);
            }
            header("Location: account");
            die;
        }

        public function deleteAccount() {
            if (isset($_POST['delete_account'])) {
                // Déclaration des variables
                $id = $_SESSION['id'];
                
                // Supprimer le user de la BDD
                $userManager = new ControlPatientManager();
                $result = $userManager->deleteUser($id);
                
                unset($_SESSION['id']);
                header("Location: home");
                die;
            }
        }
}