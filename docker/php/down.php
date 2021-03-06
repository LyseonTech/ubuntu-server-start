<?php

require_once __DIR__ . '/helper/functions.php';

try {
    $parameters = argv($argv, ['b']);

    $base = $parameters['b'];

    down($base);

    $sites = sites($base);
    foreach ($sites as $site) {
        if (!$site->active) {
            continue;
        }
        down($base, $site->domain);
    }
} catch (ErrorException $e) {
    echo '"', $e->getMessage(), '"', ' on ', $e->getFile(), ' in ', $e->getLine(), PHP_EOL;
}
