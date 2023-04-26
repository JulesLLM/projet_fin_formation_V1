<?php
    namespace App\Validator;

    use Framework\Controller\AbstractController;
    use App\Entity\Patient;
    use App\Manager\SubscribeManager;

class PatientFormValidator extends AbstractController{
    
    public $nom;
    public $prenom;
    public $date_naissance;
    public $adresse;
    public $telephone;
    public $email;
    public $email2;
    public $password;
    public $password2;
    
    public function __construct(){
        $this->nom = $this->sanitize('nom');
        $this->prenom = $this->sanitize('prenom');
        $this->date_naissance = $this->sanitize('date_naissance');
        $this->adresse = $this->sanitize('adresse');
        $this->telephone = $this->sanitize('telephone');
        $this->email = $this->sanitize('email');
        $this->email2 = $this->sanitize('email2');
        $this->password = $this->sanitize('password');
        $this->password2 = $this->sanitize('password2');
    }
    
    //méthode pour vérifier que les mails saisient dans le champs 1 et 2 correspondent
    private function checkMail() {
        if ($this->email !== $this->email2) {
            echo "Mails différents";
            return false;
        }
        return true;
    }
    
    //méthode pour vérifier que les passwords saisient correspondent
    private function checkPwd() {
        if ($this->password !== $this->password2) {
            echo "Passwords différents";
            return false;
        }
        return true;
    }
    
    public function process() {
        $check = false;
        if (!empty($this->nom) && !empty($this->prenom) &&!empty($this->date_naissance) 
        && !empty($this->adresse) && !empty($this->telephone) && !empty($this->email) 
        && !empty($this->email2) && !empty($this->password) && !empty($this->password2)) {
            $check = true;
                
            // Vérification des emails
            if (!$this->checkMail()) {
                $check = false;
            }
            
            // Vérification des pwd
            if (!$this->checkPwd()) {
                $check = false;
            }
            
            //vérification si le mail n'est pas déjà enregistré
                    $userMgr = new SubscribeManager();
                    $mailBdd = $userMgr->checkMail($this->email);
                    if ($mailBdd !== false) 
                    {
                        $check = false;
                        echo "Mail déjà existant";
                    } 

        }
        return $check;
    }
}