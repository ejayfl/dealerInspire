<?php

namespace App\Services;

use GuzzleHttp\Client;

class GoogleGeocoder
{
    const GOOGLE_API_KEY = 'AIzaSyANfVTmN9awAEI8RDcVlCt3oD_bWD0BL6Q';

    public function geocode($address)
    {
        $client = new Client();
        $key = self::GOOGLE_API_KEY;

        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=$key";
        $response = $client->get($url);
        $result = json_decode($response->getBody()->getContents());

        return $result->results[0]->geometry->location->lat . ','. $result->results[0]->geometry->location->lng;
    }
}
