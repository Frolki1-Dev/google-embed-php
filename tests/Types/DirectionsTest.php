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
}