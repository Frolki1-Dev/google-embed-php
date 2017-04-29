<?php
namespace Frolki1_Dev\Types;

class Directions extends AbstractBuilder
{
    public $type = 'directions';

    /**
     * Set the start point
     *
     * @param string $location Set a location (place, country, street or location name)
     *
     * @return $this
     */
    public function start(string $location)
    {
        $this->parameters['origin'] = $location;

        return $this;
    }

    /**
     * Set the destination point
     *
     * @param string $location Set a location (place, country, street or location name)
     *
     * @return $this
     */
    public function destination(string $location)
    {
        $this->parameters['destination'] = $location;

        return $this;
    }

    /**
     * Add a new waypoint
     *
     * @param string $location Set a location (place, country, street or location name)
     *
     * @return $this
     */
    public function addWayPoint(string $location)
    {
        $this->parameters['waypoints'][] = $location;

        return $this;
    }

    /**
     * Set the mode to driving (Use the car)
     *
     * @return $this
     */
    public function drivingMode()
    {
        $this->parameters['mode'] = 'driving';

        return $this;
    }

    /**
     * Set the mode to walking
     *
     * @return $this
     */
    public function walkingMode()
    {
        $this->parameters['mode'] = 'walking';

        return $this;
    }

    /**
     * Set the mode to bicycling
     *
     * @return $this
     */
    public function bicyclingMode()
    {
        $this->parameters['mode'] = 'bicycling';

        return $this;
    }

    /**
     * Set the mode to transit
     *
     * @return $this
     */
    public function transitMode()
    {
        $this->parameters['mode'] = 'transit';

        return $this;
    }

    /**
     * Set the mode to flying
     *
     * @return $this
     */
    public function flyingMode()
    {
        $this->parameters['mode'] = 'flying';

        return $this;
    }

    /**
     * Avoid tolls
     *
     * @return $this
     */
    public function avoidTolls()
    {
        $this->parameters['avoid'][] = 'tolls';

        return $this;
    }

    /**
     * Avoid ferries
     *
     * @return $this
     */
    public function avoidFerries()
    {
        $this->parameters['avoid'][] = 'ferries';

        return $this;
    }

    /**
     * Avoid highways
     *
     * @return $this
     */
    public function avoidHighways()
    {
        $this->parameters['avoid'][] = 'highways';

        return $this;
    }

    /**
     * Use the metric unit
     *
     * @return $this
     */
    public function useMetricUnit()
    {
        $this->parameters['units'] = 'metric';

        return $this;
    }

    /**
     * Use the imperial unit
     *
     * @return $this
     */
    public function useImperialUnit()
    {
        $this->parameters['units'] = 'imperial';

        return $this;
    }
}