<?php
/**
 * File CandyCanePlant.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Plant;

/**
 * Class CandyCanePlant
 *
 * @package PHPWeekly\Plant
 */
class CandyCanePlant implements PlantInterface
{
    /**
     * Candy Canes produced per week
     *
     * @var int
     */
    private $candyCanesPerWeek;

    /**
     * Whether or not this plant has bred
     *
     * @var bool
     */
    private $hasBred = false;

    /**
     * CandyCanePlant constructor
     *
     * @param int $candyCanesPerWeek
     * @param bool $hasBred
     */
    public function __construct($candyCanesPerWeek = 0, $hasBred = false)
    {
        $this->candyCanesPerWeek = (int) $candyCanesPerWeek;
        $this->hasBred = (bool) $hasBred;
    }

    /**
     * {@inheritdoc}
     */
    public function getYield()
    {
        return $this->getCandyCanesPerWeek();
    }

    /**
     * Return plant yield
     *
     * @return int
     */
    public function getCandyCanesPerWeek()
    {
        return $this->candyCanesPerWeek;
    }

    /**
     * Set plant yield
     *
     * @param int $candyCanesPerWeek
     * @return CandyCanePlant
     */
    public function setCandyCanesPerWeek($candyCanesPerWeek)
    {
        $this->candyCanesPerWeek = (int) $candyCanesPerWeek;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasBred()
    {
        return $this->hasBred;
    }

    /**
     * Set has bred flag
     *
     * @param boolean $hasBred
     * @return CandyCanePlant
     */
    public function setHasBred($hasBred)
    {
        $this->hasBred = (bool) $hasBred;

        return $this;
    }
}
