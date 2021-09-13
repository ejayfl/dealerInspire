<?php
namespace App\Classes;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class WeatherApi
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $current_endpoint;

    /**
     * @var string
     */
    protected $dummy_app_id = '567890';

    public function __construct()
    {
        $this->apiKey = config('services.openweather.api_key');
        $this->current_endpoint = config('services.openweather.current_api_endpoint');
    }

    /**
     * Build query param
     * @param array $params
     * @return boolean|array
     */
    protected function getWeather(array $params)
    {
        $params = http_build_query($params);
        $request = $this->current_endpoint.$params;

        $response = $this->makeRequest($request);

        if (!$response) {
            return false;
        }

        return $response;
    }

    /**
     * Get Weather Data By City
     * @param string $cityname
     * @param string $unit
     * @return array
     */
    public function getWeatherByCity(string $cityname, string $unit = 'imperial')
    {        
        $params = [
            'q' => $cityname,
            'units' => $unit,
            'appid' => $this->apiKey,
        ];

        return $this->getWeather($params);
    }

    /**
     * Make request to openweather endpoint
     * @param string $url
     * @return boolean|array
     */
    protected function makeRequest(string $url)
    {
        $response = Http::get($url);

        if (!$response) {
            Log::error('Weather API is currently unreachable');
            return false;
        }

        return $response;
    }

    /**
     * Format response to return weather condition
     * @param string $url
     * @return string
     */
    protected function formatResponse($response) : string
    {
        return $response['weather'][0]['description'];
    }

    /**
     * Validate params before calling openweather endpoint
     * @param string $params
     * @return array
     */
    protected function validateParams($params)
    {
        // dummy check
        if ($params != $this->app_id) {
            return response([
                'message' => 'Unauthorized',
            ], 401);
        }
    }
}