# Simple Weather App

Made for eSalon by Dean Householder on 23 Mar 2021
Updated on 19 Dec 2022 to use OpenWeather API instead of MetaWeather
Hosted on https://weather.deanhouseholder.com/

Original requirements were to build a simple weather app using a modern framework which
fetches the latitude/longitude for the user's IP from the freegeoip.app API. Then to looks
up the weather from the metaweather.com API. Then displays it on a clean web interface.
While this could've been a javascript-based app entirely, the focus was on PHP backend skills.

2023 - MetaWeather is now defunct so I re-engineered it to use the OpenWeatherMap.org API instead.

## Files added/modified include:
| File path                                                                                                                                                         | Description
| ----------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/app/Classes/FreeGeoIp.php">app/Classes/FreeGeoIp.php</a>                                 | FreeGeoIp class to communicate with freegeoip.app API
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/app/Classes/Helpers.php">app/Classes/Helpers.php</a>                                     | Helpers class to provide one-off functions
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/app/Classes/OpenWeather.php">app/Classes/OpenWeather.php</a>                             | OpenWeather class to communicate with openweathermap.org API
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/app/Http/Controllers/WeatherController.php">app/Controllers/WeatherController.php</a>    | Main page controller to tie together to api logic
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/config/app.php">app/config/app.php</a>                                                   | Defined configuration variables in the App config
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/public/img/">public/img/*</a>                                                            | Uploaded various images
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/public/favicon.ico">public/favicon.ico</a>                                               | Added a weather favicon
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/resources/sass/app.scss">resources/sass/app.scss</a>                                     | Added custom styles in SCSS
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/resources/views/home.blade.php">resources/views/home.blade.php</a>                       | Main view for displaying weather data
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/resources/views/error.blade.php">resources/views/error.blade.php</a>                     | Error view for when city is not found
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/resources/views/snippets/footer.blade.php">resources/views/snippets/footer.blade.php</a> | Site Footer
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/resources/views/snippets/header.blade.php">resources/views/snippets/header.blade.php</a> | Site Header
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/routes/web.php">routes/web.php</a>                                                       | Added the main route

Implemented in Laravel/Bootstrap, as requested.
Used https://freegeoip.app/ and https://www.metaweather.com/api/ as requested. Updated later to use https://openweathermap.org/.

See inline comments for walk-through.

I completed this project in about 6 hours. If I had more time, I would add tests, scrub user input, add a solution to missing cities, and improve the icons.
