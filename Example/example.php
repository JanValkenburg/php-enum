<?php

require __DIR__ . '/../src/Enum.php';

$enum = new Enum(['a', 'b'], 'c');
$enum->set('d');

echo $enum;