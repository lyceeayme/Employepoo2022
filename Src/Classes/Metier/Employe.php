<?php

namespace App\Classes\Metier;

/**
 * Description of Employe
 *
 * @author ayme.pignon
 */
abstract class Employe {

    protected int $numero;
    protected string $nom;
    protected string $prenom;
    protected \DateTime $dateNaissance;
    protected float $salaireA;

    /**
     * Constructeur
     * @param int $num
     * @param string $nom
     * @param string $prenom
     * @param \DateTime $dateN
     * @param float $salaire
     */
    public function __construct(int $num, string $nom, string $prenom, \DateTime $dateN, float $salaire): void {
        $this->numero = $num;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateN;
        $this->salaireA = $salaire;
    }

    /**
     * Getter salaire annuel
     * @return float
     */
    public function getSalaireAnnuel(): float {
        return $this->salaireA;
    }

    public abstract function setPrime(float $prime): void;

    public abstract function getGainBrutAnnuel(): float;
}
