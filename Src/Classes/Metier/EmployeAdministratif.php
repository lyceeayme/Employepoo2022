<?php

namespace App\Classes\Metier;

final class EmployeAdministratif {

    private float $primeA;

    public function __construct(int $num, string $nom, string $prenom, \DateTime $dateN, float $salaire) {
        parent::__construct($num, $nom, $prenom, $$dateN, $salaire);
        $this->primeM = $this->setPrime(0);
    }

    public function setPrime($prime) {
        if($prime < 0){
            throw new Exception("La prime ne peut pas être négative");
        }
        elseif($prime > $this->salaireA/12){
            $prime = $this->salaireA/12;
        }
        $this->primeA = $prime;
    }

    public function getGainBrutAnnuel(): float {
        return $this->salaireA + $this->primeM;
    }

}
