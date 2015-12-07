<?php
/**
 * File PlantCoupleTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Tests\Plant;

use PHPWeekly\Plant\CandyCanePlant;
use PHPWeekly\Plant\PlantCouple;
use PHPWeekly\Plant\PlantInterface;

/**
 * Class PlantCoupleTest
 *
 * @package PHPWeekly\Tests\Plant
 */
class PlantCoupleTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $couple = new PlantCouple(
            $father = new CandyCanePlant(3),
            $mother = new CandyCanePlant(4)
        );

        $this->assertAttributeInstanceOf(PlantInterface::class, 'father', $couple);
        $this->assertAttributeInstanceOf(PlantInterface::class, 'mother', $couple);
        $this->assertAttributeSame($father, 'father', $couple);
        $this->assertAttributeSame($mother, 'mother', $couple);
    }

    public function testIsBreedable()
    {
        $couple = new PlantCouple(
            $father = new CandyCanePlant(3),
            $mother = new CandyCanePlant(4)
        );

        $this->assertTrue($couple->isBreedable());

        $mother->setHasBred(true);
        $this->assertFalse($couple->isBreedable());

        $father->setHasBred(true);
        $this->assertFalse($couple->isBreedable());

        $mother->setHasBred(false);
        $this->assertFalse($couple->isBreedable());
    }
}
