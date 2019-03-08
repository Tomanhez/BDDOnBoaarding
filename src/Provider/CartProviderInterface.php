<?php

declare(strict_types=1);

namespace App\Provider;


use App\Entity\Cart;

interface CartProviderInterface
{
    public function getOrCreate(): Cart;
}