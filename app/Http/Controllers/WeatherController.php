<?php
/**
 * Main page controller to tie together to api logic
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Helpers;
use App\Classes\FreeGeoIp;
use App\Classes\MetaWeather;
use Carbon\Carbon;
use Exception;
use Throwable;

class WeatherController extends Controller
{
    public function home() {
        $freegeoip = new FreeGeoIp();
        $metaweather = new MetaWeather();

        // If user has not submitted a search
        if (empty($_GET['search'])) {

            // Get user's real IP address
            $ip = Helpers::getIpAddress();

            // Look up the users location from their IP address
            try {
                $location = $freegeoip->lookupAddress($ip);
                // d($location);
            } catch(Throwable $e) {
                throw new Exception($e->getMessage());
            }

            // Look up the MetaWeather "Where On Earth ID" (woeid) by latitude/longitude
            // I chose latt/long because the city name lookup is not precise (collisions)
            try {
                $location_results = $metaweather->searchByLattLong($location);
                // d($location_results);
            } catch(Throwable $e) {
                throw new Exception($e->getMessage());
            }
        } else {
             // Use search location instead of user's location

            // Look up the MetaWeather "Where On Earth ID" (woeid) by city name
            // Less accurate than latt/long
            try {
                $location_results = $metaweather->searchByCityName($_GET['search']);
                // d($location_results);
            } catch(Throwable $e) {
                return view('error');
            }
       }

        // Look up the MetaWeather weather report by "Where On Earth ID" (woeid)
        try {
            $weather = $metaweather->getWeather($location_results->woeid);
            // d($weather);
        } catch(Throwable $e) {
            throw new Exception($e->getMessage());
        }

        return view('home')->with(['weather' => $weather]);
    }
}
