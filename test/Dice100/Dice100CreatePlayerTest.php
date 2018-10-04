<?php

namespace Guno\Dice100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class PlayerCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify name attribute
     */
    public function testCreateObjectFirstArgument()
    {
        $player = new Player("Gustav");
        $this->assertInstanceOf("\Guno\Dice100\Player", $player);

        $res = $player->getName();
        $exp = "Gustav";
        $this->assertEquals($exp, $res);
    }

    public function testGetScoreType()
    {
        $player = new Player("gustav");

        $this->assertTrue(is_int($player->getScore()));
    }

    public function testAddPlayerScore()
    {
        $player = new Player("gustav");
        $res = $player->getScore();
        $exp = $player->getScore() + 5;

        $player->addScore(5);

        $this->assertEquals($res, $exp);
    }
}
