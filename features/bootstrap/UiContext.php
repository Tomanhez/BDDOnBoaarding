<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;


final class UiContext implements Context
{

    /**
     * @Given there is a product :productName that coast :price :currencyCode
     */
    public function thereIsProduct(string $productName, float $price, string $currencyCode) : void
    {
        throw new PendingException();
    }

    /**
     * @When I add product :productName to my cart
     */
    public function addProductToMyCart(string $productName) : void
    {
        throw new PendingException();
    }

    /**
     * @Then my cart should have :productName product inside
     */
    public function myCartShouldHaveProductInside(string $productName) : void
    {
        throw new PendingException();
    }

    /**
     * @Then its total should be :total :currencyCode
     */
    public function itsTotalShouldBeUsd(float $total, string $currencyCode) : void
    {
        throw new PendingException();
    }

    /**
     * @When I try to add product :productName to my cart
     */
    public function tryToAddProductToMyCart(string $productName) : void
    {
        throw new PendingException();
    }

    /**
     * @Then my cart should not have :productName product inside
     */
    public function myCartShouldNotHaveProductInside(string $productName) : void
    {
        throw new PendingException();
    }



}
