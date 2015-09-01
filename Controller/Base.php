<?php

class Base extends Controller {

    public function index() {
        $cards = json_decode(file_get_contents(__DIR__ . '/../Files/hs.json'));

        $max = 10;

        echo '<pre>';
        foreach ($cards as $exp => $decks) {
            foreach ($decks as &$card) {

                if ($card->type == 'Minion' && $card->cost > 0 && $card->attack > 0) {

                    $value = ($card->cost * $card->attack) / ($card->cost + $card->health);
                    $card->value = $value;

                    if ($card->value < $max) {
                        $max = $card->value;
                        $holder = $card;
                    }

                    //print_r($card);
                }
            }
        }

        print_r($holder);
    }

}