<?php
    namespace App\Controller;
    
    use Framework\Controller\AbstractController;
    use App\Validator\PraticienLoginValidator;

class PraticienLoginController extends AbstractController {
    
    public function affichagePraticienLogin() {
        $alMgr = new PraticienLoginValidator();
        
        if (isset($_POST['login'])) {
           if ($alMgr-> process()) {
               // Redirection
               header("Location: home");
               die;
           }
        }
        
        return $this->renderView('PraticienLoginView.phtml', ['title' => 'Login Praticien']);
    }
}