<?php
    namespace App\Manager;

    use Framework\Manager\AbstractManager;
    use App\Entity\Patient;

class PatientManager extends AbstractManager {
    
    public function save($user): void {
        $this->create(Patient::class, $params = [
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'date_naissance' => $user->getDate_naissance(),
            'adresse' => $user->getAdresse(),
            'telephone' => $user->getTelephone(),
            'email' => $user->getEmail(),
            'password' => $user->getPasswotd()
        ]);
    }
    
    public function loadFromEmail($email) {
        return $this->readOne(Patient::class, ["email" => $email]);
    }
    
    public function loadFromId($id) {
        return $this->readOne(Patient::class, ["id" => $id]);
    }
}