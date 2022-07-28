<?php

$short = '';
$long = [
    'no-cache',
    'no-session',
];

$options = getopt($short, $long);

if (array_key_exists($long[0], $options)) {
    shell_exec('rm -r /home/samuel/code/openmage/var/cache/mage--*');
}

if (array_key_exists($long[1], $options)) {
    shell_exec('rm -r /home/samuel/code/openmage/var/session/sess_*');
}

shell_exec('php -S 127.0.0.1:6200');