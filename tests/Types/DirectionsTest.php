<?php

namespace Frolki1_Dev\Google\Embed\Tests\Types;

use Frolki1_Dev\Types\Directions;

class DirectionsTest extends TypeTestCase
{
    /**
     * @var Directions
     */
    protected $direction;

    public function setUp()
    {
        parent::setUp();

        $this->direction = $this->googleMaps->createDirectionsMap();
    }

    public function testOriginParameter()
    {
        $this->direction->start($this->location);

        $this->assertEquals($this->location, $this->direction->getParameter('origin'));
    }

    public function testDestinationParameter()
    {
        $this->direction->destination($this->location);

        $this->assertEquals($this->location, $this->direction->getParameter('destination'));
    }

    public function testOneWaypoint()
    {
        $this->direction->addWayPoint('Berlin, Deutschland');

        $this->assertCount(1, $this->direction->getParameter('waypoints'));
    }

    public function testMoreWaypoint()
    {
        $this->direction->addWayPoint('Berlin, Deutschland');
        $this->direction->addWayPoint('Köln, Deutschland');

        $this->assertCount(2, $this->direction->getParameter('waypoints'));
    }

    public function testMultiBuild()
    {
        $this->assertTrue(is_string(
            $this->direction
                ->start($this->location)
                ->addWayPoint('Berlin, Deutschland')
                ->addWayPoint('Köln, Deutschland')
                ->destination($this->location)
                ->getSource()));
    }

    public function testDrivingMode()
    {
        $this->direction->drivingMode();

        $this->assertEquals('driving', $this->direction->getParameter('mode'));
    }

    public function testWalkingMode()
    {
        $this->direction->walkingMode();

        $this->assertEquals('walking', $this->direction->getParameter('mode'));
    }

    public function testBicyclingMode()
    {
        $this->direction->bicyclingMode();

        $this->assertEquals('bicycling', $this->direction->getParameter('mode'));
    }

    public function testTransitMode()
    {
        $this->direction->transitMode();

        $this->assertEquals('transit', $this->direction->getParameter('mode'));
    }

    public function testFlyingMode()
    {
        $this->direction->flyingMode();

        $this->assertEquals('flying', $this->direction->getParameter('mode'));
    }

    public function testAvoidTolls()
    {
        $this->direction->avoidTolls();

        $this->assertTrue(is_array($this->direction->getParameter('avoid')));
    }

    public function testAvoidFerries()
    {
        $this->direction->avoidFerries();

        $this->assertTrue(is_array($this->direction->getParameter('avoid')));
    }

    public function testAvoidHighways()
    {
        $this->direction->avoidHighways();

        $this->assertTrue(is_array($this->direction->getParameter('avoid')));
    }

    public function testMetricUnit()
    {
        $this->direction->useMetricUnit();

        $this->assertEquals('metric', $this->direction->getParameter('units'));
    }

    public function testImperialUnit()
    {
        $this->direction->useImperialUnit();

        $this->assertEquals('imperial', $this->direction->getParameter('units'));
    }
}