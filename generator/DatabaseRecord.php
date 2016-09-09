<?php

class ItemRepository {

    /** @var  PDO */
    private $pdo;

    public function init($item_num)
    {
        $this->pdo = new PDO('sqlite::memory:');

        $this->pdo->exec('CREATE TABLE items (id int primary key, name text)');
        for ($i=0; $i < $item_num; $i++) {
            $id = $i+1;
            $name = 'item'.$id;
            $this->pdo->exec("INSERT INTO items VALUES ({$id},'{$name}')");
        }
    }

    public function gene()
    {
        $stmt = $this->pdo->query("SELECT * FROM items");
        while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
            yield $rec;
        }
    }

    public function notgene()
    {
        $stmt = $this->pdo->query("SELECT * FROM items");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$func = isset($argv[1]) ? $argv[1] : 'gene';
$max = isset($argv[2]) ? $argv[2] : 100000;

$obj = new ItemRepository();
$obj->init($max);
$cnt = 0;
$st = microtime(true);
foreach ($obj->{$func}() as $num) {
    $cnt++;
}
$time = microtime(true)-$st;

$mem = sprintf('%.2fM', memory_get_peak_usage() / 1024.0 / 1024.0);
echo <<<END
func={$func}
cnt={$cnt}
peek_mem={$mem}
time={$time}

END;
