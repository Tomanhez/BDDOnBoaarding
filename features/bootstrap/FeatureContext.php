<?php

use App\Entity\Cart;
use App\Entity\Money;
use App\Entity\Product;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;


final class FeatureContext implements Context
{
    /** @var array|Product */
    private $product = [];

    /** @var Cart */
    private $cart;

    public function __construct()
    {
        $this->cart = new Cart();
    }

    /**
     * @Given there is a product :productName that coast :price :currencyCode
     */
    public function thereIsProduct(string $productName, float $price, string $currencyCode) : void
    {
        $this->product[] = new Product($productName,new Money($price,$currencyCode));
    }

    /**
     * @When I add product :productName to my cart
     */
    public function addProductToMyCart(string $productName) : void
    {
        /** @var Product $product */
        $product = $this->getProductByName($productName);
        $this->cart->addProduct($product);
    }

    /**
     * @Then my cart should have :productName product inside
     */
    public function myCartShouldHaveProductInside(string $productName) : void
    {
        /** @var Product $product */
        $product = $this->getProductByName($productName);
        Assert::true($this->cart->hasProduct($product));
    }

    /**
     * @Then its total should be :total :currencyCode
     */
    public function itsTotalShouldBeUsd(float $total, string $currencyCode) : void
    {
        Assert::eq($this->cart->getTotoal(), new Money($total,$currencyCode));
    }

    private function getProductByName(string  $productName): ?Product{
        /** @var Product $product */
        foreach ($this->product as $product){
            if($product->getName() === $productName){
                return $product;
            }
        }

        throw new Exception('Product not available');
    }
}
