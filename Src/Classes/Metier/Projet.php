<?php

namespace App\Classes\Metier;

/**
 * Description of Projet
 *
 * @author ayme.pignon
 */
class Projet {
    private int $id;
    private string $nom;
    private \DateTime $dateDebut;
    private int $dureePrevue;
    
    /**
     * 
     * @param int $id
     * @param string $nom
     * @param \DateTime $dateDebut
     * @param int $duree
     * @throws Exception
     */
    function __construct(int $id, string $nom, DateTime $dateDebut, int $duree) {
        if (!$duree>0){
            throw new Exception("La durée prévue doit être supérieur à 0");
        }
        else if ($dateDebut < new DateTime('+2 days')){
            throw new Exception("L'heure de début ne peut pas être antérieur à la date d'aujourd'hui");        
        }
        $this->id = $id;
        $this->nom = $nom;
        $this->dateDebut = $dateDebut;
        $this->dureePrevue = $duree;
    }
    
    /**
     * 
     * @param int $nbr
     * @throws AppException
     */
    public function set_dureePrevue (int $nbr){
        if (!$nbr > 0){
            throw new AppException("La durée ne peut pas être modifié par un nombre inférieur à 0");
        }
    }
    
    /**
     * 
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }
    
    /**
     * 
     * @return string
     */
    public function getNom(): string {
        return $this->nom;
    }
    
    /**
     * 
     * @return DateTime
     */
    public function getDateDebut(): DateTime {
        return $this->dateDebut;
    }
    
    /**
     * 
     * @return int
     */
    public function getDureePrevue(): int {
        return $this->dureePrevue;
    }
    
}
