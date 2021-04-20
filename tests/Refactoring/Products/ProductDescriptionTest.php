<?php


namespace Refactoring\Products;


use Brick\Math\BigDecimal;
use Exception;
use PHPUnit\Framework\TestCase;

class ProductDescriptionTest extends TestCase
{
    /**
     * @test
     */
    public function canFormatDescriptionWithBothDescCorrect(): void
    {
        //expect
        $this->assertEquals("short *** long", $this->productDescriptionWithDesc("short", "long")->formatDesc());

    }

    /**
     * @test
     */
    public function cannotFormatDescriptionWithShortDescEmpty(): void
    {
        //expect
        $this->assertEquals("", $this->productDescriptionWithDesc("", "long2")->formatDesc());
    }

    /**
     * @test
     */
    public function cannotFormatDescriptionWithLongDescEmpty(): void
    {
        //expect
        $this->assertEquals("", $this->productDescriptionWithDesc("short", "")->formatDesc());
    }

    /**
     * @test
     */
    public function cannotFormatDescriptionWithShortDescNull(): void
    {
        //expect
        $this->assertEquals("", $this->productDescriptionWithDesc(null, "long2")->formatDesc());
    }

    /**
     * @test
     */
    public function cannotFormatDescriptionWithLongDescNull(): void
    {
        //expect
        $this->assertEquals("", $this->productDescriptionWithDesc("short", null)->formatDesc());
    }

    /**
     * @test
     */
    public function canChangeCharInDescription(): void
    {
        //given
        $productDescription = $this->productDescriptionWithDesc("short", "long");

        //when
        $productDescription->replaceCharFromDesc('s', 'z');

        //expect
        $this->assertEquals("zhort *** long", $productDescription->formatDesc());
    }

    /**
     * @test
     */
    public function cannotChangeCharInDescriptionWithShortDescEmpty(): void
    {
        //given
        $productDescription = $this->productDescriptionWithDesc("", "long");

        //expect
        $this->expectException(Exception::class);

        //when
        $productDescription->replaceCharFromDesc('s', 'z');
    }

    /**
     * @test
     */
    public function cannotChangeCharInDescriptionWithShortDescNull(): void
    {
        //given
        $productDescription = $this->productDescriptionWithDesc(null, "long");

        //expect
        $this->expectException(Exception::class);

        //when
        $productDescription->replaceCharFromDesc('s', 'z');
    }

    /**
     * @test
     */
    public function cannotChangeCharInDescriptionWithLongDescEmpty(): void
    {
        //given
        $productDescription = $this->productDescriptionWithDesc("short", "");

        //expect
        $this->expectException(Exception::class);

        //when
        $productDescription->replaceCharFromDesc('s', 'z');
    }

    /**
     * @test
     */
    public function cannotChangeCharInDescriptionWithLongDescNull(): void
    {
        //given
        $productDescription = $this->productDescriptionWithDesc("short", null);

        //expect
        $this->expectException(Exception::class);

        //when
        $productDescription->replaceCharFromDesc('s', 'z');
    }

    /**
     * @param string|null $desc
     * @param string|null $longDesc
     * @return ProductDescription
     */
    private function productDescriptionWithDesc(?string $desc, ?string $longDesc): ProductDescription
    {
        return new ProductDescription($desc, $longDesc);
    }
}