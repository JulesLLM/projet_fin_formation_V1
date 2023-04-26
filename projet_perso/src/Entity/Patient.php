<?php
namespace App\Entity;

class Patient {
    private ?int $id;
    private ?string $nom;
    private ?string $prenom;
    private ?string $date_naissance;
    private ?string $adresse;
    private ?string $telephone;
    private ?string $email;
    private ?string $password;
    private static $columns = ['id', 'nom', 'prenom', 'date_naissance', 
    'adresse', 'telephone', 'email', 'password'];
    
    public static function getColumns() {
        return implode(',', self::$columns);
    }
  
    public function getId(): ?int {
        return $this->id;
      }
      
    public function getNom(): ?string {
        return $this->nom;
      }
      
    public function setNom(?string $nom): void {
    $this->nom = $nom;
      }

    public function getPrenom(): ?string {
        return $this->prenom;
      }
    
    public function setPrenom(?string $prenom): void {
    $this->prenom = $prenom;
      }
    
    public function getDate_naissance(): ?string {
        return $this->date_naissance;
      }
    
    public function setDate_naissance(?string $date_naissance): void {
    $this->date_naissance = $date_naissance;
      }
    
    public function getAdresse(): ?string {
        return $this->adresse;
     }
   
   public function setAdresse(?string $adresse): void {
    $this->adresse = $adresse;
     }
    
    public function getTelephone(): ?string {
        return $this->telephone;
      }

    public function setTelephone(?string $telephone): void {
        $this->telephone = $telephone;
      }
      
    public function getEmail(): ?string {
        return $this->email;
      }

    public function setEmail(?string $email): void {
        $this->email = $email;
      }  
      
      public function getPasswotd(): ?string {
        return $this->password;
      }

    public function setPassword(?string $password): void {
        $this->password = $password;
      }  
}