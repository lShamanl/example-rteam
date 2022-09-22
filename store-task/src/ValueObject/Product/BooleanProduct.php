<?php

declare(strict_types=1);

namespace Alexander\StoreTask\ValueObject\Product;

class BooleanProduct implements ProductInterface
{
    public function __construct(
        public readonly bool $value
    ) {
    }

    public function getWeigh(): int
    {
        return 1;
    }

    public function isContainer(): bool
    {
        return false;
    }
}
