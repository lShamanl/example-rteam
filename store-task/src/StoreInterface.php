<?php

declare(strict_types=1);

namespace Alexander\StoreTask;

interface StoreInterface {
    public function add(mixed $product);
    public function getTotalWeight(): int;
}
