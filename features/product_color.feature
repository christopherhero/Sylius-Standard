@managing_products
Feature: Assigning color of an existing product
  In order to assigning color to product
  As an Administrator
  I want to be able to assign color to product

  Background:
    Given the store has a product "Black mug"
    And I am logged in as an administrator

  Scenario: Assigning color of an existing product
    Given the "Black mug" product is tracked by the inventory
    And I want to modify the "Black mug" product
    When I assign "blue" color to "Dice Brewing" product
    And I save my changes
    Then Product "Black mug" have "blue" color

