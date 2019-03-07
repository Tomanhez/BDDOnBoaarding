<?php

namespace App\Entity;

final class Product
{

    /** @var string */
    private $name;

    /** @var Money */
    private $price;

    /**
     * @param string $name
     * @param Money $price
     */
    public function __construct(string $name, Money $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }




}
