<?php
namespace App\Controller;

use Framework\Controller\AbstractController;
use App\Validator\PatientFormValidator;
use App\Manager\PatientManager;
use App\Entity\Patient;

class PatientForm extends AbstractController {

    public function affichagePatientForm() {
        // vérifie si le formulaire à été envoyé 
        if (isset($_POST['subscribe'])) {
            //Crée objet FormValidator, responsable de la validation des données du formulaire
            $patientFormValidator = new PatientFormValidator(); 
            $check = $patientFormValidator->process();
            
            // vérifie si toutes les données sont valides. Si True = création d'un Patient avec mdp hascher
            if ($check) {
                $user = new Patient();
                $user->setEmail($patientFormValidator->email);
                $user->setNom($patientFormValidator->nom);
                $user->setPrenom($patientFormValidator->prenom);
                $user->setDate_naissance($patientFormValidator->date_naissance);
                $user->setAdresse($patientFormValidator->adresse);
                $user->setTelephone($patientFormValidator->telephone);
                $user->setPassword(password_hash($patientFormValidator->password, PASSWORD_DEFAULT));
                $patientManager = new PatientManager();
                $patientManager->save($user);
            }
        }
        
        return $this->renderView('inscription_form.phtml',['title' => 'Formulaire Inscription']);
    }
}