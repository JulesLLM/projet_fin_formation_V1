<?php
    namespace App\Manager;
    
    use Framework\Manager\AbstractManager;
    use App\Entity\Commentaire;

class CommentaireFormManager extends AbstractManager {
    
    public function ajouterCommentaire($commentaire): void {
        $this->create(Commentaire::class, $params = [
            'contenu' => $commentaire->getContenu(),
            'date_publication' => $commentaire->getDate_publication(),
            'id_article' => $commentaire->getId_article(),
            'id_patient' => $commentaire->getId_patient(),
        ]);
    }
}