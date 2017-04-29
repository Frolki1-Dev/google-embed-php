<?php

namespace Frolki1_Dev\Types;

use Frolki1_Dev\Exceptions\NoApiKeyException;
use Frolki1_Dev\Exceptions\NoParameterException;

/**
 * The builder class to build the url
 *
 * @package Frolki1_Dev\Google\Maps\Embed
 */
abstract class AbstractBuilder
{
    /**
     * @const string Define the endpoint for the request
     */
    const ENDPOINT = 'https://www.google.com/maps/embed/v1/';

    /**
     * @var string Store the api key
     */
    protected $apiKey = '';

    /**
     * @var array Store all parameters for the request
     */
    protected $parameters = [];

    /**
     * @var string Define the type
     */
    public $type;

    /**
     * AbstractBuilder constructor.
     *
     * @param string $apiKey Set the api key
     */
    public function __construct(string $apiKey)
    {
        $this->setApiKey($apiKey);
    }

    /**
     * Set the location of the map view
     *
     * @param string $location Set a location (place, country, street or location name)
     *
     * @return $this
     */
    public function setLocation(string $location)
    {
        $this->parameters['q'] = $location;

        return $this;
    }

    /**
     * Set the center point of the map view
     *
     * @param float $latitude Set the latitude
     * @param float $longitude Set the longitude
     *
     * @return $this
     */
    public function setCenter(float $latitude, float $longitude)
    {
        $this->parameters['center'] = $latitude . ',' . $longitude;

        return $this;
    }

    /**
     * @param int $zoom Set the zoom level (0-21)
     *
     * @return $this
     */
    public function setZoom(int $zoom)
    {
        if ($zoom < 0 || $zoom > 21) {
            throw new \InvalidArgumentException('The zoom level mus be between 0 and 21.');
        }

        $this->parameters['zoom'] = $zoom;

        return $this;
    }

    /**
     * Set the language for the view
     *
     * @param string $language Set a language for the view
     *
     * @return $this
     */
    public function setLanguage(string $language)
    {
        $this->parameters['language'] = $language;

        return $this;
    }

    /**
     * Set the view to road map
     *
     * @return $this
     */
    public function useRoadMap()
    {
        $this->parameters['maptype'] = 'roadmap';

        return $this;
    }

    /**
     * Set the view to satellite
     *
     * @return $this
     */
    public function useSatelliteMap()
    {
        $this->parameters['maptype'] = 'satellite';

        return $this;
    }

    /**
     * Get a specific parameter
     *
     * @param string $key
     * @param string|null $default
     *
     * @return mixed
     */
    public function getParameter(string $key, string $default = null)
    {
        return (isset($this->parameters[$key]) ? $this->parameters[$key] : $default);
    }

    /**
     * Get all parameters
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Build the source
     *
     * @return string
     *
     * @throws NoApiKeyException
     * @throws NoParameterException
     */
    public function getSource()
    {
        if (!$this->hasApiKey()) {
            throw new NoApiKeyException('You must provide a api key to use the Google Embed service!');
        }

        if (!isset($this->type) || empty($this->type)) {
            throw new \InvalidArgumentException('In the class \'' . __CLASS__ . '\' has no type value.');
        }

        $url = self::ENDPOINT . $this->type . '?key=' . $this->getApiKey();

        if (empty($this->getParameters())) {
            throw new NoParameterException('You must give at least a location parameter!');
        }

        foreach ($this->getParameters() as $key => $val) {
            // Check if is an array
            if (is_array($val)) {
                $url .= '&' . $key . '=' . urlencode(implode('|', $val));
                /*foreach ($val as $i => $v) {
                    $v = urlencode($v);
                    if($i == 0) {
                        $url .= $v;
                    } else {
                        $url .= '|' . $v;
                    }
                }*/
            } else {
                $val = urlencode($val);
                $url .= '&' . $key . '=' . $val;
            }
        }

        return $url;
    }

    /**
     * Create a IFrame with the map source
     *
     * @param int $width Define the width
     * @param int $height Define the height
     *
     * @return string
     */
    public function getIFrame(int $width, int $height)
    {
        return '<iframe width="' . $width . 'px" height="' . $height . 'px" frameborder="0" style="border:0" allowfullscreen src="' . $this->getSource() . '"></iframe>';
    }

    /**
     * Save the key
     *
     * @param string $key
     *
     * @return void
     */
    public function setApiKey(string $key)
    {
        $this->apiKey = $key;
    }

    /**
     * Get the api key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Check if an api key exists
     *
     * @return bool
     */
    public function hasApiKey()
    {
        return !empty($this->apiKey);
    }
}