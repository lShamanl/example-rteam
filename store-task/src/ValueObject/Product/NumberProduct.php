<?php

declare(strict_types=1);

namespace Alexander\StoreTask\ValueObject\Product;

class NumberProduct implements ProductInterface
{
    public function __construct(
        public readonly string $value
    ) {
    }

    public function getWeigh(): int
    {
        return 2;
    }

    public function isContainer(): bool
    {
        return false;
    }
}
