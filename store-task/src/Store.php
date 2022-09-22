<?php

declare(strict_types=1);

namespace Alexander\StoreTask;

use Alexander\StoreTask\Exception\StoreException;
use Alexander\StoreTask\Helper\Helper;

class Store implements StoreInterface
{
    public const MAX_PRODUCTS = 1000;

    private int $productsCounter = 0;
    private int $productsWeight = 0;
    private array $products = [];

    public function add(mixed $product): void
    {
        foreach (Helper::normalizeProduct($product) as $productVO) {
            if ($this->productsCounter === self::MAX_PRODUCTS) {
                throw new StoreException('Store limit exceeded');
            }
            $this->products[] = $productVO;
            $this->productsCounter++;
            if (!$productVO->isContainer()) {
                $this->productsWeight += $productVO->getWeigh();
            }
        }
    }

    public function getTotalWeight(): int
    {
        return $this->productsWeight;
    }

    public function recalculateCounters(): void
    {
        $this->productsWeight = 0;
        $this->productsCounter = 0;

        foreach ($this->products as $product) {
            $this->productsCounter++;
            if (!$product->isContainer()) {
                $this->productsWeight += $product->getWeigh();
            }
        }
    }
}
