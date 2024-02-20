<?php
declare(strict_types=1);

namespace App\Day;

class DayThree implements DayInterface
{
    /**
     * @var int
     */
    private $input;

    public function __construct(int $input)
    {
        $this->input = $input;
    }

    public function partOne(): int
    {
        $i = 1;

        while ($i * $i < $this->input)
        {
            $i += 2;
        }

        $variance = (int) floor($i / 2);
        $reducer = -$variance;
        $steps = $i - 1;

        for ($j = 0; $j < ($i * $i) - $this->input; ++$j) {
            $sign = ($reducer > 0) ? 1 : -1;
            $steps += $sign;

            if ($reducer > 0) {
                $reducer--;
            } elseif ($reducer < 0) {
                $reducer++;
            }

            if ($reducer === 0) {
                $reducer = $variance * $sign * -1;
            }
        }

        return $steps;
    }

    public function partTwo()
    {
        // still no idea
    }
}
