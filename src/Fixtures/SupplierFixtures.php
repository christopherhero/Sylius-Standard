<?php

declare(strict_types=1);

namespace App\Fixtures;

use App\Entity\Supplier;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Generator;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Sylius\Bundle\FixturesBundle\Fixture\FixtureInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class SupplierFixtures extends AbstractFixture implements FixtureInterface
{
    /** @var FactoryInterface */
    private $supplierFactory;

    /** @var ObjectManager */
    private $supplierManager;

    /** @var Generator */
    private $generator;

    public function __construct(FactoryInterface $supplierFactory, ObjectManager $supplierManager, Generator $generator)
    {
        $this->supplierFactory = $supplierFactory;
        $this->supplierManager = $supplierManager;
        $this->generator = $generator;
    }


    public function load(array $options): void
    {
        for ($i = 0; $i < $options['count']; $i++) {
            /** @var Supplier $supplier */
            $supplier = $this->supplierFactory->createNew();
            $supplier->setEmail($this->generator->companyEmail);
            $supplier->setName($this->generator->company);

            $this->supplierManager->persist($supplier);
        }

        $this->supplierManager->flush();
    }

    public function getName(): string
    {
        return 'supplier';
    }

    public function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        $optionsNode
            ->children()
            ->integerNode('count')
        ;
    }
}
