<?php

    namespace App\Class;

    use App\Class\Jour;
    use App\Class\Creneau;
    use App\Manager\RdvRecupManager;

class Agenda {
    private $mois;
    private $annee;
    private $jours;
    const NOM_JOURS = "";

    // Le constructeur de la classe Agenda
    public function __construct($mois, $annee) {
        $this->mois = $mois;
        $this->annee = $annee;
        $this->jours = $this->genererJours(); // On génère les jours de l'agenda
    }

    // Une méthode privée qui génère les jours de l'agenda
    private function genererJours() {
        define('NOM_JOURS', ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']); // On définit les noms des jours de la semaine
        define('NOM_MOIS', ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']); // On définit les noms des mois
        $today = new \DateTime;
        $nb_jours = cal_days_in_month(CAL_GREGORIAN, $this->mois, $this->annee); // On récupère le nombre de jours dans le mois et l'année donnés
        $jours = array();
        for ($jour = 1; $jour <= $nb_jours; $jour++) {
            $date = new \DateTime("$this->annee-$this->mois-$jour"); // On crée un objet DateTime pour la date actuelle
            $creneaux = $this->genererCreneaux(); // On génère les créneaux horaires pour la date actuelle
            $nom_jour = NOM_JOURS[$date->format('N') - 1]; // On récupère le nom du jour de la semaine pour la date actuelle
            $nom_mois = NOM_MOIS[$date->format('n') - 1]; // On récupère le nom du jour de la semaine pour la date actuelle
            $jours[] = new Jour($date, $creneaux, $nom_jour, $nom_mois); // On crée un nouvel objet Jour pour la date actuelle et on l'ajoute à l'array $jours
        }
        return $jours;
    }

    // Une méthode privée qui génère les créneaux horaires pour une journée donnée
    private function genererCreneaux() {
        $creneaux = array();

        for ($heure = 8; $heure <= 19; $heure++) {
            $creneau = new Creneau("$heure:00", "$heure:59", true); // On crée un nouvel objet Creneau pour chaque heure entre 8h et 19h
            $creneaux[] = $creneau; // On ajoute le créneau à l'array $creneaux
        }
        return $creneaux;
    }

    // Les méthodes getteurs pour les propriétés de la classe
    public function getMois() {
        return $this->mois;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function getJours() {
        return $this->jours;
    }
    
    // COMPARER ENTRES LES CRENEAUX 
    
    public function genererCreneauxHorairesDisponibles() {
      // Récupérer les heures d'ouverture et de fermeture de l'agenda
      $heureOuverture = new \DateTime($this->heureOuverture);
      $heureFermeture = new \DateTime($this->heureFermeture);
    
      // Initialiser la liste des créneaux horaires disponibles
      $creneauxDisponibles = array();
    
      // Boucler sur chaque jour de la semaine
      foreach($this->joursSemaine as $jour) {
        // Récupérer la date correspondante au jour de la semaine
        $date = new \DateTime();
        $date->setISODate(date('Y'), $this->numeroSemaine, $jour);
    
        // Boucler sur chaque heure de début de créneau horaire
        $heureDebut = clone $heureOuverture;
        while($heureDebut < $heureFermeture) {
          // Ajouter un créneau horaire à la liste des créneaux horaires disponibles
          $creneauxDisponibles[] = array(
            'date' => $date->format('Y-m-d'),
            'heureDebut' => $heureDebut->format('H:i:s'),
            'heureFin' => $heureDebut->modify('+1 hour')->format('H:i:s')
          );
        }
      }
    
      // Retourner la liste des créneaux horaires disponibles
      return $creneauxDisponibles;
    }

    public function remplirCreneauxHorairesUtilises() {
        $rendezVous = $this->recupererRendezVous();
        $creneauxDisponibles = $this->genererCreneauxHorairesDisponibles();
        foreach($rendezVous as $rdv) {
          $index = array_search($rdv['datetimes'], array_column($creneauxDisponibles, 'date'));
          if($index !== false) {
            $heureDebutRdv = new \DateTime($rdv['datetimes']);
            $heureFinRdv = clone $heureDebutRdv;
            $heureFinRdv->modify('+' . $rdv['duree'] . ' seconds');
            foreach($creneauxDisponibles as $key => $creneau) {
              $heureDebutCreneau = new \DateTime($creneau['date'] . ' ' . $creneau['heureDebut']);
              $heureFinCreneau = new \DateTime($creneau['date'] . ' ' . $creneau['heureFin']);
              if($heureDebutRdv >= $heureDebutCreneau && $heureFinRdv <= $heureFinCreneau) {
                array_splice($creneauxDisponibles, $key, 1);
              }
            }
          }
        }
    }

}