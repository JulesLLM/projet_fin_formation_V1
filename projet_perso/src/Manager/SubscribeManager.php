<?php
namespace App\Manager;

use Framework\Manager\AbstractManager;
use App\Entity\Patient;

class SubscribeManager extends AbstractManager {

    //Methode pour verifier si le mail n'est pas déjà existant dans la BDD
    public function checkMail($email) {
            return $this->readOne(Patient::class, ['email' => $email]);
        }

}