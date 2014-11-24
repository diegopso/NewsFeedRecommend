<?php

require_once 'autoload.php';

chdir(__DIR__);

file_put_contents(Matcher::SCORES_FILE, '');

for ($i = 1; $i <= 10; $i++) {
    $location = 'data/in/'. $i .'.json';
    $sampleProfile = new Profile($location);
    $recommender = new Recommender($sampleProfile);
    $recommender->recommend();
    file_put_contents('data/out/recomendation_to_' . $i . '.json', json_encode($recommender->toArray()));
}