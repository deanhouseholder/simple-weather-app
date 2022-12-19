<?php
/**
 * FreeGeoIp class to communicate with freegeoip.app API
 */

namespace App\Classes;

use GuzzleHttp\Client as Guzzle;

class FreeGeoIp
{
    private $guzzle;
    private $token;

    public function __construct() {
        // Set up Guzzle client
        $this->guzzle = new Guzzle();
        $this->token = config('app.freegeoip_token');
    }

    // Look up the location by IP address
    public function lookupAddress($ip = null) {
        // Check for empty input
        if (empty($ip)) {
            throw new \Exception('No $ip passed to ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }

        // Fetch data from API
        $url = "http://api.ipstack.com/" . $ip . "?access_key=" . $this->token;
        $response = $this->guzzle->get($url);
        // Example response:
        // {"ip": "134.201.250.155", "type": "ipv4", "continent_code": "NA", "continent_name": "North America", "country_code": "US", "country_name": "United States", "region_code": "CA", "region_name": "California", "city": "Los Angeles", "zip": "90012", "latitude": 34.0655517578125, "longitude": -118.24053955078125, "location": {"geoname_id": 5368361, "capital": "Washington D.C.", "languages": [{"code": "en", "name": "English", "native": "English"}], "country_flag": "https://assets.ipstack.com/flags/us.svg", "country_flag_emoji": "\ud83c\uddfa\ud83c\uddf8", "country_flag_emoji_unicode": "U+1F1FA U+1F1F8", "calling_code": "1", "is_eu": false}}

        // Return response or throw exception
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            throw new \Exception('Failed to get successful response from FreeGeoIp API: ' . __CLASS__ . '::' . __FUNCTION__ . '() on line ' . __LINE__);
        }
    }
}
