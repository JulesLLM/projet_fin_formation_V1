<?php
    namespace App\Manager;

    use Framework\Manager\AbstractManager;
    use App\Entity\Patient;

class ControlPatientManager extends AbstractManager {
    
    public function loadUser($id)  {
            return $this->readOne(Patient::class, ['id' => $id], Patient::getColumns());
        }
        
    public function updateMail($email, $id) {
            return $this->update(Patient::class, ['email' => $email], $id);
        }
        
     public function updateNom($nom, $id) {
            return $this->update(Patient::class, ['nom' => $nom], $id);
        }
    
     public function updatePrenom($prenom, $id) {
            return $this->update(Patient::class, ['prenom' => $prenom], $id);
        }
    
    public function updateTelephone($telephone, $id) {
            return $this->update(Patient::class, ['telephone' => $telephone], $id);
        }
    
    public function updateDate_naissance($date_naissance, $id) {
            return $this->update(Patient::class, ['date_naissance' => $date_naissance], $id);
        }
    
    public function updateAdresse($adresse, $id) {
            return $this->update(Patient::class, ['adresse' => $adresse], $id);
        }
      
    public function deleteUser($id) {
            return $this->delete(Patient::class, $id);
        }
}