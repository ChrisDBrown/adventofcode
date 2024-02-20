<?php
declare(strict_types=1);

namespace App\Tests\Day;

use App\Day\DayThree;
use PHPUnit\Framework\TestCase;

class DayThreeTest extends TestCase
{
    public function testPartOne()
    {
        $dayThree = new DayThree(1);
        $this->assertEquals(0, $dayThree->partOne());

        $dayThree = new DayThree(12);
        $this->assertEquals(3, $dayThree->partOne());

        $dayThree = new DayThree(23);
        $this->assertEquals(2, $dayThree->partOne());

        $dayThree = new DayThree(1024);
        $this->assertEquals(31, $dayThree->partOne());
    }

    public function testPartTwo()
    {
        $this->markTestSkipped('No answer yet');
        $dayThree = new DayThree(20);
        $this->assertEquals(23, $dayThree->partTwo());

        $dayThree = new DayThree(800);
        $this->assertEquals(806, $dayThree->partTwo());

        $dayThree = new DayThree(2000);
        $this->assertEquals(2105, $dayThree->partTwo());

        $dayThree = new DayThree(6000);
        $this->assertEquals(6155, $dayThree->partTwo());
    }
}
