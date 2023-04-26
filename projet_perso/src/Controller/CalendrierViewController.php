<?php
    namespace App\Controller;
    
    use App\Class\Agenda;
    use Framework\Controller\AbstractController;

class CalendrierViewController extends AbstractController {
    
    
    public function affichageCalendrier() {
        /*$prestaMgr = new PrestationViewManager();
        
        $AllPrestation = $prestaMgr->recupAllPrestation();
        
        for ($i=0; $i<count($AllPrestation); $i++) {
            $AllPrestation[$i]->prestation = $prestaMgr->recupererPrestation($AllPrestation[$i]->getId());
        }*/
        return $this->renderView('calendrier.phtml', ['title' => 'Calendrier']);
    }
}