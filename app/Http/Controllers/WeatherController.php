<?php
/**
 * Main page controller to tie together to api logic
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Helpers;
use App\Classes\FreeGeoIp;
use App\Classes\OpenWeather;
use Carbon\Carbon;
use Exception;
use Throwable;

class WeatherController extends Controller
{
    public function home() {
        $freegeoip = new FreeGeoIp();
        $openweather = new OpenWeather();

        // If user has not submitted a search
        if (empty($_GET['search'])) {

            // Get user's real IP address
            $ip = Helpers::getIpAddress();

            // Look up the users location from their IP address
            try {
                $location = $freegeoip->lookupAddress($ip);
            } catch(Throwable $e) {
                throw new Exception($e->getMessage());
            }

            // Look up the weather from OpenWeather by latitude/longitude
            // I chose latt/long because the city name lookup can have collisions
            try {
                $weather = $openweather->searchByLattLong($location);
            } catch(Throwable $e) {
                throw new Exception($e->getMessage());
            }
        } else {
             // Use search location instead of user's location

            // Look up the OpenWeather "Where On Earth ID" (woeid) by city name
            // Less accurate than latt/long
            try {
                $location_results = $openweather->searchByCityName($_GET['search']);
                // d($location_results);
            } catch(Throwable $e) {
                return view('error');
            }
       }

        return view('home')->with(['weather' => $weather, 'city' => $location->city]);
    }
}
