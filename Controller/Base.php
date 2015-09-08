<?php

class Base extends RiotIntegration {

    public function index() {
        print_r($this->api->static->item);
    }

    public function history($summoner) {
        $data = $this->getData(
            $this->api->history->summoner, 
            array(
                'region' => 'na',
                'summonerId' => $this->getSummonerId($summoner),
                'beginIndex' => 0,
                'endIndex' => 15
            )
        );

        $data2 = $this->getData(
            $this->api->history->summoner, 
            array(
                'region' => 'na',
                'summonerId' => $this->getSummonerId($summoner),
                'beginIndex' => 16,
                'endIndex' => 31
            )
        );
        //debug(json_encode($data)); exit;
        //$data = json_decode(file_get_contents(__DIR__.'/../Files/tempdata.json'));
        //$data2 = json_decode(file_get_contents(__DIR__.'/../Files/tempdata2.json'));
        $this->view('index', array('data' => $data, 'data2' => $data2));

    }
}