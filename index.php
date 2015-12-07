<?php
/**
 * File index.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

require_once 'vendor/autoload.php';

use PHPWeekly\Collection\CandyCanePlantCollection;
use PHPWeekly\Service\CandyCanePlantBreederService;
use PHPWeekly\Plant\CandyCanePlant;

$breederService = new CandyCanePlantBreederService();
$plantCollection = new CandyCanePlantCollection([
    new CandyCanePlant(3),
    new CandyCanePlant(2),
    new CandyCanePlant(5),
]);

while ($couple = $plantCollection->getTopCouple()) {
    $offspring = $breederService->breed($couple->getFather(), $couple->getMother());

    $plantCollection->push($offspring);
}

$yield = $plantCollection->reduce(function($result, CandyCanePlant $plant) {
    return $result + $plant->getYield();
});

echo $yield . PHP_EOL;
