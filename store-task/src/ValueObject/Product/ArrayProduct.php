<?php

declare(strict_types=1);

namespace Alexander\StoreTask\ValueObject\Product;

use Alexander\StoreTask\Helper\Helper;

class ArrayProduct implements ProductInterface
{
    public function __construct(
        public readonly array $value
    ) {
    }

    public function getWeigh(): int
    {
        $weigh = 0;
        /** @var ProductInterface $item */
        foreach ($this->value as $item) {
            foreach (Helper::normalizeProduct($item) as $product) {
                if (!$product->isContainer()) {
                    $weigh += $product->getWeigh();
                }
            }
        }

        return $weigh;
    }

    public function isContainer(): bool
    {
        return true;
    }
}
