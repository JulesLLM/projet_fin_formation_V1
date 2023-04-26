<?php
    namespace App\Validator;

    use Framework\Controller\AbstractController;
    use App\Entity\Prestation;

class PrestationFormValidator extends AbstractController{
    
    public $nom_prestation;
    public $definition;
    public $duree;
    public $cout;
    
    public function __construct(){
        $this->nom_prestation = $this->sanitize('nom_prestation');
        $this->definition = $this->sanitize('definition');
        $this->duree = $this->sanitize('duree');
        $this->cout = $this->sanitize('cout');
    }
    
    public function process() {
        $check = false;
        if (!empty($this->nom_prestation) && !empty($this->definition) &&!empty($this->duree) && !empty($this->cout)) {
            $check = true;

        }
        return $check;
    }
}