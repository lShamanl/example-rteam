<?php

declare(strict_types=1);

namespace Alexander\StoreTask\Helper;

use Alexander\StoreTask\Exception\StoreException;
use Alexander\StoreTask\ValueObject\Product\ArrayProduct;
use Alexander\StoreTask\ValueObject\Product\BooleanProduct;
use Alexander\StoreTask\ValueObject\Product\NullProduct;
use Alexander\StoreTask\ValueObject\Product\NumberProduct;
use Alexander\StoreTask\ValueObject\Product\ObjectProduct;
use Alexander\StoreTask\ValueObject\Product\ProductInterface;
use Alexander\StoreTask\ValueObject\Product\StringProduct;
use Generator;

class Helper
{
    /**
     * @param mixed $product
     * @return Generator<ProductInterface>
     */
    public static function normalizeProduct(mixed $product): Generator
    {
        yield self::createProductValueObject($product);
        if (is_object($product)) {
            foreach ((array) $product as $item) {
                foreach (self::normalizeProduct($item) as $nestedItem) {
                    yield $nestedItem;
                }
            }
        }
        if (is_array($product)) {
            foreach ($product as $item) {
                foreach (self::normalizeProduct($item) as $nestedItem) {
                    yield $nestedItem;
                }
            }
        }
    }

    public static function createProductValueObject(mixed $product): ProductInterface
    {
        if ($product instanceof \Closure) {
            throw new StoreException('Invalid product type: ' . get_class($product));
        }
        if (is_string($product)) {
            return new StringProduct($product);
        }
        if (is_float($product) || is_int($product)) {
            return new NumberProduct((string) $product);
        }
        if (is_bool($product)) {
            return new BooleanProduct($product);
        }
        if (is_null($product)) {
            return new NullProduct();
        }
        if (is_array($product)) {
            return new ArrayProduct($product);
        }
        if (is_object($product)) {
            return new ObjectProduct($product);
        }

        throw new StoreException('Invalid product type: ' . $product);
    }
}
