<?php


namespace Refactoring\Products;


use Brick\Math\BigDecimal;
use Exception;

class ProductNumbers
{
    /**
     * @var ?BigDecimal
     */
    private $price;

    /**
     * @var ?int
     */
    private $counter;

    /**
     * ProductNumbers constructor.
     * @param BigDecimal|null $price
     * @param int|null $counter
     */
    public function __construct(?BigDecimal $price, ?int $counter)
    {
        $this->price = $price;
        $this->counter = $counter;
    }

    /**
     * @return BigDecimal|null
     */
    public function getPrice(): ?BigDecimal
    {
        return $this->price;
    }

    /**
     * @return int|null
     */
    public function getCounter(): ?int
    {
        return $this->counter;
    }

    /**
     * @throws Exception
     */
    public function incrementCounter(): void
    {
        $this->checkPrice();
        $this->checkCounter(1);
        $this->counter++;
    }

    /**
     * @throws Exception
     */
    public function decrementCounter(): void
    {
        $this->checkPrice();
        $this->checkCounter(-1);
        $this->counter--;
    }
    /**
     * @throws Exception
     */
    private function checkPrice(): void {
        if ($this->price == null || $this->price->getSign() <= 0) {
            throw new Exception("Invalid price");
        }
    }

    /**
     * @param int $valueToAdd
     * @throws Exception
     */
    private function checkCounter(int $valueToAdd): void {
        if ($this->counter === null) {
            throw new Exception("null counter");
        }

        if ($this->counter + $valueToAdd < 0) {
            throw new Exception("Negative counter");
        }
    }

    /**
     * @param BigDecimal|null $newPrice
     * @throws Exception
     */
    public function changePriceTo(?BigDecimal $newPrice): void
    {
        if ($this->counter === null) {
            throw new Exception("null counter");
        }
        if ($this->counter <= 0) {
            return;
        }
        if ($newPrice === null) {
            throw new Exception("new price null");
        }
        $this->price = $newPrice;
    }
}