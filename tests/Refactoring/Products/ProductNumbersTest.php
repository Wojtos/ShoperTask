<?php


namespace Refactoring\Products;


use Brick\Math\BigDecimal;
use Exception;
use PHPUnit\Framework\TestCase;

class ProductNumbersTest extends TestCase
{
    /**
     * @test
     */
    public function canIncrementCounterIfPriceIsPositive(): void
    {
        //given
        $productNumbers = $this->productNumbersWithPriceAndCounter(BigDecimal::ten(), 10);

        //when
        $productNumbers->incrementCounter();

        //then
        $this->assertEquals(11, $productNumbers->getCounter());
    }

    /**
     * @test
     */
    public function cannotIncrementCounterIfPriceIsNegative(): void
    {
        //given
        $productNumbers = $this->productNumbersWithPriceAndCounter(BigDecimal::of(-1), null);

        //expect
        $this->expectException(Exception::class);

        //when
        $productNumbers->incrementCounter();
    }

    /**
     * @test
     */
    public function cannotIncrementCounterIfCounterIsNull(): void
    {
        //given
        $productNumbers = $this->productNumbersWithPriceAndCounter(BigDecimal::ten(), null);

        //expect
        $this->expectException(Exception::class);

        //when
        $productNumbers->incrementCounter();
    }

    /**
     * @test
     */
    public function cannotIncrementCounterIfCounterIsSmallerThanOne(): void
    {
        //given
        $productNumbers = $this->productNumbersWithPriceAndCounter(BigDecimal::ten(), -10);

        //expect
        $this->expectException(Exception::class);

        //when
        $productNumbers->incrementCounter();
    }

    /**
     * @test
     */
    public function canDecrementCounterIfPriceIsPositive() {
        //given
        $productNumbers = $this->productNumbersWithPriceAndCounter(BigDecimal::one(), 10);

        //when
        $productNumbers->decrementCounter();

        //then
        $this->assertEquals(
            9,
            $productNumbers->getCounter()
        );
    }

    /**
     * @test
     */
    public function cannotDecrementCounterIfPriceIsNegative(): void
    {
        //given
        $productNumbers = $this->productNumbersWithPriceAndCounter(BigDecimal::of(-1), null);

        //expect
        $this->expectException(Exception::class);

        //when
        $productNumbers->decrementCounter();
    }

    /**
     * @test
     */
    public function cannotDecrementCounterIfCounterIsNull(): void
    {
        //given
        $productNumbers = $this->productNumbersWithPriceAndCounter(BigDecimal::ten(), null);

        //expect
        $this->expectException(Exception::class);

        //when
        $productNumbers->decrementCounter();
    }

    /**
     * @test
     */
    public function cannotDecrementCounterIfCounterIsSmallerThanOne(): void
    {
        //given
        $productNumbers = $this->productNumbersWithPriceAndCounter(BigDecimal::ten(), -10);

        //expect
        $this->expectException(Exception::class);

        //when
        $productNumbers->decrementCounter();
    }

    /**
     * @test
     */
    public function canChangePriceIfCounterIsPositive(): void
    {
        //given
        $productNumbers = $this->productNumbersWithPriceAndCounter(BigDecimal::one(), 1);

        //when
        $productNumbers->changePriceTo(BigDecimal::ten());

        //then
        $this->assertEquals(BigDecimal::ten(), $productNumbers->getPrice());
    }

    /**
     * @test
     */
    public function cannotChangePriceIfCounterIsNotPositive(): void
    {
        //given
        $productNumbers = $this->productNumbersWithPriceAndCounter(BigDecimal::zero(), 0);

        //when
        $productNumbers->changePriceTo(BigDecimal::ten());

        //then
        $this->assertEquals(BigDecimal::zero(), $productNumbers->getPrice());
    }

    /**
     * @test
     */
    public function cannotChangePriceIfCounterIsNull(): void
    {
        //given
        $productNumbers = $this->productNumbersWithPriceAndCounter(BigDecimal::zero(), null);

        //expect
        $this->expectException(Exception::class);

        //when
        $productNumbers->changePriceTo(BigDecimal::ten());
    }


    /**
     * @param BigDecimal $price
     * @param int|null $counter
     * @return ProductNumbers
     */
    private function productNumbersWithPriceAndCounter(BigDecimal $price, ?int $counter): ProductNumbers
    {
        return new ProductNumbers($price, $counter);
    }
}