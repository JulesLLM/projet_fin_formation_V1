<?php
    namespace App\Controller;

    use Framework\Controller\AbstractController;
    use App\Validator\PrestationFormValidator;
    use App\Manager\PrestationFormManager;
    use App\Entity\Prestation;

class PrestationFormController extends AbstractController {

    public function affichagePrestationForm() {
        // vérifie si le formulaire à été envoyé 
        if (isset($_POST['poster'])) {
            //Crée objet FormValidator, responsable de la validation des données du formulaire
            $prestationFormValidator = new PrestationFormValidator(); 
            $check = $prestationFormValidator->process();
            
            // vérifie si toutes les données sont valides. Si True = création d'une prestation
            if ($check) {
                $prestation = new Prestation();
                $prestation->setNom_prestation($prestationFormValidator->nom_prestation);
                $prestation->setDefinition($prestationFormValidator->definition);
                $prestation->setDuree($prestationFormValidator->duree);
                $prestation->setCout($prestationFormValidator->cout);
                $prestationManager = new PrestationFormManager();
                $prestationManager->ajouterPrestation($prestation);
            }
        }
        
        return $this->renderView('prestation_form.phtml', ['title' => 'Formulaire Prestation']);
    }
}
        
 