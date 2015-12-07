# Challenge 028: Oxford Commas

## Challenge

Last year, [INSERT_HOLIDAY_MYTH_HERE] (hereafter referred to as “Santa”) created a special GMO: the Candy Cane Plant.
However, after creating the plant Santa and his biologist friends found out that it suffered from an extreme 
deficiency: each plant could only breed once. Each candy cane plant has the following properties and methods:

    class CandyCanePlant
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
    }
    
    interface BreederServiceInterface
    {
      /**
       * Breed two candy cane plants
       *
       * @returns CandyCanePlant Child plant object
       */
      public function breed(CandyCanePlant $father, CandyCanePlant $mother);
    }

A newly bred candy cane plant has a production value of:

    (fathersProductionValue ** mothersProductionValue) mod (fathersProductionValue + mothersProductionValue)

and has a `HasBred` value of false.

Write code that optimizes the total number of candy canes produced per week given an initial stock of `CandyCanePlant[]` 
plants, producing a new collection of `CandyCanePlant[]s`. The output of your code should also produce the total number 
of candy canes produced per week with the bred stock.

For example, given the following initial stock:

    CandyCanePlant { CandyCanesPerWeek = 5}
    CandyCanePlant { CandyCanesPerWeek = 3}
    CandyCanePlant { CandyCanesPerWeek = 2}

Your code should inform Santa what his final stock will be, as well as the total production value of said stock. The 
above example should produce a total production output of

    CandyCanePlant { CandyCanesPerWeek = 5, HasBred = true}
    CandyCanePlant { CandyCanesPerWeek = 5, HasBred = true}
    CandyCanePlant { CandyCanesPerWeek = 4, HasBred = false}
    CandyCanePlant { CandyCanesPerWeek = 3, HasBred = true}
    CandyCanePlant { CandyCanesPerWeek = 2, HasBred = true}

and a production value of 19 per week.

Code will be judged based on a large input stock of Candy Cane Plants.

## Installation

1. `composer install`

## Useage

1. Run `php index.php`
