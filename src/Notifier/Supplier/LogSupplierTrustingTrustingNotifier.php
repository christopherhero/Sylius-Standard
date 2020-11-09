<?php

declare(strict_types=1);

namespace App\Notifier\Supplier;

use App\Entity\SupplierInterface;
use Psr\Log\LoggerInterface;

final class LogSupplierTrustingTrustingNotifier implements SupplierTrustingNotifierInterface
{
    private const NOTIFY_MESSAGE = 'Supplier `%s` has just been trusted.';

    /** @var LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function notify(SupplierInterface $supplier): void
    {
        $this->logger->info(sprintf(self::NOTIFY_MESSAGE, $supplier->getName()));
    }
}
