<?php
    namespace App\Validator;

    use Framework\Controller\AbstractController;
    use App\Entity\Rendezvous;

class RdvFormValidator extends AbstractController{
    
    public $id_prestation;
    public $datetimes;
    public $lieu;
    public $antecedents_medicaux;
    public $commentaires;
    
    public function __construct(){
        $this->datetimes = $this->sanitize('datetimes');
        $this->lieu = $this->sanitize('lieu');
        $this->antecedents_medicaux = $this->sanitize('antecedents_medicaux');
        $this->commentaires = $this->sanitize('commentaires');
        $this->id_prestation = $this->sanitize('id_prestation');
    }
    
    public function process() {
        $check = false;
        if (!empty($this->datetimes) && !empty($this->lieu) &&!empty($this->antecedents_medicaux) && !empty($this->commentaires) && !empty($this->id_prestation)) {
            $check = true;

        }
        return $check;
    }
}