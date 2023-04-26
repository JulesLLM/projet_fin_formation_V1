<?php 
    namespace App\Manager;
 
    use Framework\Manager\AbstractManager;
    use App\Entity\Commentaire;
 
 class CommentaireManager extends AbstractManager {
     
     //simplifie l'insertion d'une ressource pour une entité donnée. Exploite l'update ()
   public function editCommentaire ($commentaire) {
    return $this->update(Commentaire::class, [
        'contenu' => $commentaire->getContenu(),
        'date_publication' => $commentaire->getDate_publication(),
      ],
      $commentaire->getId()
    );
  }
  
  //simplifie la suppression d'une ressource pour une entité donnée. Exploite delete()
  public function suprrCommentaire( $commentaire) {
  return $this->delete(Commentaire::class, $commentaire->getId());
  }
}