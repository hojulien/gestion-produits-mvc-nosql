<?php

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->testdb->produits;

return $collection;