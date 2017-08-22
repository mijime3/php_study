<?php

$func = function () {
    echo "called\n";
};

var_dump(is_callable($func));
// -> true

$func();
// -> called

call_user_func($func);
// -> called
