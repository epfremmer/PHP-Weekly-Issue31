<?php
/**
 * File CandyCanePlantCollectionTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Tests\Collection;

use PHPWeekly\Collection\CandyCanePlantCollection;
use PHPWeekly\Plant\CandyCanePlant;
use PHPWeekly\Plant\PlantCouple;

/**
 * Class CandyCanePlantCollectionTest
 *
 * @package PHPWeekly\Tests\Collection
 */
class CandyCanePlantCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $collection = new CandyCanePlantCollection([
            new CandyCanePlant(1),
            new CandyCanePlant(2),
            new CandyCanePlant(3),
        ]);

        $this->assertContainsOnlyInstancesOf(CandyCanePlant::class, $collection->toArray());
    }

    public function testGetTopCouple()
    {
        $collection = new CandyCanePlantCollection([
            new CandyCanePlant(1),
            new CandyCanePlant(3),
            new CandyCanePlant(2),
        ]);

        $couple = $collection->getTopCouple();

        $this->assertInstanceOf(PlantCouple::class, $couple);
        $this->assertAttributeContainsOnly(PlantCouple::class, 'yields', $collection);
        $this->assertInstanceOf(CandyCanePlant::class, $couple->getFather());
        $this->assertInstanceOf(CandyCanePlant::class, $couple->getMother());
        $this->assertEquals(3, $couple->getFather()->getYield());
        $this->assertEquals(2, $couple->getMother()->getYield());
    }
}
