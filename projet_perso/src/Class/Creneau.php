<?php

namespace App\Class;


// On définit la classe Creneau qui permet de représenter un créneau horaire avec son heure de début, son heure de fin et sa disponibilité
class Creneau {
    private $heure_debut; // L'heure de début du créneau
    private $heure_fin; // L'heure de fin du créneau
    private $disponible; // La disponibilité du créneau

    public function __construct($heure_debut, $heure_fin, $disponible) {
        $this->heure_debut = $heure_debut;
        $this->heure_fin = $heure_fin;
        $this->disponible = $disponible;
    }

    public function estDisponible() {
        return $this->disponible; // Méthode qui renvoie la disponibilité du créneau
    }

    public function getHeureDebut() {
        return $this->heure_debut; // Méthode qui renvoie l'heure de début du créneau
    }

    public function getHeureFin() {
        return $this->heure_fin; // Méthode qui renvoie l'heure de fin du créneau
    }
}