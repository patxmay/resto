<?php

class Critique {
    private $id;
    private $contenu;
    private $note;
    private $etat; // Non modéré, Validé, Invalide
    private $auteur;
    private $restaurant;

    public function __construct($id, $contenu, $note, $auteur, $restaurant) {
        $this->id = $id;
        $this->contenu = $contenu;
        $this->note = $note;
        $this->etat = 'Non modéré';
        $this->auteur = $auteur;
        $this->restaurant = $restaurant;
    }

    public function modifier($nouveauContenu, $nouvelleNote) {
        if ($this->etat !== 'Validé') {
            $this->contenu = $nouveauContenu;
            $this->note = $nouvelleNote;
        }
    }

    public function valider() {
        $this->etat = 'Validé';
    }

    public function invalider() {
        $this->etat = 'Invalide';
    }

    public function getDetails() {
        return [
            'contenu' => $this->contenu,
            'note' => $this->note,
            'etat' => $this->etat,
            'auteur' => $this->auteur,
            'restaurant' => $this->restaurant
        ];
    }
}