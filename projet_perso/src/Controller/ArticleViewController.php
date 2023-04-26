<?php
    namespace App\Controller;
    
    use Framework\Controller\AbstractController;
    use App\Manager\ArticleViewManager;

class ArticleViewController extends AbstractController {
    
    public function affichageArticle() {
        //Récupération d'un seul article par son ID
        $articleMgr = new ArticleViewManager();
        $Onearticle = $articleMgr -> recupererArticle($_GET['id']);
        
        // Récupération de tout les commentaires en lien avec l'ID de l'article
        $commentMgr = new ArticleViewManager();
        $AllComment = $commentMgr->recupAllCommentaire();
        for ($i=0; $i<count($AllComment); $i++) {
            $AllComment[$i]->commentaire = $commentMgr->recupererCommentaire($AllComment[$i]->getId());
        }
   
        return $this->renderView('article_view.phtml',["article" => $Onearticle, "commentaires" => $AllComment, 'title' => 'Article']);
    }    
    
    public function modifierArticle () {
        // Charge l'id
        $modArticleMgr = new ArticleViewManager();
        $loadId = $modArticleMgr -> recupererArticle($_GET['id']);
        //modifier un article
         if (isset($_POST['new_titre']) && !empty($_POST['titre_article'])) {
                // Déclaration des variables
                $titre = trim(htmlentities($_POST['titre_article']));
                
                // Mettre à jour le titre dans la BDD
                $modArticleMgr = new ArticleViewManager();
                $titre = $modArticleMgr -> updateTitre($titre, $_GET['id']);
            }
        if (isset($_POST['new_contenu']) && !empty($_POST['contenu_article'])) {
                // Déclaration des variables
                $contenu = trim(htmlentities($_POST['contenu_article']));
                
                // Mettre à jour le titre dans la BDD
                $modArticleMgr = new ArticleViewManager();
                $contenu = $modArticleMgr -> updateContenu($contenu, $_GET['id']);
            }
            header("Location: articles");
                die;
    }
     public function supprimerArticle () { 
        //supprimer un article
         if (isset($_POST['suppr_article'])) {
             //id manque
        $suprrArticleMgr = new ArticleViewManager();
        $suprrOneArticle = $suprrArticleMgr -> supprArticle();
         header("Location: home");
                die;
         }
     }
    
     public function modifierCommentaire () {
     //modifier un commentaire
        $modComMgr = new ArticleViewManager();
        $modOneCom = $modComMgr -> modifCommentaire();
        return $this->renderView('article_view.phtml',["modifier_commentaire" => $modOneCom]);
     }
     
     public function supprimerCommentaire () {
     //supprimer un commentaire
        $suprrComMgr = new ArticleViewManager();
        $suprrOneCom = $suprrComMgr -> supprCommentaire();
        return $this->renderView('article_view.phtml',["supprimer_commentaire" =>$suprrOneCom]);
     }
    public function affichageArticles() {
        $articleMgr = new ArticleViewManager();
        $AllArticle = $articleMgr->recupAllArticle();
        for ($i=0; $i<count($AllArticle); $i++) {
            $AllArticle[$i]->article = $articleMgr->recupererArticle($AllArticle[$i]->getId());
        }
        return $this->renderView('articles_view.phtml', ["articles" => $AllArticle, 'title' => 'Articles']);
    }
    
}