<?php
declare(strict_types=1);

namespace App\Day;

class DayFour implements DayInterface
{
    /**
     * @var array
     */
    private $input;

    public function __construct(string $input, bool $isFilePath = true)
    {
        if ($isFilePath) $input = file_get_contents($input);

        $this->input = explode("\n", $input);
    }

    public function partOne(): int
    {
        return array_reduce($this->input, function($total, $row) {
            if ($row === '') return $total;

            return $total + (int) $this->hasNoDuplicateWords($row);
        }, 0);
    }

    public function partTwo()
    {
        return array_reduce($this->input, function($total, $row) {
            if ($row === '') return $total;

            $passesTests = $this->hasNoDuplicateWords($row) && $this->hasNoAnagramPairs($row);
            return $total + (int) $passesTests;
        }, 0);
    }

    private function hasNoDuplicateWords(string $row): bool
    {
        $words = explode(' ', $row);

        return count($words) === count(array_unique($words));
    }

    private function hasNoAnagramPairs(string $row): bool
    {
        $words = explode(' ', $row);

        while (count($words) > 1)
        {
            $current = array_shift($words);
            foreach ($words as $word) {
                if (count_chars($current) === count_chars($word)) return false;
            }
        }

        return true;
    }
}
