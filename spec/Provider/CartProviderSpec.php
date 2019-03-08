<?php

namespace spec\App\Provider;

use App\Entity\Cart;
use App\Provider\CartProviderInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use PhpSpec\ObjectBehavior;

class CartProviderSpec extends ObjectBehavior
{
    function let(ObjectRepository $cartRepository)
    {
        $this->beConstructedWith($cartRepository);
    }

    function it_implement_cart_provider_interface() : void
    {
        $this->shouldImplement(CartProviderInterface::class);
    }

    function it_if_cart_exist_in_base_return_it(ObjectRepository $cartRepository,Cart $cart) : void
    {
        $cartRepository->findOneBy([])->willReturn($cart);
        $this->getOrCreate()->shouldReturn($cart);
    }

    function it_create_card_if_doesnt_exist(ObjectRepository $cartRepository) : void
    {
        $cartRepository->findOneBy([])->willReturn(null);
        $this->getOrCreate()->shouldBeLike(new Cart());
    }
}
