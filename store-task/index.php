<?php

use Alexander\StoreTask\Store;

require 'vendor/autoload.php';

$store = new Store();

/**
 * Exception by count(1001 primitive):
 */
//foreach(range(0, 1000) as $i) {
//    $store->add('*');
//}

/**
 * Exception with type:
 */
//$store->add(function () { });

/**
 * 1000 primitive is success:
 */
//foreach(range(0, 999) as $i) {
//    $store->add('*');
//}
//var_dump($store->getTotalWeight());

/**
 * work with objects and arrays
 */
//$store->add(['*', 1, null, false, true, ['-', '+', 5], (object) ['o' => ['a','k', null, 4], 'b' => 7]]);
//var_dump($store->getTotalWeight());

