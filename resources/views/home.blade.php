@include('snippets.header')

            <div class="my_weather">
                <h2>Weather forecast for {{ $city }}</h2>

                @foreach ($weather->daily as $today)
                    @if ($loop->index > 5) @break @endif
                    <div class="card w_card">
                        <!-- Day -->
                        <h5 class="card-title text-center"><?php
                        $day = new \Carbon\Carbon($today->dt);
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
                            <img src="http://openweathermap.org/img/wn/{{ $today->weather[0]->icon }}@2x.png" style="height: 60px;">
                            <br>{{ $today->weather[0]->main }}
                        </div>

                        <div class="card-body">
                            <p class="card-text">
                                <!-- Temperature -->
                                <div class="temperature">
                                    {{ $today->temp->day }}&deg;F
                                </div>

                                <!-- Low/High -->
                                <div style="margin: 10px;">
                                    <span class="low">
                                        {{ $today->temp->min }}&deg;F
                                    </span>
                                    <span class="high">
                                        {{ $today->temp->max }}&deg;F
                                    </span><br>
                                </div>

                                <!-- Wind speed -->
                                <div style="margin: 5px;">
                                    <span class="wind_speed"><img src="/img/wind.png" class="wind_img"></span>
                                    <strong>{{ round($today->wind_speed) }} MPH</strong><br>
                                    {{ $today->wind_deg }}
                                </div>

                                <!-- Table of other stats -->
                                <table class="weather_table">
                                <tr>
                                    <td class="wt_left">Humidity</td>
                                    <td class="wt_right"><strong>{{ $today->humidity }}%</strong></td>
                                </tr>
                                <tr>
                                    <td class="wt_left">Pressure</td>
                                    <td class="wt_right"><strong>{{ \App\Classes\Helpers::mbToInHg($today->pressure) }} in</strong></td>
                                </tr>
                                <tr>
                                    <td class="wt_left">UVI</td>
                                    <td class="wt_right"><strong>{{ round($today->uvi) }}</strong></td>
                                </tr>
                                </table>
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        <br clear="all">

@include('snippets.footer')
