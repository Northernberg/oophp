<?php

namespace Guno\Dice100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceHandTest extends TestCase
{
    /**
     * Construct object and verify players attribute
     */
    public function testCreateObject()
    {
        $diceHand = new DiceHand(3);
        $this->assertInstanceOf("\Guno\Dice100\Dicehand", $diceHand);

        $res = count($diceHand->values());
        $exp = 3;
        $this->assertEquals($exp, $res);
    }
}
