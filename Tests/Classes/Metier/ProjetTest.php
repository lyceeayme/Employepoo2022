<?php

namespace Tests\Classes\Metier;

use PHPUnit\Framework\TestCase;
use App\Classes\Metier\Projet;
use App\Exceptions\AppException;

/**
 * Description of ProjetTest
 *
 * @author ayme.pignon
 */
final class ProjetTest extends TestCase {

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
    public function testGetDateFin() {
        $date = new \DateTime('+22 days');
        $this->assertSame($date, $this->object->getDateFinProjet());
    }

    /**
     * @covers App\Classes\Metier\Projet::getNom
     */
    public function testGetNom() {
        $this->assertSame("Vente", $this->object->getNom());
    }

    /**
     * @covers App\classes\metier\Projet::getDateDebut
     * 
     */
    public function testGetDateDebut() {
        $p = new Projet(1, "Nom du Projet", new DateTime(), 12);
        $this->assertEquals(time(), $p->getDateDebut()->getTimestamp());
    }

    /**
     * @covers App\classes\metier\Projet::setDateDebut().
     * 
     */
    public function testSetDateDebutException() {
        $Pp = new Projet(1, "Nom du Projet", new DateTime('1999-11-15'), 12);
        $this->assertInstanceOf(Projet::class, $Pp);
    }

    /**
     * @covers App\classes\metier\Projet::setDateDebut().
     * @dataProvider datesDebutOKProvider
     * 
     */
    public function testSetDateDebutOK(DateTime $dateDebut): void {
        $p = new Projet(1, "Nom du Projet", $dateDebut, 12);

        $this->assertGreaterThanOrEqual((new DateTime())->format('Y-m-d'), $p->getDateDebut()->format('Y-m-d'));
    }

    /**
     * @covers App\classes\metier\Projet::setDureePrevue
     * @todo   Implement testSetDureePrevue().
     */
    public function testGetDureePrevue() {
        $this->assertEquals(12, $this->object->getDureePrevue());
    }

    /**
     * @covers App\classes\metier\Projet::getDateFinProjet()
     * @todo   Implement testSetDureePrevue().
     */
    public function testGetDateFinProjet() {
        $this->assertSame(date_add(new dateTime(), date_interval_create_from_date_string("21 days"))->format("Y-m-d H:i:s"), $this->object->getDateFinProjet());
    }

}
