<?php

declare(strict_types=1);

namespace Src\Weather\Infrastructure\Repositories;

use Src\Weather\Domain\Contracts\WeatherRepositoryContract;
use Exception;
use Src\Weather\Domain\ValueObjects\WeatherCity;
use Src\Weather\Domain\ValueObjects\WeatherHumidity;
use Src\Weather\Domain\ValueObjects\WeatherLatitude;
use Src\Weather\Domain\ValueObjects\WeatherLongitude;
use Src\Weather\Domain\ValueObjects\WeatherRegion;
use Src\Weather\Domain\ValueObjects\WeatherTemperature;
use Src\Weather\Domain\Weather;

class WeatherYahooRepository implements WeatherRepositoryContract
{
    private string $baseUrl = "https://weather-ydn-yql.media.yahoo.com/forecastrss";
    private string $appId;
    private string $consumerKey;
    private string $consumerSecret;
    private array $oauth;

    /**
     * WeatherYahooRepository constructor.
     */
    public function __construct()
    {
        $this->appId = env('WEATHER_APP_ID');
        $this->consumerKey = env('WEATHER_CONSUMER_KEY');
        $this->consumerSecret = env('WEATHER_CONSUMER_SECRET');
        $this->oauth = array(
            'oauth_consumer_key'     => $this->consumerKey,
            'oauth_nonce'            => uniqid((string) mt_rand(1, 1000)),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_timestamp'        => time(),
            'oauth_version'          => '1.0'
        );
    }

    /**
     * It builds the base string for the request
     * including the parameters.
     *
     * @param string $baseURI
     * @param string $method
     * @param array $params
     * @return string
     */
    private function buildBaseString(string $baseURI, string $method, array $params): string
    {
        $r = array();
        ksort($params);
        foreach ($params as $key => $value) {
            $r[] = "$key=" . rawurlencode((string) $value);
        }
        return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }

    /**
     * It builds the Auth header.
     *
     * @param array $oauth
     * @return string
     */
    private function buildAuthorizationHeader(array $oauth): string
    {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach ($oauth as $key => $value) {
            $values[] = "$key=\"" . rawurlencode((string) $value) . "\"";
        }
        $r .= implode(', ', $values);
        return $r;
    }

    /**
     * Set the curl options.
     *
     * @param array $query
     * @return array
     */
    private function buildCurlOptions(array $query): array
    {
        $base_info = $this->buildBaseString($this->baseUrl, 'GET', array_merge($query, $this->oauth));
        $composite_key = rawurlencode($this->consumerSecret) . '&';
        $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $this->oauth['oauth_signature'] = $oauth_signature;

        $header = array(
            $this->buildAuthorizationHeader($this->oauth),
            'X-Yahoo-App-Id: ' . $this->appId
        );

        return array(
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_HEADER => false,
            CURLOPT_URL => $this->baseUrl . '?' . http_build_query($query),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        );
    }

    /**
     * It Executes the request to Yahoo API.
     *
     * @param WeatherCity $city
     * @return array
     * @throws Exception
     */
    private function executeRequest(WeatherCity $city): array
    {
        $query = array('location' => $city->value(), 'format' => 'json');
        $options = $this->buildCurlOptions($query);
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $errorMessage = curl_error($ch);
        }

        curl_close($ch);

        if (isset($errorMessage)) {
            throw new Exception("Error: " . $errorMessage);
        }

        return json_decode($response, true);
    }

    /**
     * It gets the weather information by the name
     * of the city
     *
     * @param WeatherCity $city
     * @return Weather|null
     */
    public function getInfoByCity(WeatherCity $city): ?Weather
    {
        $weatherInfo = null;
        try {
            $data = $this->executeRequest($city);
            $weatherInfo = new Weather(
                new WeatherCity($data["location"]["city"]),
                new WeatherRegion($data["location"]["region"]),
                new WeatherLatitude($data["location"]["lat"]),
                new WeatherLongitude($data["location"]["long"]),
                new WeatherTemperature($data["current_observation"]["condition"]["temperature"]),
                new WeatherHumidity($data["current_observation"]["atmosphere"]["humidity"])
            );
        } catch (Exception $e) {
            abort(500);
        }

        return $weatherInfo;
    }
}
