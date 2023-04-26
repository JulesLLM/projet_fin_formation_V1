<?php 
 namespace App\Manager;
 
 use Framework\Manager\AbstractManager;
 use App\Entity\Patient;
 use App\Entity\Prestation;
 use App\Entity\Rendezvous;
 
class RdvRecupManager extends AbstractManager {
    
    public function recupererPatient($id) {
        return $this->readOne(Patient::class, [ 
            'id' => $id 
        ]);
    }
    
    public function recupererPrestation(int $id) {
        return $this->readOne(Prestation::class, [ 
            'id' => $id
        ]);
    }
    
   public function recupererRendezvous(int $id) {
        return $this->readOne(Rendezvous::class, [ 
            'id' => $id
        ]);    
    }
    
    public function recupAllRdv() {
        return $this->readMany(Rendezvous::class);
    }
}