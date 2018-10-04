<?php

namespace Guno\Dice100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class HistogramObjectTest extends TestCase
{
    /**
     * Construct object and try roll method
     */
    public function testCreateObject()
    {
        $histogram = new Histogram();
        $this->assertInstanceOf("\Guno\Dice100\Histogram", $histogram);
    }

    public function testGetSerie()
    {
        $histogram = new Histogram();
        $this->assertTrue(is_array($histogram->getSerie()));
    }

    public function testGetAsText()
    {
        $histogram = new Histogram();
        $this->assertTrue(is_String($histogram->getAsText()));
    }

    public function testAddValuesFailure()
    {
        $histogram = new Histogram();
        $arr = "hello";
        $arr2 = [5, 7, 2];

        $histogram->addValues($arr2);

        $this->assertContains($arr, $histogram->getSerie());
    }
}
