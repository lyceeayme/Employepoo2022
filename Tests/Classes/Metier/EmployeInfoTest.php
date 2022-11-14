<?php

namespace Tests\Classes\Metier;

use PHPUnit\Framework\TestCase;
use App\Classes\Metier\EmployeInformaticien;
use App\Classes\Metier\Employe;
use App\Exceptions\AppException;

class EmployeInformaticienTest extends TestCase {
    /**
     * Fonction appeler avant les tests
     */
    public function setUp(): void {
        $this->projet = new Projet(1, "Nom du Projet", new DateTime('+10 days'), 120);
        $this->object = new EmployeInformaticien(1, "Employe Administratif 1", "Prénom 1", new DateTime('1990-12-25'), $this->salaireA, $this->projet, new DateTime('+12 days'));
    }
    
    
    /**
     * @covers Employe::::getGainBrutAnnuel
     * @covers Employe::setPrime
     * @covers Employe::__construct
     */
    public function testGetGainBrutAnnuel() {
        $this->object->setPrime(120);
        $this->assertEquals(25800, $this->object->getGainBrutAnnuel());
    }
    
    /**
     * @covers Employe::setPrime
     */
    public function testSetSurPrime() {
        $this->expectException(AppException::class);
        $this->object->setPrime(999999);
    }
    
    /**
     * @covers Employe::setPrime
     */
    public function testSetPrimeNegatif() {
        $this->expectException(AppException::class);
        $this->object->setPrime(-56);
    }
    
    /**
     * @covers Employe::setPrime
     */
    public function testGetPrimeOui() {
        $this->object->setPrime(100);
        $this->assertEquals(100, $this->object->getPrime());
    }
    
    /**
     * @covers Employe::setProjet
     */
    public function testAffecterProjet() {
        $nouveauProjet = new Projet(1, "Projet Alpha", new DateTime('+9 days'), 50);
        $this->object->affecterProjet($nouveauProjet, new Datetime('+12 days'));
        $this->assertSame($nouveauProjet, $this->object->getProjet());
    }
    
    /**
     * @covers Employe::setProjet
     */
    public function testAffecterProjetEarly() {
        $nouveauProjet = new Projet(2, "Projet Tot", new DateTime('+50 days'), 50);
        $this->object->affecterProjet($nouveauProjet, new Datetime('+12 days'));
        $this->assertSame($nouveauProjet, $this->object->getProjet());
    }
    
    /**
     * @covers Employe::setProjet
     */
    public function testAffecterProjetLate() {
        $nouveauProjet = new Projet(3, "Projet tard", new DateTime('+1 days'), 50);
        $this->expectException(AppException::class, "L'affectation ne peut pas être faites après la date de fin du projet");
        $this->object->affecterProjet($nouveauProjet, new Datetime('+99 days'));
    }
}
