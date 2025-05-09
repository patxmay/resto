<?php

class Restaurant {
    private $id;
    private $nom;
    private $adresse;
    private $typeCuisine;
    private $photos = [];
    private $critiques = [];

    public function __construct($id, $nom, $adresse, $typeCuisine) {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->typeCuisine = $typeCuisine;
    }

    public function ajouterPhoto($photo, $description) {
        $this->photos[] = ['photo' => $photo, 'description' => $description];
    }

    public function ajouterCritique($critique) {
        $this->critiques[] = $critique;
    }

    public function rechercher($critere) {
        // Recherche par critères (nom, adresse, type de cuisine)
    }

    public function getDetails() {
        return [
            'nom' => $this->nom,
            'adresse' => $this->adresse,
            'typeCuisine' => $this->typeCuisine,
            'photos' => $this->photos,
            'critiques' => $this->critiques
        ];
    }
}