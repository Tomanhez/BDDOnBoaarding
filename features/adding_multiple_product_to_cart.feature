Feature: Adding multipleproducts to cart
    In order to be able to buy some goods in certain quantity
    As a Customer
    I want to be able to add multiple products to a cart

    Background:
        Given there is a product "Jelly Beans" that coast 100.00 USD
        And there is a product "PHP Mug" that coast 50.00 USD

    @ui
    Scenario:  Adding multiple product to cart
        When I add product "Jelly Beans" to my cart
        And I add product "PHP Mug" to my cart
        Then my cart should have "Jelly Beans" product inside
        And my cart should have "PHP Mug" product inside
        And its total should be 150.00 USD

