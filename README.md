# Simple Weather App

Made for eSalon by Dean Householder on 23 Mar 2021
Updated for Swoogo on 19 Dec 2022 to use OpenWeather API instead of MetaWeather
Hosted on https://weather.deanhouseholder.com/


## Files added/modified include:
| File path                                                                                                                                                         | Description                                               |
| ----------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------- |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/app/Classes/FreeGeoIp.php">app/Classes/FreeGeoIp.php</a>                                 | FreeGeoIp class to communicate with freegeoip.app API     |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/app/Classes/Helpers.php">app/Classes/Helpers.php</a>                                     | Helpers class to provide one-off functions                |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/app/Classes/MetaWeather.php">app/Classes/MetaWeather.php</a>                             | MetaWeather class to communicate with metaweather.com API |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/app/Http/Controllers/WeatherController.php">app/Controllers/WeatherController.php</a>    | Main page controller to tie together to api logic         |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/public/img/">public/img/*</a>                                                            | Uploaded various images                                   |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/public/favicon.ico">public/favicon.ico</a>                                               | Added a weather favicon                                   |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/resources/sass/app.scss">resources/sass/app.scss</a>                                     | Added custom styles in SCSS                               |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/resources/views/home.blade.php">resources/views/home.blade.php</a>                       | Main view for displaying weather data                     |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/resources/views/error.blade.php">resources/views/error.blade.php</a>                     | Error view for when city is not found                     |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/resources/views/snippets/footer.blade.php">resources/views/snippets/footer.blade.php</a> | Site Footer                                               |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/resources/views/snippets/header.blade.php">resources/views/snippets/header.blade.php</a> | Site Header                                               |
| <a href="https://github.com/deanhouseholder/simple-weather-app/blob/main/routes/web.php">routes/web.php</a>                                                       | Added the main route                                      |

Implemented in Laravel/Bootstrap, as requested.
Used https://freegeoip.app/ and https://www.metaweather.com/api/ as requested. (Updated later to use MetaWeather)

See inline comments for walk-through.

I completed this project in about 6 hours. If I had more time, I would add tests, scrub user input, add a solution to missing cities, and improve the icons.
