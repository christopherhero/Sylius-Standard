<?php

declare(strict_types=1);

namespace App\Notifier\Supplier;

use App\Entity\SupplierInterface;
use App\Notifier\NotifierInterface;

interface SupplierTrustingNotifierInterface
{
    public function notify(SupplierInterface $supplier): void;
}
