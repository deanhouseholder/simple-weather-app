<?php
/**
 * FreeGeoIp class to communicate with freegeoip.app API
 */

namespace App\Classes;

use GuzzleHttp\Client as Guzzle;

class FreeGeoIp
{
    private $guzzle;

    public function __construct() {
        // Set up Guzzle client
        $this->guzzle = new Guzzle();
    }

    // Look up the location by IP address
    public function lookupAddress($ip = null) {
        // Check for empty input
        if (empty($ip)) {
            throw new \Exception('No $ip passed to ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }

        // Fetch data from API
        $url = "https://freegeoip.app/json/" . $ip;
        $response = $this->guzzle->get($url);

        // Return response or throw exception
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            throw new \Exception('Failed to get successful response from FreeGeoIp API: ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }
    }
}
