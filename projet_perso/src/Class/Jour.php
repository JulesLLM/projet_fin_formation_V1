<?php

namespace App\Class;

// On définit la classe Jour qui représente une journée avec sa date et les créneaux horaires disponibles
class Jour {
    private $date; // La date du jour
    private $creneaux; // Les créneaux horaires disponibles
    private $nom_jour;
    private $nom_mois;

    public function __construct($date, $creneaux, $nom_jour, $nom_mois) {
        $this->date = $date;
        $this->creneaux = $creneaux;
        $this->nom_jour = $nom_jour;
        $this->nom_mois = $nom_mois;
    }

    public function getDate() {
        return $this->date; // Méthode qui renvoie la date du jour
    }
    
    public function getDateString() {
        return $this->nom_jour." ".$this->date->format('j')." ".$this->nom_mois;//méthode pour mettre en français
    }

    public function getCreneaux() {
        return $this->creneaux; // Méthode qui renvoie les créneaux horaires disponibles pour le jour
    }
}