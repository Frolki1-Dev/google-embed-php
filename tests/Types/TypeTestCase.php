<?php
namespace Frolki1_Dev\Google\Embed\Tests\Types;

use Frolki1_Dev\GoogleEmbedMap;
use PHPUnit\Framework\TestCase;

class TypeTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $location = 'St. Gallen, Schweiz';

    protected $lat = -55.6789;
    protected $lon = 97.8909;

    /**
     * @var GoogleEmbedMap
     */
    public $googleMaps;

    public function setUp()
    {
        $this->googleMaps = new GoogleEmbedMap(getenv('API_KEY'));
    }
}