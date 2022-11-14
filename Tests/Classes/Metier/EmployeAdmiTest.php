<?php

namespace Tests\Classes\Metier;

use PHPUnit\Framework\TestCase;
use App\Classes\Metier\Employe;

/**
 * Description of EmployeTest
 *
 * @author ayme.pignon
 */
final class EmployeAdmiTest extends TestCase {

    public function setUp(): void {
        $this->object = new EmployeAdministratif(1, "Employe Administratif 1", "Prénom 1", new DateTime('1990-12-25'), $this->salaireA, $this->primeOK);
    }

    /**
     * @covers App\Classes\Metier\EmployeAdministratif::getGainBrutAnnuel
     */
    public function testGetGainBrutAnnuel() {
        $this->object->setPrime(1500);
        $this->assertEquals(25500, $this->object->getGainBrutAnnuel());
    }

    /**
     * @covers App\Classes\Metier\EmployeAdministratif::getGainBrutAnnuel
     */
    public function testSetPrime() {
        $this->object->setPrime(1500);
        $this->assertEquals(1500, $this->object->getPrime());
    }

    /**
     * @covers App\Classes\Metier\EmployeAdministratif::getGainBrutAnnuel
     */
    public function testSetPrimeNon() {
        $this->object->setPrime(9999999);
        $this->assertEquals($this->primePlafond, $this->object->getPrime());
    }

    /**
     * @covers App\Classes\Metier\EmployeAdministratif::getGainBrutAnnuel
     */
    public function testSetPrimeNegatif() {
        $this->expectException(AppException::class);
        $this->object->setPrime(-1000);
    }

}
