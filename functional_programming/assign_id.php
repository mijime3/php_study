<?php
$func = function($elements, $id, $records) use (&$func) {
    if (count($elements) == 0) {
        return [$id, $records];
    }

    $element = $elements[0];
    $record = [
        'id' => $id,
        'content' => $element,
    ];

    return $func(array_slice($elements, 1), $id + 1, array_merge($records, [$record]));
};

$id = 1;
$elements = [
    'aaa',
    'bbb',
    'ccc',
    'ddd',
    'eee',
];
list($latest_id, $records) = $func($elements, $id, []);

var_dump(compact(['latest_id', 'records']));
