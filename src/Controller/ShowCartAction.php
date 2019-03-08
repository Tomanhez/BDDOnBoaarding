<?php

declare(strict_types=1);

namespace App\Controller;


use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class ShowCartAction
{
    /** @var Environment */
    private $twig;

    /** @var ObjectRepository */
    private $cartRepository;

    public function __construct(Environment $twig, ObjectRepository $cartRepository)
    {
        $this->twig = $twig;
        $this->cartRepository = $cartRepository;
    }

    public function __invoke() : Response
    {
        $cart = $this->cartRepository->findOneBy([]);
        return new Response($this->twig->render('cart.html.twig',['cart'=>$cart]));
    }


}