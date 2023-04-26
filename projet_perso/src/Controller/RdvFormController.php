<?php
    namespace App\Controller;

    use Framework\Controller\AbstractController;
    use App\Validator\RdvFormValidator;
    use App\Manager\RdvFormManager;
    use App\Entity\Rendezvous;
    use App\Manager\PrestationViewManager;

class RdvFormController extends AbstractController {

    public function affichageRendezvousForm() {
        // vérifie si le formulaire à été envoyé 
        if (isset($_POST['poster'])) {
            //Crée objet FormValidator, responsable de la validation des données du formulaire
            $rendezvousFormValidator = new RdvFormValidator(); 
            $check = $rendezvousFormValidator->process();
            
            // vérifie si toutes les données sont valides. Si True = création d'une prestation
            if ($check && isset($_SESSION['id'])) {
                $rendezvous = new Rendezvous();
                $rendezvous->setDatetimes($rendezvousFormValidator->datetimes);
                $rendezvous->setLieu($rendezvousFormValidator->lieu);
                $rendezvous->setAntecedents_medicaux($rendezvousFormValidator->antecedents_medicaux);
                $rendezvous->setCommentaires($rendezvousFormValidator->commentaires);
                $rendezvous->setId_prestation($rendezvousFormValidator->id_prestation);
                $rendezvous->setIdPatient($_SESSION['id']);
                $rendezvousManager = new RdvFormManager();
                $rendezvousManager->ajouterRendezVous($rendezvous);
                
                
            }
        }   
        
        //récupère les prestations pour les récupérer dans le form
        $prestaMgr = new PrestationViewManager();
        $prestations = $prestaMgr->recupAllPrestation();
        
        return $this->renderView('rendezvous_form.phtml', ["prestations" => $prestations]);
            
    }
}
        
 