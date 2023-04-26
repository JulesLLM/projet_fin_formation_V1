<?php
    namespace App\Validator;

    use Framework\Controller\AbstractController;
    use App\Entity\Article;

class ArticleFormValidator extends AbstractController{
    
    public $id_praticien;
    public $id_commentaire;
    public $titre;
    public $image;
    public $resume;
    public $contenu;
    public $date_publication;
    
    public function __construct(){
        $this->titre = $this->sanitize('titre');
        $this->image = $this->sanitize('image');
        $this->resume = $this->sanitize('resume');
        $this->contenu = $this->sanitize('contenu');
        $this->date_publication = $this->sanitize('date_publication');
    }
    
    public function process() {
        $check = false;
        if (!empty($this->contenu) && !empty($this->date_publication)) {
            $check = true;

        }
        return $check;
    }
}