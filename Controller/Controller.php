<?php

class Controller {

    protected function view($page, $data) {
        ob_start();
        
        include __DIR__ . '/../View/base/' . $page . '.php';

        $page = ob_get_contents();

        ob_end_clean();

        echo $page;
    }

    protected function getData($url, $data) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $this->buildUrl($url, $data));
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result);
    }

    private function buildUrl($url, $data) {
        foreach ($data as $key => $val) {
            $url = str_replace('{' . $key . '}', $val, $url);
        }

        $url = "https://na.api.pvp.net" . $url . "?beginIndex=" . $data['beginIndex'] . "&endIndex=" . $data['endIndex'] . "&api_key=" . App_ApiKey;

        return $url;
    }
}