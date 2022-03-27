<?php
    $n = 100;
    $foo = 3;
    $bar = 5;
    for ( $i=1; $i<=$n; $i++ ) {
        $res = null;
        if ($i % $foo == 0) $res = "foo";
        if ($i % $bar == 0) $res = $res . "bar";
        elseif (!$res) $res = $i;

        if ($i < $n) echo $res . ", ";
        else echo $res . PHP_EOL;
    }
