<?php
/**
 * File PlantInterface.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Plant;

/**
 * Interface PlantInterface
 *
 * @package PHPWeekly\Plant
 */
interface PlantInterface
{
    /**
     * Test if this plant has been bred
     *
     * @return bool
     */
    public function hasBred();

    /**
     * Return plant yield
     *
     * @return int
     */
    public function getYield();
}
