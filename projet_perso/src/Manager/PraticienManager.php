<?php
    namespace App\Manager;

    use Framework\Manager\AbstractManager;
    use App\Entity\Praticien;

class PraticienManager extends AbstractManager {
    
    public function loadFromEmail($email) {
        return $this->readOne(Praticien::class, ["email" => $email]);
    }
    
    public function loadFromId($id) {
        return $this->readOne(Praticien::class, ["id" => $id]);
    }
}