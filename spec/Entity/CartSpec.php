<?php

namespace spec\App\Entity;

use App\Entity\Cart;
use App\Entity\Money;
use App\Entity\Product;
use PhpSpec\ObjectBehavior;

class CartSpec extends ObjectBehavior
{
    function it_contains_some_products(Product $product) : void
    {
        $product->getPrice()->willReturn(new Money(100.00,'USD'));

        $this->addProduct($product);

        $this->hasProduct($product)->shouldReturn(true);
    }



    function it_has_total(Product $product, Product $secondProduct) : void
    {
        $product->getPrice()->willReturn(new Money(100.00,'USD'));
        $secondProduct->getPrice()->willReturn(new Money(300.00,'USD'));

        $this->addProduct($product);
        $this->addProduct($secondProduct);

        $this->getTotal()->shouldBeLike(new Money(400.00,'USD'));
    }

    function it_cant_contains_product_with_name(Product $product) : void
    {
        $product->getPrice()->willReturn(new Money(100.00,'USD'));

        $product->getName()->willReturn('Princessa');

        $this->addProduct($product);

        $this->hasProductWithName('Princessa')->shouldReturn(true);
        $this->hasProductWithName('Mars')->shouldReturn(false);

    }




}
