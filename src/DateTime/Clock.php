<?php

declare(strict_types=1);

namespace App\DateTime;

class Clock implements ClockInterface
{
    /**
     * @return bool
     */
    public function isNight(): bool
    {
        $currentHour = (int) (new \DateTime())->format('H');

        return $currentHour > 19 || $currentHour < 6;
    }
}
