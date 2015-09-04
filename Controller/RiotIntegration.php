<?php

class RiotIntegration extends Controller {
    
    protected $token;
    protected $api;

    public function __construct() {
        $this->api = $this->dirtyify(parse_ini_file(__DIR__ . '/../config/riot_endpoints.ini', true));
    }

    public function getSummonerId($summoner) {
        $results = $this->getData(
            $this->api->summoner->find,
            array(
                'region' => 'na',
                'summonerNames' => $summoner
            )
        );

        return $results->{strtolower($summoner)}->id;
    }

    /**
     * A less than creative way to convert .ini to an object
     *
     * @param array ini array
     * @return object
     */
    private function dirtyify($array) {
        return json_decode(json_encode($array));
    }
}