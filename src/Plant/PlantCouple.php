<?php
/**
 * File PlantCouple.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Plant;

/**
 * Class PlantCouple
 *
 * @package PHPWeekly\Plant
 */
class PlantCouple
{
    /**
     * @var CandyCanePlant
     */
    private $father;

    /**
     * @var CandyCanePlant
     */
    private $mother;

    /**
     * PlantCouple constructor
     *
     * @param PlantInterface $father
     * @param PlantInterface $mother
     */
    public function __construct(PlantInterface $father, PlantInterface $mother)
    {
        $this->father = $father;
        $this->mother = $mother;
    }

    /**
     * Test if either plant has bred
     *
     * @return bool
     */
    public function isBreedable()
    {
        return !$this->father->hasBred() && !$this->mother->hasBred();
    }

    /**
     * Return father
     *
     * @return CandyCanePlant
     */
    public function getFather()
    {
        return $this->father;
    }

    /**
     * Return mother
     *
     * @return CandyCanePlant
     */
    public function getMother()
    {
        return $this->mother;
    }
}
