<?php 
 namespace App\Manager;
 
 use Framework\Manager\AbstractManager;
 use App\Entity\Prestation;
 
 class PrestationViewManager extends AbstractManager {
     
     public function recupererPrestation(int $id) {
        return $this->readOne(Prestation::class, [ 
            'id' => $id
        ]);
    }
    
    public function recupAllPrestation() {
        return $this->readMany(Prestation::class);
    }
}