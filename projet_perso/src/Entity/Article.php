<?php
namespace App\Entity;

use App\Manager\PraticienManager;

class Article {

//certains attributs peuvent ne pas être initialisés. On les spécifies optionnels avec le caractère ?
  private ?int $id;
  private ?int $id_praticien;
  private ?string $titre;
  private ?string $image;
  private ?string $resume;
  private ?string $contenu;
  private ?string $date_publication;

// getters = accesseurs et setters = mutateurs 
  public function getId(): ?int {
    return $this->id;
  }
  
  public function getId_praticien(): ?int {
    return $this->id_praticien;
  }
  
  public function getPraticien() {
    $praticienMgr = new PraticienManager();
    return $praticienMgr->loadFromId($this->id_praticien);
  }
  
  public function setIdPraticien($id_praticien): void {
    $this->id_praticien = $id_praticien;
  }

  public function getTitre(): ?string {
    return $this->titre;
  }
  public function setTitre(?string $titre): void {
    $this->titre = $titre;
  }

  public function getContenu(): ?string {
    return $this->contenu;
  }
  public function setContenu(?string $contenu): void {
    $this->contenu = $contenu;
  }
  
  public function getResume(): ?string {
    return $this->resume;
  }
  
  public function setResume(?string $resume): void {
    $this->resume = $resume;
  }
  
  public function getImage(): ?string {
    return $this->image;
  }
  
  public function setImage(?string $image): void {
    $this->image = $image;
  }
  
  public function getDate_publication(): ?string {
    return $this->date_publication;
  }
  public function setDate_publication(?string $date_publication): void {
    $this->date_publication = $date_publication;
  }
}