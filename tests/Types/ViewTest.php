<?php
namespace Frolki1_Dev\Google\Embed\Tests\Types;


class ViewTest extends TypeTestCase
{
    public function testLocationParameter()
    {
        $place = $this->googleMaps->createViewMap();

        $place->setLocation($this->location);

        $this->assertNotEquals($this->location, $place->getParameter('q'));
    }
}