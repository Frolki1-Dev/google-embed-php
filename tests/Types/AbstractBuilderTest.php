<?php
namespace Frolki1_Dev\Google\Embed\Tests\Types;

use Frolki1_Dev\Exceptions\NoParameterException;
use Frolki1_Dev\Types\AbstractBuilder;

class AbstractBuilderTest extends TypeTestCase
{
    public function testNoTypeDefined()
    {
        $this->expectException(\InvalidArgumentException::class);

        $place = $this->googleMaps->createPlaceMap();
        $place->type = "";
        $place->setLocation($this->location)->getSource();
    }

    public function testWithoutParameters()
    {
        $this->expectException(NoParameterException::class);

        $place = $this->googleMaps->createPlaceMap();
        $place->getSource();
    }

    public function testGetApiKey()
    {
        $this->assertEquals(getenv('API_KEY'), $this->googleMaps->createPlaceMap()->getApiKey());
    }

    public function testLocationParameter()
    {
        $place = $this->googleMaps->createPlaceMap();

        $place->setLocation($this->location);

        $this->assertEquals($this->location, $place->getParameter('q'));
    }

    public function testLatAndLonParameter()
    {
        $place = $this->googleMaps->createPlaceMap();

        $place->setCenter($this->lat, $this->lon);

        $this->assertEquals($this->lat . ',' . $this->lon, $place->getParameter('center'));
    }

    public function testTooLowZoom()
    {
        $this->expectException(\InvalidArgumentException::class);

        $place = $this->googleMaps->createPlaceMap();

        $place->setZoom(-1);
    }

    public function testHeighLowZoom()
    {
        $this->expectException(\InvalidArgumentException::class);

        $place = $this->googleMaps->createPlaceMap();

        $place->setZoom(22);
    }

    public function testZoomParameter()
    {
        $place = $this->googleMaps->createPlaceMap();

        $place->setZoom(18);

        $this->assertEquals(18, $place->getParameter('zoom'));
    }

    public function testRoadMap()
    {
        $place = $this->googleMaps->createPlaceMap();

        $place->useRoadMap();

        $this->assertEquals('roadmap', $place->getParameter('maptype'));
    }

    public function testSatelliteMap()
    {
        $place = $this->googleMaps->createPlaceMap();

        $place->useSatelliteMap();

        $this->assertEquals('satellite', $place->getParameter('maptype'));
    }

    public function testLanguageParameter()
    {
        $place = $this->googleMaps->createPlaceMap();

        $place->setLanguage('de');

        $this->assertEquals('de', $place->getParameter('language'));
    }

    public function testIFrame()
    {
        $place = $this->googleMaps->createPlaceMap();

        $this->assertStringStartsWith('<iframe', $place->setLocation($this->location)->getIFrame(250, 250));
    }
}