<?php

namespace spec\App\Entity;

use App\Entity\Cart;
use App\Entity\Money;
use App\Entity\Product;
use PhpSpec\ObjectBehavior;

class CartSpec extends ObjectBehavior
{
    function it_contains_some_products(Product $product):void {
        //Given
        $product->getPrice()->willReturn(new Money(100.00,'USD'));
        //When
        $this->addProduct($product);
        //Then
        $this->hasProduct($product)->shouldReturn(true);
    }

    function it_has_total(Product $product, Product $secondProduct):void{
        $product->getPrice()->willReturn(new Money(100.00,'USD'));
        $secondProduct->getPrice()->willReturn(new Money(300.00,'USD'));

        $this->addProduct($product);
        $this->addProduct($secondProduct);

        $this->getTotoal()->shouldBeLike(new Money(400.00,'USD'));
    }


}
