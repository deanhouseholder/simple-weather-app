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
            // I chose lat/lon because the city name lookup can have collisions
            try {
                $weather = $openweather->searchByLatLon($location);
            } catch(Throwable $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            // Use search location instead of user's location
            try {
                // Look up the lat/lon by city name
                $location = $openweather->searchByCityName(trim($_GET['search']));

                // Fetch the weather
                try {
                    $weather = $openweather->searchByLatLon($location);
                } catch(Throwable $e) {
                    throw new Exception($e->getMessage());
                }
            } catch(Throwable $e) {
                return view('error');
            }
       }

        return view('home')->with(['weather' => $weather, 'city' => $location->city]);
    }
}
