<?php

namespace App\Provider;

use App\Entity\Cart;
use Doctrine\Common\Persistence\ObjectRepository;

class CartProvider implements CartProviderInterface
{
    /** @var ObjectRepository */
    private $cartRepository;

    public function __construct(ObjectRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getOrCreate() : Cart
    {
        /** @var Cart|null $cart */
        $cart = $this->cartRepository->findOneBy([]);

        if ($cart === null) {
            return new Cart();
        }

        return $cart;
    }
}
