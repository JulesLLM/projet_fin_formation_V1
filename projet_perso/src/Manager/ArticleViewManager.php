<?php 
    namespace App\Manager;
 
    use Framework\Manager\AbstractManager;
    use App\Entity\Article;
    use App\Entity\Commentaire;
 
 class ArticleViewManager extends AbstractManager {
     
    public function recupererArticle(int $id) {
        return $this->readOne(Article::class, ['id' => $id]);
    }
    
    public function recupAllArticle() {
        return $this->readMany(Article::class);
    }
    
     public function updateTitre($titre, int $id) {
        return $this->update(Article::class, ['titre' => $titre], $id);
    }
    
    public function updateContenu($contenu, int $id) {
        return $this->update(Article::class, ['contenu' => $contenu], $id);
    }
    
     public function supprArticle($id) {
        return $this->delete(Article::class, $id);
    }
     
    public function recupAllCommentaire() {
        return $this->readMany(Commentaire::class);
    }
    
    public function recupererCommentaire(int $id) {
        return $this->readOne(Commentaire::class, [ 
            'id' => $id
        ]);
    }
    
     public function modifCommentaire($contenu, int $id) {
        return $this->update(Commentaire::class,  ['contenu' => $contenu], $id);
    }
    
     public function supprCommentaire() {
        return $this->delete(Commentaire::class);
    }
}