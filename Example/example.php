<?php

require __DIR__ . '/../src/Enum.php';

$enum = new Enum(['a', 'b']);
$enum->set('a');

function (Enum $enum) {
    echo $enum;
}