<?php

$wins = 0;
$losses = 0;

foreach (current($data) as $i => $d) {
    $stats = current($d->participants)->stats;

    if ($stats->winner) $wins++;
    else $losses++;
}

?>
<link rel="stylesheet" href="/assets/css/output.css">

<div class="box">
    <div class="summoner"></div>
    <div class="win-loss">
        <div class="heading">
            <div class="win col1">Win</div>
            <div class="loss col1">Loss</div>
        </div>
        <div class="clear"></div>
        <div class="info">
            <div class="col1">3</div>
            <div class="col1">7</div>
        </div>
    </div>
    <div class="creep">
        <div class="heading col3">Creep Score</div>
        <div class="clear"></div>
        <div class="sub-heading">
            <div class="colh">First 10min</div>
            <div class="colh">10min to End</div>
        </div>
        <div class="clear"></div>
        <div class="info">
            <div class="colh">45</div>
            <div class="colh">23</div>
        </div>
    </div>
    <div class="stats">
        <div class="heading">
            <div class="col1">Kills</div>
            <div class="col1">Deaths</div>
            <div class="col1">Assists</div>
            <div class="col1">KDA</div>
        </div>
        <div class="clear"></div>
        <div class="info">
            <div class="col1">8</div>
            <div class="col1">8</div>
            <div class="col1">8</div>
            <div class="col1">8</div>
        </div>
    </div>
</div>