<?php

/**
 * Weather Monitor
 *
 * An example class for monitoring the weather
 */
class WeatherMonitor
{

    /**
     * Temperature service
     * @var TemperatureService
     */
    protected $service;

    /**
     * Constructor
     *
     * @param TemperatureService $service Temperature service dependency
     *
     * @return void
     */
    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    /**
     * Get the average temperature between two times
     *
     * @param string $start Start time hh:mm
     * @param string $end End time hh:mm
     *
     * @return int
     */
    public function getAverageTemperature(string $start, string $end)
    {
        $start_temp = $this->service->getTemperature($start);
        $end_temp = $this->service->getTemperature($end);

        return ($start_temp + $end_temp) / 2;
    }
}
