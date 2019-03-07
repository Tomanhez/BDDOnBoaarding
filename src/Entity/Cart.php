<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Cart
{
    /** @var int */
    private $id;

    /** @var Collection|Product */
    private $products;

    /** @var Money */
    private  $total;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->total = new Money(0.0,'USD');
    }


    public function addProduct(Product $product): void
    {
        $this->products->add($product);
        $this->total = new Money($this->total->getAmount() + $product->getPrice()->getAmount(),'USD');
    }

    public function hasProduct(Product $product): bool
    {
        return $this->products->contains($product);
    }

    public function getTotal(): Money
    {
        return $this->total;
    }

    public function hasProductWithName(string $productName) : bool
    {
        /** @var Product $product */
        foreach ($this->products as $product) {
            if ($product->getName() === $productName) {
                return true;
            }
        }

        return false;
    }

    public function getId(): int
    {
        return $this->id;
    }




}
