<?php

namespace App\Services\Parking\Price;

use App\Enums\VehicleType;
use App\Models\Parking;
use App\Services\Parking\Price\Contracts\IParkingPrice;
use Carbon\Carbon;

abstract class ParkingParkingPrice implements IParkingPrice
{
    private const PERMANENCE_MINUTES_FREE = 15;

    protected float $initialPrice = 0.00;
    protected ?float $pricePerHalfHour = null;

    public function __construct(private readonly Parking $parking)
    {
    }

    /**
     * @return array
     */
    private function getPermanenceTimes(): array
    {
        $minutes = Carbon::now(
            new \DateTimeZone('America/Sao_Paulo')
        )->diffInMinutes($this->parking->entrance_time);

        $halfs = 0;
        if ($minutes >= 60) {
            $halfs = floor(($minutes - 60) / 30);
        }

        return [
            'minutes' => $minutes,
            'halfs' => (int)round($halfs)
        ];
    }

    private function willChargeInitialPrice(array $permanence): bool
    {
        return $permanence['halfs'] === 0 || is_null($this->pricePerHalfHour);
    }

    public function calculate(): float|int
    {
        $permanence = $this->getPermanenceTimes();
        if ($permanence <= self::PERMANENCE_MINUTES_FREE) return 0;
        if ($this->willChargeInitialPrice($permanence)) return $this->initialPrice;

        return $this->initialPrice + ($this->pricePerHalfHour * $permanence['halfs']);
    }
}
