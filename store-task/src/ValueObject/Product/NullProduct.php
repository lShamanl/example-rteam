<?php

declare(strict_types=1);

namespace Alexander\StoreTask\ValueObject\Product;

class NullProduct implements ProductInterface
{
    public function getWeigh(): int
    {
        return 0;
    }

    public function isContainer(): bool
    {
        return false;
    }
}
