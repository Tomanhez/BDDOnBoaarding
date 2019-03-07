<?php

namespace spec\App\Entity;

use App\Entity\Money;
use PhpSpec\ObjectBehavior;

class ProductSpec extends ObjectBehavior
{
    function let() : void {
        $this->beConstructedWith('Jelly Beans',new Money(100.00,'USD'));
    }

    function it_has_name():void {
        $this->getName()->shouldReturn('Jelly Beans');
    }

    function it_has_price():void {
        $this->getPrice()->shouldBeLike(new Money(100.00,'USD'));
    }
}
