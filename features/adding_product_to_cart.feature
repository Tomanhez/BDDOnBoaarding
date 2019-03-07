Feature: Adding product to cart
    In order to be able to buy some goods
    As a Customer
    I want to be able to add a product to a cart

    Background:
        Given there is a product "Jelly Beans" that coast 100.00 USD
    @domain @ui
    Scenario: Adding a single product to the cart
        When I add product "Jelly Beans" to my cart
        Then my cart should have "Jelly Beans" product inside
        And its total should be 100.00 USD