<?php
namespace App\Entity;

class Praticien {

    private ?int $id;
    private ?string $nom;
    private ?string $prenom;
    private ?string $telephone;
    private ?string $email;
    private ?string $password;

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
      
      public function getPassword(): ?string {
        return $this->password;
      }

    public function setPassword(?string $password): void {
        $this->password = $password;
      }  
}