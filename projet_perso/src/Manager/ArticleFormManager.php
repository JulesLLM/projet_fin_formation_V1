<?php
namespace App\Manager;

use Framework\Manager\AbstractManager;
use App\Entity\Article;

class ArticleFormManager extends AbstractManager {
   
   //simplifie l'insertion d'une ressource pour une entité donnée. Exploite create()
    public function ajouterArticle($article): void {
        $this->create(Article::class, [
            'titre' => $article->getTitre(),
            'image' => $article->getImage(),
            'resume' => $article->getResume(),
            'contenu' => $article->getContenu(),
            'date_publication' => $article->getDate_publication(),
            'id_praticien' => $_SESSION['praticien'],
        ]);
    }
}