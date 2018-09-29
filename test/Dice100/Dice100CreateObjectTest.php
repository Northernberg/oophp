<?php

namespace Guno\Dice100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class Dice100CreateObjectTest extends TestCase
{
    /**
     * Construct object and verify players attribute
     */
    public function testCreateObjectNoArguments()
    {
        $dice = new CurrentGame("Gustav");
        $this->assertInstanceOf("\Guno\Dice100\CurrentGame", $dice);

        $res = count($dice->getPlayers());
        $exp = 2;
        $this->assertEquals($exp, $res);
    }
}
