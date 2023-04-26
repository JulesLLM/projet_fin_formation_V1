<?php
    namespace App\Validator;

    use Framework\Controller\AbstractController;
    use App\Entity\Commentaire;

class CommentaireFormValidator extends AbstractController{
    
    public $id_article;
    public $id_patient;
    public $contenu;
    public $date_publication;
    
    public function __construct(){
        $this->contenu = $this->sanitize('contenu');
        $this->date_publication = $this->sanitize('date_publication');
        $this->id_article = $this->sanitize('id_article');
        $this->id_patient = $_SESSION['id'];
    }
    
    public function process() {
        $check = false;
        if (!empty($this->contenu) && !empty($this->date_publication)) {
            $check = true;

        }
        return $check;
    }
}