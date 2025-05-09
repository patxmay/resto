<?php

class Moderateur {
    private $id;
    private $nomUtilisateur;
    private $motDePasse;

    public function __construct($id, $nomUtilisateur, $motDePasse) {
        $this->id = $id;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->motDePasse = password_hash($motDePasse, PASSWORD_BCRYPT);
    }

    public function listerCritiquesNonModerees($critiques) {
        return array_filter($critiques, function($critique) {
            return $critique->getEtat() === 'Non modéré';
        });
    }

    public function validerCritique($critique) {
        $critique->valider();
    }

    public function invaliderCritique($critique) {
        $critique->invalider();
    }
}