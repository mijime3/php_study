<?php

class BasicGenerator
{
    public function __construct()
    {
    }

    public function run()
    {
        $gene = $this->items();
        var_dump($gene);
        foreach( $gene as $item )
        {
            var_dump($item);
        }
    }

    private function items()
    {
        yield 1;
        yield true;
        yield ['hoge', 'fuga'];
        yield new \stdClass();
    }
}

$g = new BasicGenerator();
$g->run();

