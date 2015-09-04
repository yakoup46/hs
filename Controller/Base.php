<?php

class Base extends RiotIntegration {

    public function index() {
        print_r($this->api->static->item);
    }

    public function history($summoner) {
        // $results = $this->getData(
        //     $this->api->history->summoner, 
        //     array(
        //         'region' => 'na',
        //         'summonerId' => $this->getSummonerId($summoner)
        //     )
        // );
        $data = json_decode(file_get_contents(__DIR__.'/../Files/tempdata.json'));
        $this->view('index', $data);

    }
}