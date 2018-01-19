<?php
namespace AppBundle\Services;

class Calculator
{


    public static function calculate(int $firstValue, int $secondValue)
    {
        return $firstValue+$secondValue;
    }
}