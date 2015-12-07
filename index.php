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
    new CandyCanePlant(5),
    new CandyCanePlant(3),
    new CandyCanePlant(2),
]);

/*
 * To convert this to be able to calculate yield loss due to time this would
 * need to be called recursively. Each iteration representing 1 weeks time.
 *
 * Plant offspring would be pushed to a separate collection, each previous generation
 * plant's yield would be decremented by one with each iteration before mergine the
 * two collections back together for the next iteration.
 */
while ($couple = $plantCollection->getTopCouple()) {
    $offspring = $breederService->breed($couple->getFather(), $couple->getMother());

    $plantCollection->push($offspring);
}

// calculate total yield
$yield = $plantCollection->reduce(function($result, CandyCanePlant $plant) {
    return $result + $plant->getYield();
});

// print results
$plantCollection->each(function(CandyCanePlant $plant) {
    echo $plant . PHP_EOL;
});

echo sprintf('Total Yield: %s', $yield) . PHP_EOL;
