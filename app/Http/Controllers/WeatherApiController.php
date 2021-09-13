<?php
namespace App\Http\Controllers;

use App\Classes\WeatherApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WeatherApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, WeatherApi $weather)
    {
        $params = $request->route()->parameters();

        // store response in a cache for x minutes
        $response = Cache::remember('weatherapi', now()->addMinutes(60), function() use ($params, $weather) {
            $response = $weather->getWeatherByCity($params['cityname']);

            return $response->json();
        });

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
