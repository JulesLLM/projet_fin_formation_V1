<?php
    namespace App\Controller;

    use Framework\Controller\AbstractController;
    use App\Validator\CommentaireFormValidator;
    use App\Manager\CommentaireFormManager;
    use App\Entity\Commentaire;

class CommentaireFormController extends AbstractController {

    public function affichageCommentaireForm() {
        // vérifie si le formulaire à été envoyé 
        if (isset($_POST['poster'])) {
            //Crée objet FormValidator, responsable de la validation des données du formulaire
            $commentaireFormValidator = new CommentaireFormValidator(); 
            $check = $commentaireFormValidator->process();
            
            // vérifie si toutes les données sont valides. Si True = création d'une prestation
            if ($check && isset($_SESSION['id'])) {
                $commentaire = new Commentaire();
                $commentaire->setContenu($commentaireFormValidator->contenu);
                $commentaire->setDate_publication($commentaireFormValidator->date_publication);
                $commentaire->setId_patient($_SESSION['id']);
                $commentaire->setId_article($commentaireFormValidator->id_article);
                $commentaireManager = new CommentaireFormManager();
                $commentaireManager->ajouterCommentaire($commentaire);
            }
        }   
        //return $this->renderView('commentaire_form.phtml');
        header("Location: article?id=".$commentaireFormValidator->id_article);
        die;
    }
}
        
 