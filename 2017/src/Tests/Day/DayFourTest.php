<?php
declare(strict_types=1);

namespace App\Tests\Day;

use App\Day\DayFour;
use PHPUnit\Framework\TestCase;

class DayFourTest extends TestCase
{
    public function testPartOne()
    {
        $dayFour = new DayFour(__DIR__ . '/fixtures/dayfourpartone.txt');
        $this->assertEquals(2, $dayFour->partOne());
    }

    public function testPartTwo()
    {
        $dayFour = new DayFour(__DIR__ . '/fixtures/dayfourparttwo.txt');
        $this->assertEquals(3, $dayFour->partTwo());
    }
}
