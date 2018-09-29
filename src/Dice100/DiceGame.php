<?php
namespace Guno\Dice100;

/**
 * DiceGame game logic class
 */
class DiceGame
{
    /**
    * @var integer $players    Array of players
    */
    private $dicehand;

    public function __construct()
    {
        $this->dicehand = new DiceHand(3);
    }

    /**
    *
    *  Play method
    */
    public function play()
    {
        $score = 0;
        $this->dicehand->roll();
        foreach ($this->dicehand->values() as $value) {
            if ($value == 1) {
                $score = 0;
                break;
            } else {
                $score += $value;
            }
        }
        return $score;
    }

    public function values()
    {
        return $this->dicehand->values();
    }

    public function graphic()
    {
        $graphics = [];
        foreach ($this->values() as $value) {
            array_push($graphics, "dice-" . $value);
        }
        return $graphics;
    }

    public function sum()
    {
        return $this->dicehand->sum();
    }
}
