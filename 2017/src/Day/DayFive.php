<?php
declare(strict_types=1);

namespace App\Day;

class DayFive implements DayInterface
{
    /**
     * @var array
     */
    private $input;

    public function __construct(string $input, bool $isFilePath = true)
    {
        if ($isFilePath) $input = file_get_contents($input);

        $this->input = array_map('intval', explode("\n", $input));
    }

    public function partOne(): int
    {
        $i = 0;
        $steps = 0;

        $instructions = $this->input;

        while (isset($instructions[$i]))
        {
            $i += $instructions[$i]++;
            $steps++;
        }

        return $steps;
    }

    public function partTwo()
    {
        $i = 0;
        $steps = 0;

        $instructions = $this->input;

        while (isset($instructions[$i]))
        {
            $currentInstruction = $instructions[$i];
            if ($currentInstruction >= 3) {
                $instructions[$i]--;
            } else {
                $instructions[$i]++;
            }
            $i += $currentInstruction;
            $steps++;
        }

        return $steps;
    }

}
