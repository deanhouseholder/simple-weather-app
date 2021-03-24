<?php
/**
 * MetaWeather class to communciate with metaweather.com API
 */

namespace App\Classes;

use GuzzleHttp\Client as Guzzle;

class MetaWeather
{
    private $guzzle;

    public function __construct() {
        // Set up Guzzle client
        $this->guzzle = new Guzzle();
    }

    // Look up woeid by latt/long coordinates
    public function searchByLattLong($location = null) {
        // Check for empty input
        if (empty($location)) {
            throw new \Exception('No $location passed to ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }

        // Build url
        $lattlong = $location->latitude . ',' . $location->longitude;
        $url = 'https://www.metaweather.com/api/location/search/?lattlong=' . $lattlong;

        // Fetch data from API
        $response = $this->guzzle->get($url);

        // Return response or throw exception
        if ($response->getStatusCode() == 200) {
            $json = $response->getBody()->getContents();
            $data = json_decode($json);
            return $data[0];
        } else {
            throw new \Exception('Failed to get successful response from MetaWeather API: ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }
    }

    // Look up woeid by city name
    public function searchByCityName($location = null) {
        // Check for empty input
        if (empty($location)) {
            throw new \Exception('No $location passed to ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }

        // Fetch data from API
        $url = 'https://www.metaweather.com/api/location/search/?query=' . $location;
        $response = $this->guzzle->get($url);

        // Return response or throw exception
        if ($response->getStatusCode() == 200) {
            $json = $response->getBody()->getContents();
            $data = json_decode($json);
            if (isset($data[0])) {
                return $data[0];
            } else {
                throw new \Exception("No results returned");
            }
        } else {
            throw new \Exception('Failed to get successful response from MetaWeather API: ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }
    }

    public function getWeather($woeid = null) {
        // Check for empty input
        if (empty($woeid)) {
            throw new \Exception('No $woeid passed to ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }

        // Fetch data from API
        $url = 'https://www.metaweather.com/api/location/' . $woeid;
        $response = $this->guzzle->get($url);

        // Return response or throw exception
        if ($response->getStatusCode() == 200) {
            $json = $response->getBody()->getContents();
            $data = json_decode($json);
            return $data;
        } else {
            throw new \Exception('Failed to get successful response from MetaWeather API: ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }
    }
}
