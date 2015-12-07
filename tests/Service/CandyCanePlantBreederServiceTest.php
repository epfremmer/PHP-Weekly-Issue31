<?php
/**
 * File CandyCanePlantBreederServiceTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Tests\Service;

use PHPWeekly\Plant\CandyCanePlant;
use PHPWeekly\Service\BreederServiceInterface;
use PHPWeekly\Service\CandyCanePlantBreederService;

/**
 * Class CandyCanePlantBreederServiceTest
 *
 * @package PHPWeekly\Tests\Service
 */
class CandyCanePlantBreederServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CandyCanePlantBreederService
     */
    private $breederService;

    /**
     * {@inheritdoc}
     */
    public function setup()
    {
        $this->breederService = new CandyCanePlantBreederService();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(BreederServiceInterface::class, $this->breederService);
    }

    public function testBreed()
    {
        $father = new CandyCanePlant(5);
        $mother = new CandyCanePlant(3);

        $offspring = $this->breederService->breed($father, $mother);

        $this->assertInstanceOf(CandyCanePlant::class, $offspring);
        $this->assertEquals(5**3 % (5+3), $offspring->getYield());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBreedException()
    {
        $father = new CandyCanePlant(5, true);
        $mother = new CandyCanePlant(3);

        $this->breederService->breed($father, $mother);
    }

    public function testCalculateYield()
    {
        $father = new CandyCanePlant(5);
        $mother = new CandyCanePlant(3);

        $this->assertEquals(5**3 % (5+3), $this->breederService->calculateYield($father, $mother));
    }
}
