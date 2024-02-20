<?php
declare(strict_types=1);

namespace App\Day;

class DayTwo implements DayInterface
{
    /**
     * @var array
     */
    private $sets;

    public function __construct(string $input, bool $isFilePath = true)
    {
        if ($isFilePath) $input = file_get_contents($input);

        $this->sets = $this->prepareSets($input);
    }

    public function partOne(): int
    {
        return array_reduce($this->sets, function ($total, $set) {
            return $total + max($set) - min($set);
        }, 0);
    }

    public function partTwo(): int
    {
        $total = 0;

        foreach ($this->sets as $set) {
            foreach ($set as $a) {
                foreach ($set as $b) {
                    if ($a % $b === 0 && $a !== $b) {
                        $total += $a / $b;
                        continue 2;
                    }
                }
            }
        }

        return $total;
    }

    private function prepareSets(string $input): array
    {
        return array_map(function($set) {
            return explode("\t", $set);
        }, explode("\n", $input));
    }
}
