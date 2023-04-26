<?php
    namespace App\Validator;

    use Framework\Controller\AbstractController;
    use App\Manager\PatientManager;
  
class FormLoginValidator extends AbstractController {
    public $email;
    public $password;
    
     public function __construct() {
        $this->password = $this->sanitize('password');
        $this->email = $this->sanitize('email');
    }
    //rturn true or false et si true = header home
    public function process() {
        $userMgr = new PatientManager();
        $user = $userMgr->loadFromEmail($this->email);
        if (is_object($user)) {
            // Comme le mot de passe est haché, on ne peut pas faire autrement
            if (password_verify($this->password, $user->getPasswotd())) {
                $_SESSION['id'] = $user->getId();
                return true;
            } else {
                echo "Login ou mot de passe incorrect ou inexistant.";
            }
        } else {
            // Pas réussi à charger l'utilisateur à l'aide de son mail
            echo "Login ou mot de passe incorrect ou inexistant.";
        }
        return false;
    }
}