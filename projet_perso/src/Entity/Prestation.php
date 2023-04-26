<?php
namespace App\Entity;

class Prestation {
    private ?int $id;
    private ?string $nom_prestation;
    private ?string $definition;
    private ?string $duree;
    private ?string $cout;
    
    public function getId(): ?int {
        return $this->id;
      }
      
    public function getNom_prestation(): ?string {
        return $this->nom_prestation;
      }
      
    public function setNom_prestation(?string $nom_prestation): void {
    $this->nom_prestation = $nom_prestation;
      }
      
    public function getDefinition(): ?string {
        return $this->definition;
      }
      
    public function setDefinition(?string $definition): void {
    $this->definition = $definition;
      }
      
      public function getDuree(): ?string {
        return $this->duree;
      }
      
    public function setDuree(?string $duree): void {
    $this->duree = $duree;
      }
      
    public function getCout(): ?string {
        return $this->cout;
      }
      
    public function setCout(?string $cout): void {
    $this->cout = $cout;
      }
}