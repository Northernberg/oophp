<?php

namespace Guno\Dice100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class Dice100GameMethodTest extends TestCase
{
    /**
     * Construct object and test the main play method.
     */
    public function testCreateObjectNoArguments()
    {
        $game = new CurrentGame("Gustav");

        $game->playDice();
        $res = $game->getScorePool();
        $this->assertTrue(is_int($res));
    }

    public function testOneGameTurn()
    {
        $game = new CurrentGame("Gustav");

        $game->decideStarter();
        $game->playDice();
        $res = $game->getTurn();
        $game->turn();
        $exp = $game->getTurn();
        $this->assertNotEquals($res, $exp);
    }

    public function testSumOfvalues()
    {
        $game = new CurrentGame("Gustav");

        $res = array_sum($game->values());
        $exp = $game->sum();

        $this->assertEquals($res, $exp);
    }

    public function testGetValues()
    {
        $game = new CurrentGame("Gustav");

        $this->assertTrue(is_array($game->values()));
    }

    public function testGraphics()
    {
        $game = new CurrentGame("Gustav");

        $this->assertTrue(is_array($game->graphic()));
    }
}
