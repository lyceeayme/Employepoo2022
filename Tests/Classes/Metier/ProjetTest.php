<?php

namespace Tests\Classes\Metier;
use PHPUnit\Framework\TestCase;
use App\Classes\Metier\Projet;

/**
 * Description of ProjetTest
 *
 * @author ayme.pignon
 */
final class ProjetTest extends TestCase{
    
    private $object;
    
    public function setUp(): void {
        $dateAfter = new \DateTime('+10 days');
        $this->object = new Projet(1, "Vente", $dateAfter, 12);
    }
    
    /**
     * @covers App\Classes\Metier\Projet::getId
     */
    public function testGetID() {
        $this->assertSame(1, $this->object->getId());
    }
    
    /**
     * @covers App\Classes\Metier\Projet::getDateFinProjet
     */
    public function testGetDateFin(){
        $date = new \DateTime('+22 days');
        $this->assertSame($date,$this->object->getDateFinProjet());
    }
    
    /**
     * @covers App\Classes\Metier\Projet::getNom
     */
    public function testGetNom(){
        $this->assertSame("Vente", $this->object->getNom());
    }
    
    /**
     * @covers App\Classes\Metier\Projet::getDureePrevue
     */
    public function testGetDureePrevue(){
        $this->assertSame(12, $this->object->getDureePrevue());
    }
}
