<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class ShowProductAction
{
    /** @var Environment */
    private $twig;

    /** @var ObjectRepository */
    private $productRepository;

    public function __construct(Environment $twig, ObjectRepository $productRepository)
    {
        $this->twig = $twig;
        $this->productRepository = $productRepository;
    }

    public function __invoke(Request $request) : Response
    {
        $productId = $request->attributes->get('id');
        $product = $this->productRepository->find(['id'=> $productId]);

        return new Response($this->twig->render('product.html.twig',['product' => $product]));
    }
}