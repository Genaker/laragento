<?php

$start = microtime(TRUE);

require __DIR__ . '/vendor/autoload.php';

$params = [
    'host' => '127.0.0.1',
    'database'  => 'magento2',
    'username'  => 'root',
    'password'  => '',
    'prefix'    => '' 
];
Laragento\DB::connect($params);

$products = Laragento\Models\CatalogProductEntity::limit(10)->get();

var_dump($products);

$end = microtime(TRUE);

echo "\nThe code took " . ($end - $start) . " seconds to complete.\n";
