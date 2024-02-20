<?php
declare(strict_types=1);

namespace App\Tests\Day;

use App\Day\DaySix;
use PHPUnit\Framework\TestCase;

class DaySixTest extends TestCase
{
    public function testPartOne()
    {
        $daySix = new DaySix([0, 2, 7, 0]);
        $this->assertEquals(5, $daySix->partOne());
    }

    public function testPartTwo()
    {
        $daySix = new DaySix([2, 4, 1, 2]);
        $this->assertEquals(4, $daySix->partTwo());
    }
}
