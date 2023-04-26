<?php
    namespace App\Controller;
    
    use Framework\Controller\AbstractController;
    use App\Manager\RdvRecupManager;

class AffichageRendezVous extends AbstractController {
    
    
    public function affichageRdv() {
        $rdvMgr = new RdvRecupManager();
        
        $AllRendezvous = $rdvMgr->recupAllRdv();
        
        for ($i=0; $i<count($AllRendezvous); $i++) {
            $AllRendezvous[$i]->patient = $rdvMgr->recupererPatient($AllRendezvous[$i]->getId_patient());
            $AllRendezvous[$i]->prestation = $rdvMgr->recupererPatient($AllRendezvous[$i]->getId_prestation());
        }
        return $this->renderView('affichage_rendezvous.phtml', ["rdvs" => $AllRendezvous, 'title' => 'Formulaire Rendez-vous']);
    }
}