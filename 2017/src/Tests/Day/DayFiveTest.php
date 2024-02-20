<?php
declare(strict_types=1);

namespace App\Tests\Day;

use App\Day\DayFive;
use PHPUnit\Framework\TestCase;

class DayFiveTest extends TestCase
{
    public function testPartOne()
    {
        $dayFive = new DayFive("0\n3\n0\n1\n-3", false);
        $this->assertEquals(5, $dayFive->partOne());
    }

    public function testPartTwo()
    {
        $dayFive = new DayFive("0\n3\n0\n1\n-3", false);
        $this->assertEquals(10, $dayFive->partTwo());
    }
}
