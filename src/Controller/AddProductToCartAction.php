<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Product;
use App\Provider\CartProviderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class AddProductToCartAction
{
    /** @var ObjectRepository */
    private $productRepository;

    /** @var ObjectManager */
    private $entityManager;

    /** @var UrlGeneratorInterface */
    private $router;

    /** @var CartProviderInterface */
    private $cartProvider;

    public function __construct(
        ObjectRepository $productRepository,
        ObjectManager $entityManager,
        UrlGeneratorInterface $router,
        CartProviderInterface $cartProvider
    ) {
        $this->productRepository = $productRepository;
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->cartProvider = $cartProvider;
    }


    public function __invoke(Request $request) : Response
    {
        /** @var Product $product */
        $product = $this->productRepository->find($request->request->get('id'));

        $cart = $this->cartProvider->getOrCreate();
        $cart->addProduct($product);

        $this->entityManager->persist($cart);
        $this->entityManager->flush();

        return new RedirectResponse($this->router->generate('app_show_cart'));
    }
}