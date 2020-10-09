<?php

declare(strict_types=1);

namespace Behat\Context;

use Behat\Behat\Context\Context;
use Sylius\Component\Core\Model\ProductInterface;

class ProductAdminContext implements Context
{
    public function __construct()
    {
    }

    /**
     * @When /^I change :product color to :color
     */
    public function iChangeItsColorTo(ProductInterface $product, string $color)
    {
    }
}
