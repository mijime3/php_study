<?php

class RangeGenerator {

    public function range($start, $end)
    {
        return range($start, $end);
    }

    public function geneRange($start, $end)
    {
        for ($i=$start; $i <= $end; $i++)
        {
            yield $i;
        }
    }
}

$func = isset($argv[1]) ? $argv[1] : 'geneRange';
$max = isset($argv[2]) ? $argv[2] : 1000000;

$obj = new RangeGenerator();
$cnt = 0;
foreach ($obj->{$func}(1,$max) as $num) {
    $cnt++;
}

$mem = sprintf('%.2fM', memory_get_peak_usage() / 1024.0 / 1024.0);
echo <<<END
func={$func}
cnt={$cnt}
peek_mem={$mem}

END;
