<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $apiKey = '1b5437e8098dec0d731a8192fe18492f';
        $city = 'Bihac'; 

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
        ]);

        $weatherData = $response->json();   
        return $weatherData;
        
    }
}

