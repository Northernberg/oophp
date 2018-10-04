<?php
namespace Guno\Dice100;

/**
 * Dice class
 */
class Dice
{
    /**
    * @var integer $sides     The number of sides in dice
    * @var integer $lastRoll     The last roll of dice
    * @var integer $number     The current number of dice
    */
    protected $sides;
    protected $lastRoll;


    /**
    *
    *  Constructor to initiate dice
    */
    public function __construct(int $sides = 6)
    {
        $this->sides = $sides;
    }

    /**
    * Print out the dice number
    * @return integer as dice number
    */

    public function roll()
    {
        $newNumber = rand(1, $this->sides);
        $this->lastRoll = $newNumber;
        return $this->lastRoll;
    }
}
