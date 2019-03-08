Feature: Not being able to add non-existent product to a cart
    In order not to be able to buy product that is unavailable
    As Customer
    I want not to be able to add a non-existent product to a cart

    Background:
        Given there is a product "Jelly Beans" that coast 100.00 USD

    @domain
    Scenario: Not being able to a non-existent product ro a cart
        When I add product "Jelly Beans" to my cart
        And I try to add product "PHP Mug" to my cart
        Then my cart should have "Jelly Beans" product inside
        But my cart should not have "PHP Mug" product inside
        And its total should be 100.00 USD


