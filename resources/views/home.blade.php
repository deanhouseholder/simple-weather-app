@include('snippets.header')

            <div class="my_weather">
                <h2>Weather forecast for {{ $weather->title }}</h2>


                @foreach ($weather->consolidated_weather as $today)
                    <div class="card w_card">
                        <!-- Day -->
                        <h5 class="card-title text-center"><?php
                        $day = new \Carbon\Carbon($today->applicable_date);
                        if ($day->isToday()) {
                            print "Today";
                        } elseif ($day->isTomorrow()) {
                            print "Tomorrow";
                        } else {
                            print $day->format('l');
                        }
                        ?></h5>

                        <!-- Image/Weather forecast -->
                        <div class="card-img-top text-center">
                            <img src="https://www.metaweather.com/static/img/weather/{{ $today->weather_state_abbr }}.svg" style="height: 60px;">
                            <br>{{ $today->weather_state_name }}
                        </div>

                        <div class="card-body">
                            <p class="card-text">
                                <!-- Temperature -->
                                <div class="temperature">
                                    {{ \App\Classes\Helpers::centigradeToFahrenheit($today->the_temp) }}&deg;F
                                </div>

                                <!-- Low/High -->
                                <div style="margin: 10px;">
                                    <span class="low">
                                        {{ \App\Classes\Helpers::centigradeToFahrenheit($today->min_temp) }}&deg;F
                                    </span>
                                    <span class="high">
                                        {{ \App\Classes\Helpers::centigradeToFahrenheit($today->max_temp) }}&deg;F
                                    </span><br>
                                </div>

                                <!-- Wind speed -->
                                <div style="margin: 5px;">
                                    <span class="wind_speed"><img src="/img/wind.png" class="wind_img"></span>
                                    <strong>{{ round($today->wind_speed) }} MPH</strong><br>
                                    {{ $today->wind_direction_compass }}
                                </div>

                                <!-- Table of other stats -->
                                <table class="weather_table">
                                <tr>
                                    <td class="wt_left">Humidity</td>
                                    <td class="wt_right"><strong>{{ $today->humidity }}%</strong></td>
                                </tr>
                                <tr>
                                    <td class="wt_left">Pressure</td>
                                    <td class="wt_right"><strong>{{ \App\Classes\Helpers::mbToInHg($today->air_pressure) }} in</strong></td>
                                </tr>
                                <tr>
                                    <td class="wt_left">Visibility</td>
                                    <td class="wt_right"><strong>{{ round($today->visibility) }} miles</strong></td>
                                </tr>
                                <tr>
                                    <td class="wt_left">Confidence</td>
                                    <td class="wt_right"><strong>{{ $today->predictability }}%</strong></td>
                                </tr>
                                </table>
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>

@include('snippets.footer')
