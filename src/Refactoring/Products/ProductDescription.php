<?php


namespace Refactoring\Products;


class ProductDescription
{
    /**
     * @var string|null
     */
    private $desc;

    /**
     * @var string|null
     */
    private $longDesc;

    /**
     * ProductDescription constructor.
     * @param string|null $desc
     * @param string|null $longDesc
     */
    public function __construct(?string $desc, ?string $longDesc)
    {
        $this->desc = $desc;
        $this->longDesc = $longDesc;
    }

    /**
     * @return string|null
     */
    public function getDesc(): ?string
    {
        return $this->desc;
    }

    /**
     * @return string|null
     */
    public function getLongDesc(): ?string
    {
        return $this->longDesc;
    }



    /**
     * @param string|null $charToReplace
     * @param string|null $replaceWith
     * @throws \Exception
     */
    public function replaceCharFromDesc(?string $charToReplace, ?string $replaceWith): void
    {
        if (!$this->longDesc || !$this->desc) {
            throw new \Exception("null or empty desc");
        }

        $this->longDesc = str_replace($charToReplace, $replaceWith, $this->longDesc);
        $this->desc = str_replace($charToReplace, $replaceWith, $this->desc);
    }

    /**
     * @return string
     */
    public function formatDesc(): string {
        if (!$this->longDesc || !$this->desc) {
            return "";
        }

        return $this->desc . " *** " . $this->longDesc;
    }

}