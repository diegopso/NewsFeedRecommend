<?php

require_once 'autoload.php';

$location = __DIR__ . '/data/1.json';
$sampleProfile = new Profile($location);

$recommender = new Recommender($sampleProfile);

exit(var_dump($recommender->recommend()));