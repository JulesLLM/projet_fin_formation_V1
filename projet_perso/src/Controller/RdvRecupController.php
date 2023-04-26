<?php 
 namespace App\Controller;
 use App\Controller\MainController;
 use App\Manager\RdvRecupManager;
 
class RdvRecupController extends MainController {
    
    public function recupPatient() {
        $patient = new RdvRecupManager();
        $patient->recupererPatient($id);
    }
    
    public function recupPrestation() {
        $prestation = new RdvRecupManager();
    }
    
    public function recupRdv() {
        $rdv = new RdvRecupManager();
    }
}