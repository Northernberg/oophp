<?php
namespace Guno\Dice100;

/**
 * DiceHand class
 */

class DiceHand
{
    /**
    * @var Dice $dices Array of dices
    * @var integer $values Array of values
    */
    private $dices;
    private $values;

    /**
    * Constructor to initiate the dicehand with a number of dices.
    *
    * @param int $dices Number of dices to create, defaults to five.
    */

    public function __construct(int $dices = 5)
    {
        $this->dices  = [];
        $this->values = [];

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[]  = new Dice();
            $this->values[] = null;
        }
    }

    /**
    * Roll all dices and save their values
    * @return void
    */

    public function roll()
    {
        for ($i = 0; $i < count($this->dices); $i++) {
            $this->values[$i] = $this->dices[$i]->roll();
        }
    }

    /**
    * Get values of dices from last roll.
    *
    * @return array with values of the last roll.
    */
    public function values()
    {
        return $this->values;
    }

    /**
    * Get the sum of all dices.
    *
    * @return int as the sum of all dices.
    */
    public function sum()
    {
        return array_sum($this->values);
    }

    /**
    * Get the average of all dices.
    *
    * @return float as the average of all dices.
    */
    public function average()
    {
        return array_sum($this->values)/count($this->values);
    }
}
