# Simple Weather App

Made for eSalon by Dean Householder on 23 Mar 2021
Hosted on https://weather.deanhouseholder.com/


## Files added/modified include:
| File path                                 | Description                                               |
| ----------------------------------------- | --------------------------------------------------------- |
| app/Classes/FreeGeoIp.php                 | FreeGeoIp class to communicate with freegeoip.app API     |
| app/Classes/Helpers.php                   | Helpers class to provide one-off functions                |
| app/Classes/MetaWeather.php               | MetaWeather class to communicate with metaweather.com API |
| app/Controllers/WeatherController.php     | Main page controller to tie together to api logic         |
| public/img/*                              | Uploaded various images                                   |
| public/favicon.ico                        | Added a weather favicon                                   |
| resources/sass/app.scss                   | Added custom styles in SCSS                               |
| resources/views/home.blade.php            | Main view for displaying weather data                     |
| resources/views/error.blade.php           | Error view for when city is not found                     |
| resources/views/snippets/footer.blade.php | Site Footer                                               |
| resources/views/snippets/header.blade.php | Site Header                                               |
| routes/web.php                            | Added the main route                                      |

Implemented in Laravel/Bootstrap, as requested.
Used https://freegeoip.app/ and https://www.metaweather.com/api/ as requested.

See inline comments for walk-through.

If I had more time, I would add tests, scrub user input, add a solution to missing cities, and improve the icons.
