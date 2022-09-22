<?php

declare(strict_types=1);

namespace Alexander\StoreTask\ValueObject\Product;

interface ProductInterface
{
    public function getWeigh(): int;
    public function isContainer(): bool;
}
