<?php
/**
 * File CandyCanePlantCollection.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Collection;

use Epfremme\Collection\Collection;
use PHPWeekly\Plant\CandyCanePlant;
use PHPWeekly\Plant\PlantCouple;
use PHPWeekly\Service\CandyCanePlantBreederService;

/**
 * Class CandyCanePlantCollection
 *
 * @package PHPWeekly\Collection
 */
class CandyCanePlantCollection extends Collection
{
    /**
     * @var CandyCanePlantBreederService
     */
    private $breederService;

    /**
     * @var array|PlantCouple[]
     */
    private $yields = [];

    /**
     * CandyCanePlantCollection constructor
     *
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->breederService = new CandyCanePlantBreederService();

        parent::__construct($elements);
    }

    /**
     * Return the top plant couple
     *
     * @return PlantCouple
     */
    public function getTopCouple()
    {
        $this->calculateBreedYields();

        return array_shift($this->yields);
    }

    /**
     * Calculate all possible plant yields for current
     * un-bred candy cane plants
     *
     * @return $this
     */
    private function calculateBreedYields()
    {
        $this->yields = [];

        $this->each(function(CandyCanePlant $plantA) {
            if ($plantA->hasBred()) return;

            $this->each(function(CandyCanePlant $plantB) use ($plantA) {
                if ($plantA === $plantB || $plantB->hasBred()) return;

                $yieldA = $this->breederService->calculateYield($plantA, $plantB);
                $yieldB = $this->breederService->calculateYield($plantB, $plantA);

                $this->yields[$yieldA] = new PlantCouple($plantA, $plantB);
                $this->yields[$yieldB] = new PlantCouple($plantB, $plantA);
            });
        });

        krsort($this->yields);

        return $this;
    }
}
