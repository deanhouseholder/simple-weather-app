<?php
/**
 * OpenWeather class to communicate with openweathermap.org API
 * https://api.openweathermap.org/data/2.5/weather?lat={lat}&lon={lon}&appid={API key}
 */

namespace App\Classes;

use GuzzleHttp\Client as Guzzle;

class OpenWeather
{
    private $guzzle;
    private $token;

    public function __construct() {
        // Set up Guzzle client
        $this->guzzle = new Guzzle();
        $this->token = config('app.openweather_token');
    }

    // Look up Weather for lat/lon coordinates
    public function searchByLatLon($location = null) {
        // Check for empty input
        if (empty($location)) {
            throw new \Exception('No $location passed to ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }

        // Build url
        $url  = 'https://api.openweathermap.org/data/3.0/onecall?lat=' . $location->latitude;
        $url .= '&lon=' . $location->longitude . '&appid=' . $this->token . '&units=imperial';

        // Fetch data from API
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

    // Look up lat/lon by city name
    public function searchByCityName($location = null) {
        // Check for empty input
        if (empty($location)) {
            throw new \Exception('No $location passed to ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }

        // Fetch data from API
        $url = 'https://api.openweathermap.org/geo/1.0/direct?q=' . $location . '&appid=' . $this->token;
        $response = $this->guzzle->get($url);

        // Return response or throw exception
        if ($response->getStatusCode() == 200) {
            $json = $response->getBody()->getContents();
            $data = json_decode($json);
            if (isset($data[0])) {
                // Build the structure that will be needed by the searchByLatLon method
                $return            = new \stdClass();
                $return->latitude  = $data[0]->lat;
                $return->longitude = $data[0]->lon;
                $return->city      = $data[0]->name;
                return $return;
            } else {
                throw new \Exception("No results returned");
            }
        } else {
            throw new \Exception('Failed to get successful response from MetaWeather API: ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }
    }
}
