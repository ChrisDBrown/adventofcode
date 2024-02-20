<?php
declare(strict_types=1);

namespace App\Day;

class DaySix implements DayInterface
{
    /**
     * @var array
     */
    private $input;

    public function __construct(array $input)
    {
        $this->input = $input;
    }

    public function partOne():int
    {
        $current = $this->input;
        $patterns = [];

        while (!in_array($current, $patterns))
        {
            $patterns[] = $current;
            $current = $this->redistributeBlocks($current);
        }

        return count($patterns);
    }

    public function partTwo(): int
    {
        $current = $this->input;
        $patterns = [];

        while (!in_array($current, $patterns))
        {
            $patterns[] = $current;
            $current = $this->redistributeBlocks($current);
        }

        return count($patterns) - array_search($current, $patterns);
    }

    private function redistributeBlocks(array $in): array
    {
        $max = max($in);
        $pos = array_search($max, $in);
        $in[$pos] = 0;

        for ($i = 1; $i <= $max; $i++) {
            $newPos = $pos + $i;
            while ($newPos >= count($in)) {
                $newPos -= count($in);
            }
            $in[$newPos]++;
        }
        
        return $in;
    }
}
