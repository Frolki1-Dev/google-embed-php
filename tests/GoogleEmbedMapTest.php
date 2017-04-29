<?php
namespace Frolki1_Dev\Google\Embed\Tests;

use Frolki1_Dev\GoogleEmbedMap;
use Frolki1_Dev\Types\Directions;
use Frolki1_Dev\Types\Place;
use Frolki1_Dev\Types\Search;
use Frolki1_Dev\Types\View;
use PHPUnit\Framework\TestCase;
use Frolki1_Dev\Exceptions\NoApiKeyException;

class GoogleEmbedMapTest extends TestCase
{
    /**
     * @var string
     */
    private $location = 'St. Gallen, Schweiz';

    /**
     * @var GoogleEmbedMap
     */
    protected $googleMaps;

    public function setUp()
    {
        $this->googleMaps = new GoogleEmbedMap(getenv('API_KEY'));
    }

    public function testGoogleMapsWithoutAPIKey()
    {
        $this->expectException(NoApiKeyException::class);

        $gm = new GoogleEmbedMap();
        $gm->createPlaceMap()->setLocation($this->location)->getSource();
    }

    public function testCreatePlaceMap()
    {
        $this->assertInstanceOf(Place::class, $this->googleMaps->createPlaceMap());
    }

    public function testCreateDirectionMap()
    {
        $this->assertInstanceOf(Directions::class, $this->googleMaps->createDirectionsMap());
    }

    public function testCreateSearchMap()
    {
        $this->assertInstanceOf(Search::class, $this->googleMaps->createSearchMap());
    }

    public function testCreateViewMap()
    {
        $this->assertInstanceOf(View::class, $this->googleMaps->createViewMap());
    }
}