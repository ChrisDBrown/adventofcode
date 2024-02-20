<?php
declare(strict_types=1);

namespace App\Tests\Day;

use App\Day\DayTwo;
use PHPUnit\Framework\TestCase;

class DayTwoTest extends TestCase
{
    public function testPartOne()
    {
        $dayTwo = new DayTwo(__DIR__ . '/fixtures/daytwopartone.txt');
        $this->assertEquals(18, $dayTwo->partOne());
    }

    public function testPartTwo()
    {
        $dayTwo = new DayTwo(__DIR__ . '/fixtures/daytwoparttwo.txt');
        $this->assertEquals(9, $dayTwo->partTwo());
    }
}
