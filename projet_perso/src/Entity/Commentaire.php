<?php
namespace App\Entity;

use App\Manager\PatientManager;

class Commentaire {
    private ?int $id;
    private ?int $id_patient;
    private ?int $id_article;
    private ?string $contenu;
    private ?string $date_publication;
     
    public function getId(): ?int {
    return $this->id;
  }
  
  public function getId_patient(): ?int {
    return $this->id_patient;
  }
  
    public function setId_patient($id_patient): void {
    $this->id_patient = $id_patient;
  }
  
  public function getPatient() {
    $patientMgr = new PatientManager();
    return $patientMgr->loadFromId($this->id_patient);
  }
  
  public function getId_article(): ?int {
    return $this->id_article;
  }
  
  public function setId_article($id_article): ?int {
    return $this->id_article = $id_article;
  }
  
  public function getContenu(): ?string {
    return $this->contenu;
  }
  public function setContenu(?string $contenu): void {
    $this->contenu = $contenu;
  }
  
  public function getDate_publication(): ?string {
    return $this->date_publication;
  }
  public function setDate_publication(?string $date_publication): void {
    $this->date_publication = $date_publication;
  }

}