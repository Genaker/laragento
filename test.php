<?php

require __DIR__ . '/vendor/autoload.php';

$params = [
    'host' => '127.0.0.1',
    'database'  => 'magento2',
    'username'  => 'root',
    'password'  => '',
    'prefix'    => '' 
];
Laragento\DB::connect($params);

$products = Laragento\Models\CatalogProductEntity::all();

var_dump($products);
