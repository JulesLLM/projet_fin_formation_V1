<?php
    namespace App\Controller;
    
    use Framework\Controller\AbstractController;
    use App\Validator\FormLoginValidator;

class FormLoginController extends AbstractController {
    
    public function affichageFormLogin() {
        $flMgr = new FormLoginValidator();
        
        if (isset($_POST['login'])) {
           if ($flMgr-> process()) {
               // Redirection
               header("Location: home");
               die;
           }
        }
        
        return $this->renderView('FormLoginView.phtml', ['title' => 'Login Patient']);
    }
}