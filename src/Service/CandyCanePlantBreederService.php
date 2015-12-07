<?php
/**
 * File CandyCanePlantBreederService.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Service;

use PHPWeekly\Plant\CandyCanePlant;
use PHPWeekly\Plant\PlantInterface;

/**
 * Class CandyCanePlantBreederService
 *
 * @package PHPWeekly\Service
 */
class CandyCanePlantBreederService implements BreederServiceInterface
{
    /**
     * (fathersProductionValue ** mothersProductionValue) mod (fathersProductionValue + mothersProductionValue)
     *
     * {@inheritdoc}
     *
     * @param CandyCanePlant $father
     * @param CandyCanePlant $mother
     */
    public function breed(PlantInterface $father, PlantInterface $mother)
    {
        $this->assertValidArguments($father, $mother);

        $productionValue = $this->calculateYield($father, $mother);

        $father->setHasBred(true);
        $mother->setHasBred(true);

        return new CandyCanePlant($productionValue);
    }

    /**
     * @param CandyCanePlant $father
     * @param CandyCanePlant $mother
     * @return int
     */
    public function calculateYield(CandyCanePlant $father, CandyCanePlant $mother)
    {
        return $father->getYield() ** $mother->getYield() % ($father->getYield() + $mother->getYield());
    }

    /**
     * @param CandyCanePlant $father
     * @param CandyCanePlant $mother
     */
    private function assertValidArguments(CandyCanePlant $father, CandyCanePlant $mother)
    {
        if ($father->hasBred() || $mother->hasBred()) {
            throw new \InvalidArgumentException('You can only breed CandyCane plants one time!');
        }
    }
}
