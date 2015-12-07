<?php
/**
 * File BreederServiceInterface.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Service;

use PHPWeekly\Plant\PlantInterface;

/**
 * Interface BreederServiceInterface
 *
 * @package PHPWeekly\Service
 */
interface BreederServiceInterface
{
    /**
     * Breed two candy cane plants
     *
     * @param PlantInterface $father
     * @param PlantInterface $mother
     * @return PlantInterface Child plant object
     */
    public function breed(PlantInterface $father, PlantInterface $mother);
}
