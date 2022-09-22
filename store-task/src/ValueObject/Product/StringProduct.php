<?php

declare(strict_types=1);

namespace Alexander\StoreTask\ValueObject\Product;

class StringProduct implements ProductInterface
{
    public function __construct(
        public readonly string $value
    ) {
    }

    public function getWeigh(): int
    {
        return 3;
    }

    public function isContainer(): bool
    {
        return false;
    }
}
