<?php

class Utilisateur {
    private $id;
    private $nomUtilisateur;
    private $motDePasse;
    private $adressePostale;
    private $telephone;
    private $preferences = [];
    private $restaurantsAimes = [];
    private $critiques = [];

    public function __construct($id, $nomUtilisateur, $motDePasse) {
        $this->id = $id;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->motDePasse = password_hash($motDePasse, PASSWORD_BCRYPT);
    }

    public function mettreAJourProfil($adressePostale, $telephone) {
        $this->adressePostale = $adressePostale;
        $this->telephone = $telephone;
    }

    public function ajouterPreference($preference) {
        $this->preferences[] = $preference;
    }

    public function aimerRestaurant($restaurant) {
        $this->restaurantsAimes[] = $restaurant;
    }

    public function ajouterCritique($critique) {
        $this->critiques[] = $critique;
    }

    public function getProfil() {
        return [
            'nomUtilisateur' => $this->nomUtilisateur,
            'adressePostale' => $this->adressePostale,
            'telephone' => $this->telephone,
            'preferences' => $this->preferences,
            'restaurantsAimes' => $this->restaurantsAimes,
            'critiques' => $this->critiques
        ];
    }
}