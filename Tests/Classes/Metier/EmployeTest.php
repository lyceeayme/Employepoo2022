<?php
namespace Tests\Classes\Metier;
use PHPUnit\Framework\TestCase;
/**
 * Description of EmployeTest
 *
 * @author ayme.pignon
 */
final class EmployeTest extends TestCase {    
    /**
     * @dataProvider fournisseurDonneesTestSomme
     */
    public function testSomme(int $attendu, int $b, int $a){
        $this->assertSame($attendu, $a+$b);
    }
    
    /**
     * Méthode fournisseuse de données
     * @return Array
     */
    public function fournisseurDonneesTestSomme(): array{
        return [[0, 0, 0],[1, 1, 3],[1, 0, 1],[3, 1, 1]];
    }
}
