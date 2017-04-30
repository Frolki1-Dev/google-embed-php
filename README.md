# Google Embed PHP

[![Build Status](https://travis-ci.org/Frolki1-Dev/google-embed-php.svg?branch=master)](https://travis-ci.org/Frolki1-Dev/google-embed-php)
[![codecov](https://codecov.io/gh/Frolki1-Dev/google-embed-php/branch/master/graph/badge.svg)](https://codecov.io/gh/Frolki1-Dev/google-embed-php)
[![GitHub issues](https://img.shields.io/github/issues/Frolki1-Dev/google-embed-php.svg)](https://github.com/Frolki1-Dev/google-embed-php/issues)
[![Packagist](https://img.shields.io/packagist/dt/https://github.com/Frolki1-Dev/google-embed-php.svg)](https://github.com/Frolki1-Dev/google-embed-php)
[![Packagist](https://img.shields.io/packagist/v/Frolki1-Dev/google-embed-php.svg)](https://github.com/Frolki1-Dev/google-embed-php)
[![Packagist Pre Release](https://img.shields.io/packagist/vpre/Frolki1-Dev/google-embed-php.svg)](https://github.com/Frolki1-Dev/google-embed-php)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/Frolki1-Dev/google-embed-php/master/LICENSE)

Use the Embed API of Google Maps with PHP

## Requirement

To use this library you must have at least PHP 7.0.

## Installation

The Google Embed can be installed with [Composer](https://getcomposer.org/). Run this command:

```sh
composer require frolki1_dev/google-embed-php
```

## Usage

To use this library you must have an api key. You can get the free version because you can use the embed api for free.

```php
use Frolki1_Dev\GoogleEmbedMap;

$maps = new GoogleEmbedMap(<Add here your api key>);

// Create a direction map
$direction = $maps->createDirectionsMap();

// Create a place map
$place = $maps->createPlaceMap();

// Crsate a search map
$search = $maps->createSearchMap();

// Create a view map
$view = $maps->createViewMap();
```

## Options

You have the following options in every map type:

```php
// Set a location (street, location, place)
$mapType->setLocation(<string>);

// Set the center of the view (latitude and longitude)
$mapType->setCenter(<float>, <float>);

// Set the zoom factor (0 - 21, 0 = Whole world, 21 = A single building)
$mapType->setZoom(<int>);

// Define the UI language
$mapType->setLanguage(<string>);

// Show the map as a road map
$mapType->useRoadMap();

// Show the map as a satellite map
$mapType->useSatelliteMap();

// Get the source (url)
$mapType->getSource();

// Build a iframe
$mapType->getIFrame();
```

### Direction options

The direction map has also the options and the following methods:

```php
// How the method setLocation but only the start point
$direction->start(<string>);

// Same how method start but only the destination point
$direction->destination(<string>);

// Add waypoints (Can be multiple called)
$direction->addWayPoint(<string>);

// Calculate the route with the car
$direction->drivingMode();

// Calculate the route with walking
$direction->walkingMode();

// Calculate the route with biking
$direction->bicyclingMode();

// Calclate the route with flying
$direction->flyingMode();

// Avoid tolls
$direction->avoidTolls();

// Avoid Ferry
$direction->avoidFerries();

// Avoid Highway
$dircetion->avoidHighways();

// Use the metric unit
$direction->useMetricUnit();

// Use the imperial unit
$direction->useImperialUnit();
```

## License

This library is an open source project and is licensed under the [MIT license](http://opensource.org/licenses/MIT).