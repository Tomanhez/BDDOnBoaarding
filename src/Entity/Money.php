<?php

namespace App\Entity;

class Money
{
    /** @var float */
    private $amount;

    /** @var string */
    private $currencyCode;

    public function __construct(float $amount, string $currencyCode)
    {
        $this->amount = $amount;
        $this->currencyCode = $currencyCode;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }




}
