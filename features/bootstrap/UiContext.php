<?php

use App\Entity\Money;
use App\Entity\Product;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Mink\Element\NodeElement;
use Behat\MinkExtension\Context\MinkContext;
use Doctrine\Common\Persistence\ObjectManager;
use Webmozart\Assert\Assert;


final class UiContext extends MinkContext implements Context
{
    /** @var ObjectManager */
    private $objectMenager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectMenager = $objectManager;
    }

    public function purgeDatabase()
    {
        
    }

    /**
     * @Given there is a product :productName that coast :price :currencyCode
     */
    public function thereIsProduct(string $productName, float $price, string $currencyCode) : void
    {
        $product = new Product($productName,new Money($price,$currencyCode));

        $this->objectMenager->persist($product);
        $this->objectMenager->flush();
    }

    /**
     * @When I add product :productName to my cart
     */
    public function addProductToMyCart(string $productName) : void
    {
        /** @var Product $product */
        $product = $this
            ->objectMenager
            ->getRepository(Product::class)
            ->findOneBy(['name'=> $productName])
        ;

        $this->visitPath('/products/'.$product->getId());
        $this->pressButton('Add to cart');
    }

    /**
     * @Then my cart should have :productName product inside
     */
    public function myCartShouldHaveProductInside(string $productName) : void
    {
        $this->visitPath('/cart');

        Assert::notNull(
            $this->findElement(sprintf('#products tr:contains("%s")',$productName))
        );
    }

    /**
     * @Then its total should be :total :currencyCode
     */
    public function itsTotalShouldBe(float $total, string $currencyCode) : void
    {
        Assert::same(
            $this->findElement('#cart-total')->getText(),$total . ' ' . $currencyCode
        );
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

    private function  findElement(string $selector) : ?NodeElement
    {
        return $page = $this->getSession()->getPage()->find('css',$selector);
    }



}
