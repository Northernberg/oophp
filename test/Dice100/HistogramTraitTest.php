<?php

namespace Guno\Dice100;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class HistogramTraitTest extends TestCase
{
    /**
     * Construct object and try roll method
     */
    public function testgetHistogramMax()
    {
        $histogram = new Histogram();
        $arr = [5, 5, 5];

        $histogram->addValues($arr);
        $this->assertEquals(5, $histogram->getHistogramMax());
    }

    public function testgetHistogramMin()
    {
        $histogram = new Histogram();
        $arr = [1, 5, 8];

        $histogram->addValues($arr);
        $this->assertEquals(1, $histogram->getHistogramMin());
    }

    public function testgetHistogramSerie()
    {
        $histogram = new Histogram();
        $arr = [9, 7, 10];

        $histogram->addValues($arr);
        $this->assertEquals($arr, $histogram->getHistogramSerie());
    }
}
