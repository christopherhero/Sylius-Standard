<?php

declare(strict_types=1);

namespace App\DateTime;

final class Clock implements ClockInterface
{
    /** @var \DateTime */
    private $currentDateTime;

    public function __construct()
    {
        $this->currentDateTime = new \DateTime();
    }

    public function isNight(): bool
    {
        $currentDateTime = $this->currentDateTime;
        $currentDateTime->modify('today ' . $currentDateTime->format('H:i'));
        $currentHour = $currentDateTime->format('H');

        return ($currentHour > 19 || $currentHour < 6);
    }
}
