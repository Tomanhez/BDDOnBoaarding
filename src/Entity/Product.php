<?php

namespace App\Entity;

class Product
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var Money */
    private $price;

    public function __construct(string $name, Money $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
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
