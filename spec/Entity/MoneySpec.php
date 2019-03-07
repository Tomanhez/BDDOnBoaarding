<?php

declare(strict_types=1);

namespace spec\App\Entity;

use PhpSpec\ObjectBehavior;

final class MoneySpec extends ObjectBehavior
{
    function let() : void
    {
        $this->beConstructedWith(100,'USD');
    }

    function it_has_amount() : void
    {
        $this->getAmount()->shouldReturn(100.00);
    }

    function it_has_currency_code() : void
    {
        $this->getCurrencyCode()->shouldReturn('USD');
    }

}