<?php
    namespace App\Controller;

    use Framework\Controller\AbstractController;
    use App\Validator\ArticleFormValidator;
    use App\Manager\ArticleFormManager;
    use App\Entity\Article;

class ArticleFormController extends AbstractController {

    public function affichageArticleForm() {
        // vérifie si le formulaire à été envoyé 
        if (isset($_POST['poster'])) {
            //Crée objet FormValidator, responsable de la validation des données du formulaire
            $articleFormValidator = new ArticleFormValidator(); 
            $check = $articleFormValidator->process();
            
            // vérifie si toutes les données sont valides. Si True = création d'une prestation
            //if ($check && isset($_SESSION['id'])) {
            if ($check) {
                $article = new Article();
                $article->setTitre($articleFormValidator->titre);
                $article->setContenu($articleFormValidator->contenu);
                $article->setImage($articleFormValidator->image);
                $article->setResume($articleFormValidator->resume);
                $article->setDate_publication($articleFormValidator->date_publication);
                $article->setIdPraticien($_SESSION['praticien']);
                $articleManager = new ArticleFormManager();
                $articleManager->ajouterArticle($article);
            }
        }   
        return $this->renderView('article_form.phtml', ['title' => 'Formulaire Article']);
    }
}
        
 