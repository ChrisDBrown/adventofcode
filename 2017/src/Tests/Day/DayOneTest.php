<?php
declare(strict_types=1);

namespace App\Tests\Day;

use App\Day\DayOne;
use PHPUnit\Framework\TestCase;

class DayOneTest extends TestCase
{
    public function testPartOne()
    {
        $dayOne = new DayOne('1122', false);
        $this->assertEquals(3, $dayOne->partOne());

        $dayOne = new DayOne('1111', false);
        $this->assertEquals(4, $dayOne->partOne());

        $dayOne = new DayOne('1234', false);
        $this->assertEquals(0, $dayOne->partOne());

        $dayOne = new DayOne('91212129', false);
        $this->assertEquals(9, $dayOne->partOne());
    }

    public function testPartTwo()
    {
        $dayOne = new DayOne('1212', false);
        $this->assertEquals(6, $dayOne->partTwo());

        $dayOne = new DayOne('1221', false);
        $this->assertEquals(0, $dayOne->partTwo());

        $dayOne = new DayOne('123425', false);
        $this->assertEquals(4, $dayOne->partTwo());

        $dayOne = new DayOne('123123', false);
        $this->assertEquals(12, $dayOne->partTwo());

        $dayOne = new DayOne('12131415', false);
        $this->assertEquals(4, $dayOne->partTwo());
    }
}
