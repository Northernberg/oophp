<?php

namespace Guno\Dice100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceTryThrowTest extends TestCase
{
    /**
     * Construct object and try roll method
     */
    public function testCreateObjectNoArguments()
    {
        $dice = new Dice(6);
        $this->assertInstanceOf("\Guno\Dice100\Dice", $dice);

        $res = $dice->roll();
        $this->assertTrue(is_int($res));
    }
}
