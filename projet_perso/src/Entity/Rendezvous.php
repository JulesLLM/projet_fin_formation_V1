<?php
namespace App\Entity;

class Rendezvous {

    private ?int $id;
    private ?int $id_patient;
    private ?int $id_prestation;
    private ?string $datetimes;
    private ?string $duree;
    private ?string $lieu;
    private ?string $antecedents_medicaux;
    private ?string $commentaires;
  
    public function getId(): ?int {
        return $this->id;
      }
      
    public function getId_patient(): ?int {
        return $this->id_patient;
      }
    
    public function setId_patient(): ?int {
        return $this->id_patient;
      }  
      
    public function getId_prestation(): ?int {
        return $this->id_prestation;
      }
      
     public function setId_prestation(): ?int {
        return $this->id_prestation;
      } 
  
    public function getDatetimes(): ?string {
        return $this->datetimes;
      }
    public function setDatetimes(?string $datetimes): void {
        $this->datetimes = $datetimes;
      }

    public function getDuree(): ?string {
        return $this->duree;
      }
    public function setDuree(?string $duree): void {
        $this->duree = $duree;
      }
        
    public function getLieu(): ?string {
        return $this->lieu;
      }
    public function setLieu(?string $lieu): void {
        $this->lieu = $lieu;
      }
    
    public function getAntecedents_medicaux(): ?string {
        return $this->antecedents_medicaux;
      }
    public function setAntecedents_medicaux(?string $antecedents_medicaux): void {
        $this->antecedents_medicaux = $antecedents_medicaux;
      }
    
    public function getCommentaires(): ?string {
        return $this->commentaires;
      }
    public function setCommentaires(?string $commentaires): void {
        $this->commentaires = $commentaires;
      }
}