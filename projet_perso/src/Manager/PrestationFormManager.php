<?php
    namespace App\Manager;
    
    use Framework\Manager\AbstractManager;
    use App\Entity\Prestation;

class PrestationFormManager extends AbstractManager {
    
    public function ajouterPrestation($prestation): void {
        $this->create(Prestation::class, $params = [
            'nom_prestation' => $prestation->getNom_prestation(),
            'definition' => $prestation->getDefinition(),
            'duree' => $prestation->getDuree(),
            'cout' => $prestation->getCout(),
            
        ]);
    }
}
   