<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Services\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testCalculate()
    {
        $calculate = Calculator::calculate(5,5);
        $this->assertSame(10, $calculate);
    }

    /**
     * @expectedException \TypeError
     */
    public function testCalculateString()
    {
        $calculate = Calculator::calculate('string',5);
    }
}
