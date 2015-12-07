<?php
/**
 * File CandyCanePlantTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Tests\Plant;

use PHPWeekly\Plant\CandyCanePlant;
use PHPWeekly\Plant\PlantInterface;

/**
 * Class CandyCanePlantTest
 *
 * @package PHPWeekly\Tests\Plant
 */
class CandyCanePlantTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $plant = new CandyCanePlant();

        $this->assertAttributeEquals(0, 'candyCanesPerWeek', $plant);
        $this->assertAttributeEquals(false, 'hasBred', $plant);
    }

    public function testConstructWithArgs()
    {
        $plant = new CandyCanePlant(5, true);

        $this->assertAttributeEquals(5, 'candyCanesPerWeek', $plant);
        $this->assertAttributeEquals(true, 'hasBred', $plant);
    }

    public function testImplementsInterface()
    {
        $plant = new CandyCanePlant();

        $this->assertInstanceOf(PlantInterface::class, $plant);
    }

    public function testGetYield()
    {
        $plant = new CandyCanePlant(7);

        $this->assertEquals(7, $plant->getYield());
    }

    public function testGetCandyCanesPerWeek()
    {
        $plant = new CandyCanePlant(7);

        $this->assertEquals(7, $plant->getCandyCanesPerWeek());
    }

    public function testSetCandyCanesPerWeek()
    {
        $plant = new CandyCanePlant();
        $plant->setCandyCanesPerWeek(7);

        $this->assertEquals(7, $plant->getCandyCanesPerWeek());
    }

    public function testHasBred()
    {
        $plant = new CandyCanePlant(3, true);

        $this->assertTrue($plant->hasBred());
    }

    public function testSetHasBred()
    {
        $plant = new CandyCanePlant(7);
        $plant->setHasBred(true);

        $this->assertTrue($plant->hasBred());
    }

    public function testToString()
    {
        $plant = new CandyCanePlant(5, true);

        $this->assertEquals('CandyCanePlant { CandyCanesPerWeek = 5, HasBred = true}', (string) $plant);
    }
}
