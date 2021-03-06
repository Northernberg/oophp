<?php
namespace Guno\Dice100;

/**
 * DiceGame player class
 */
class Player
{
    /**
    * @var integer $score     Current score
    */
    private $score = 0;
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }


    public function addScore($value)
    {
        $this->score += $value;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getName()
    {
        return $this->name;
    }
}
