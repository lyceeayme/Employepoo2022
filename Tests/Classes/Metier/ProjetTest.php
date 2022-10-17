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
        $dateAfter = new DateTime('+10 days');
        $this->object = new Projet(1, "Nom du Projet", $dateAfter, 12);
    }
    
    /**
     * @covers App\classes\metier\Projet::getId
     */
    public function testGetID() {
        $this->assertSame(1, $this->object->getId());
    }
}
