<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Cart
{
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

    public function getTotoal(): Money
    {
        return $this->total;
    }
}
