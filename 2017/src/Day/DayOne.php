<?php
declare(strict_types=1);

namespace App\Day;

class DayOne implements DayInterface
{
    /**
     * @var array
     */
    private $input;

    public function __construct(string $input, bool $isFilePath = true)
    {
        if ($isFilePath) $input = file_get_contents($input);

        $this->input = str_split($input);
    }

    public function partOne(): int
    {
        $firstChar = array_shift($this->input);
        $previousChar = $firstChar;
        $total = 0;

        foreach ($this->input as $currentChar) {
            if ($currentChar == $previousChar) {
                $total += $currentChar;
            }
            $previousChar = $currentChar;
        }

        if ($previousChar == $firstChar) {
            $total += $previousChar;
        }

        return $total;
    }

    public function partTwo(): int
    {
        $sets = array_chunk($this->input, count($this->input) / 2);
        $total = 0;

        for ($i = 0; $i < count($sets[0]); $i++) {
            if ($sets[0][$i] == $sets[1][$i]) {
                $total += $sets[0][$i] * 2;
            }
        }

        return $total;
    }
}
