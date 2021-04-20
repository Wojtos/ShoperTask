<?php

namespace Refactoring\Products;

use Brick\Math\BigDecimal;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Product
{
    /**
     * @var UuidInterface
     */
    private $serialNumber;

    /**
     * @var ProductNumbers
     */
    private $productNumbers;

    /**
     * @var ProductDescription
     */
    private $productDescription;

    /**
     * Product constructor.
     * @param BigDecimal|null $price
     * @param string|null $desc
     * @param string|null $longDesc
     * @param int|null $counter
     */
    public function __construct(?BigDecimal $price, ?string $desc, ?string $longDesc, ?int $counter)
    {
        $this->serialNumber = Uuid::uuid4();
        $this->productNumbers = new ProductNumbers($price, $counter);
        $this->productDescription = new ProductDescription($desc, $longDesc);
    }

    /**
     * @return UuidInterface
     */
    public function getSerialNumber(): UuidInterface
    {
        return $this->serialNumber;
    }

    /**
     * @return BigDecimal
     */
    public function getPrice(): BigDecimal
    {
        return $this->productNumbers->getPrice();
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->productDescription->getDesc();
    }

    /**
     * @return string
     */
    public function getLongDesc(): string
    {
        return $this->productDescription->getLongDesc();
    }

    /**
     * @return int
     */
    public function getCounter(): int
    {
        return $this->productNumbers->getCounter();
    }

    /**
     * @throws Exception
     */
    public function decrementCounter(): void
    {
        $this->productNumbers->decrementCounter();
    }

    /**
     * @throws Exception
     */
    public function incrementCounter(): void
    {
        $this->productNumbers->incrementCounter();
    }

    /**
     * @param BigDecimal|null $newPrice
     * @throws Exception
     */
    public function changePriceTo(?BigDecimal $newPrice): void
    {
        $this->productNumbers->changePriceTo($newPrice);
    }

    /**
     * @param string|null $charToReplace
     * @param string|null $replaceWith
     * @throws Exception
     */
    public function replaceCharFromDesc(?string $charToReplace, ?string $replaceWith): void
    {
        $this->productDescription->replaceCharFromDesc($charToReplace, $replaceWith);
    }

    /**
     * @return string
     */
    public function formatDesc(): string {
        return $this->productDescription->formatDesc();
    }
}
