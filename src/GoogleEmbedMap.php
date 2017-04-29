<?php
namespace Frolki1_Dev;
use Frolki1_Dev\Types\Directions;
use Frolki1_Dev\Types\Place;
use Frolki1_Dev\Types\Search;
use Frolki1_Dev\Types\StreetView;
use Frolki1_Dev\Types\View;

/**
 * Init class for the Google Embed lib
 *
 * @package Frolki1_Dev
 */
class GoogleEmbedMap
{
    /**
     * @var string Store the api key
     */
    private $apiKey;

    /**
     * GoogleEmbedMap constructor.
     *
     * @param string $apiKey Save the api key
     */
    public function __construct(string $apiKey = '')
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Create a new direction map
     *
     * @see https://developers.google.com/maps/documentation/embed/guide?refresh=1#modus_directions
     *
     * @return Directions
     */
    public function createDirectionsMap()
    {
        return new Directions($this->apiKey);
    }

    /**
     * Create a new place map
     *
     * @see https://developers.google.com/maps/documentation/embed/guide?refresh=1#modus_place
     *
     * @return Place
     */
    public function createPlaceMap()
    {
        return new Place($this->apiKey);
    }

    /**
     * Create a new search map
     *
     * @see https://developers.google.com/maps/documentation/embed/guide?refresh=1#modus_search
     *
     * @return Search
     */
    public function createSearchMap()
    {
        return new Search($this->apiKey);
    }

    /**
     * Create a new view map
     *
     * @see https://developers.google.com/maps/documentation/embed/guide?refresh=1#modus_view
     *
     * @return View
     */
    public function createViewMap()
    {
        return new View($this->apiKey);
    }
}