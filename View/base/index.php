<?php

$wins = 0;
$losses = 0;
$kills = 0;
$deaths = 0;
$assists = 0;
$creep10 = 0;
$creep20 = 0;

foreach (current($data['data']) as $i => $d) {
    $base = current($d->participants);
    $stats = $base->stats;
    $timeline = $base->timeline;
    $creep = $timeline->creepsPerMinDeltas;

    if ($stats->winner) $wins++;
    else $losses++;

    $kills += $stats->kills;
    $deaths += $stats->deaths;
    $assists += $stats->assists;

    $creep10 += $creep->zeroToTen/10;
    $creep20 += $creep->tenToTwenty/10;
}

?>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/assets/css/output.css">
<h2>Last 15 Games</h2>
<div class="box">
    <div class="summoner"></div>
    <div class="win-loss">
        <div class="heading">
            <div class="win label">Win</div>
            <div class="loss label">Loss</div>
        </div>
        <div class="clear"></div>
        <div class="info">
            <div class="label"><?= $wins; ?></div>
            <div class="label"><?= $losses; ?></div>
        </div>
    </div>
    <div class="creep">
        <div class="heading label large">Creep Score</div>
        <div class="clear"></div>
        <div class="info">
            <div class="label"><?= $creep10; ?>/min</div>
            <div class="label"><?= $creep20; ?>/min</div>
        </div>
    </div>
    <div class="stats">
        <div class="heading">
            <div class="label">Kills</div>
            <div class="label">Deaths</div>
            <div class="label">Assists</div>
            <div class="label">KDA</div>
        </div>
        <div class="clear"></div>
        <div class="info">
            <div class="label"><?= $kills; ?></div>
            <div class="label"><?= $deaths; ?></div>
            <div class="label"><?= $assists; ?></div>
            <div class="label"><?= round(($kills + $assists) / $deaths, 2); ?></div>
        </div>
    </div>
</div>

<?php

$wins2 = 0;
$losses2 = 0;
$kill2s = 0;
$deaths2 = 0;
$assists2 = 0;
$creep102 = 0;
$creep202 = 0;

foreach (current($data['data2']) as $i => $d) {
    $base = current($d->participants);
    $stats = $base->stats;
    $timeline = $base->timeline;
    $creep = $timeline->creepsPerMinDeltas;

    if ($stats->winner) $wins2++;
    else $losses2++;

    $kills2 += $stats->kills;
    $deaths2 += $stats->deaths;
    $assists2 += $stats->assists;

    $creep102 += $creep->zeroToTen/10;
    $creep202 += $creep->tenToTwenty/10;
}

?>
<div class="clear"></div>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/assets/css/output.css">
<h2>15 Before That</h2>
<div class="box">
    <div class="summoner"></div>
    <div class="win-loss">
        <div class="heading">
            <div class="win label">Win</div>
            <div class="loss label">Loss</div>
        </div>
        <div class="clear"></div>
        <div class="info">
            <div class="label"><?= $wins2; ?></div>
            <div class="label"><?= $losses2; ?></div>
        </div>
    </div>
    <div class="creep">
        <div class="heading label large">Creep Score</div>
        <div class="clear"></div>
        <div class="info">
            <div class="label"><?= $creep102; ?>/min</div>
            <div class="label"><?= $creep202; ?>/min</div>
        </div>
    </div>
    <div class="stats">
        <div class="heading">
            <div class="label">Kills</div>
            <div class="label">Deaths</div>
            <div class="label">Assists</div>
            <div class="label">KDA</div>
        </div>
        <div class="clear"></div>
        <div class="info">
            <div class="label"><?= $kills2; ?></div>
            <div class="label"><?= $deaths2; ?></div>
            <div class="label"><?= $assists2; ?></div>
            <div class="label"><?= round(($kills2 + $assists2) / $deaths2, 2); ?></div>
        </div>
    </div>
</div>
<div class="clear"></div>
<h2>Differential</h2>
<div class="box">
    <div class="summoner"></div>
    <div class="win-loss">
        <div class="heading">
            <div class="win label">Win</div>
            <div class="loss label">Loss</div>
        </div>
        <div class="clear"></div>
        <div class="info">
            <?php $d = ($wins2 - $wins); ?>
            <div class="label <?= ($d > 0 ? 'green' : 'red'); ?>"><?php $d = ($wins2 - $wins); ?><?= ($d > 0 ? '+' : ''); ?><?= $d; ?></div>
            <?php $d = ($losses2 - $losses); ?>
            <div class="label <?= ($d < 0 ? 'green' : 'red'); ?>"><?= ($d < 0 ? '' : '+'); ?><?= $d; ?></div>
        </div>
    </div>
    <div class="creep">
        <div class="heading label large">Creep Score</div>
        <div class="clear"></div>
        <div class="info">
            <?php $d = ($creep102 - $creep10); ?>
            <div class="label <?= ($d > 0 ? 'green' : 'red'); ?>"><?= ($d > 0 ? '+' : ''); ?><?= $d; ?>/min</div>
            <?php $d = ($creep202 - $creep20); ?>
            <div class="label <?= ($d > 0 ? 'green' : 'red'); ?>"><?= ($d > 0 ? '+' : ''); ?><?= $d; ?>/min</div>
        </div>
    </div>
    <div class="stats">
        <div class="heading">
            <div class="label">Kills</div>
            <div class="label">Deaths</div>
            <div class="label">Assists</div>
            <div class="label">KDA</div>
        </div>
        <div class="clear"></div>
        <div class="info">
            <?php $d = ($kills2 - $kills); ?>
            <div class="label <?= ($d > 0 ? 'green' : 'red'); ?>"><?= ($d > 0 ? '+' : ''); ?><?= $d; ?></div>
            <?php $d = ($deaths2 - $deaths); ?>
            <div class="label <?= ($d < 0 ? 'green' : 'red'); ?>"><?= ($d < 0 ? '' : '+'); ?><?= $d; ?></div>
            <?php $d = ($assists2 - $assists); ?>
            <div class="label <?= ($d > 0 ? 'green' : 'red'); ?>"><?= ($d > 0 ? '+' : ''); ?><?= $d; ?></div>
            <?php $d = round((($kills2 + $assists2) / $deaths2) - (($kills + $assists) / $deaths), 2); ?>
            <div class="label <?= ($d > 0 ? 'green' : 'red'); ?>"><?= ($d > 0 ? '+' : ''); ?><?= $d; ?></div>
        </div>
    </div>
</div>