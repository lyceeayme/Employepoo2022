<?php

namespace App\Classes\Metier;

final class EmployeInformaticien {

    private float $primeM;
    private Projet $projet;

    public function __construct(int $num, string $nom, string $prenom, \DateTime $dateN, float $salaire) {
        parent::__construct($num, $nom, $prenom, $$dateN, $salaire);
        $this->primeM = $this->setPrime(0);
    }

    public function setPrime(float $prime) {
        if ($prime < 0) {
            throw new Exception("La prime ne peut pas être négative");
        } elseif ($prime > $this->salaireA * 0.30) {
            throw new Exception("Le montant de la prime ne peut pas excéder 30% du salaire initial");
        } else {
            $this->primeM = $prime;
        }
    }

    public function getGainBrutAnnuel(): float {
        return $this->salaireA + $this->primeM;
    }

}
