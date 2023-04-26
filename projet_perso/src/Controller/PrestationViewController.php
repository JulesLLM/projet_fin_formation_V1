<?php
    namespace App\Controller;
    
    use Framework\Controller\AbstractController;
    use App\Manager\PrestationViewManager;

class PrestationViewController extends AbstractController {
    //RECUPERATION ONE BY ONE ET LES AFFICHER SELON L'ID BDD
    
    public function affichagePrestation() {
        $prestaMgr = new PrestationViewManager();
        
        $AllPrestation = $prestaMgr->recupAllPrestation();
        
        for ($i=0; $i<count($AllPrestation); $i++) {
            $AllPrestation[$i]->prestation = $prestaMgr->recupererPrestation($AllPrestation[$i]->getId());
        }
        return $this->renderView('prestation_view.phtml', ["prestations" => $AllPrestation, "title" => "Prestations"]);
    }
}