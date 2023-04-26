<?php
    namespace App\Manager;
    
    use Framework\Manager\AbstractManager;
    use App\Entity\Rendezvous;

class RdvFormManager extends AbstractManager {
    
    public function ajouterRendezVous($rendezvous): void {
        $this->create(Rendezvous::class, $params = [
            'datetimes' => $rendezvous->getDatetimes(),
            'lieu' => $rendezvous->getLieu(),
            'antecedents_medicaux' => $rendezvous->getAntecedents_medicaux(),
            'commentaires' => $rendezvous->getCommentaires(),
            
        ]);
    }
}