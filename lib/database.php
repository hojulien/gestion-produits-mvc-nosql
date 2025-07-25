<?php

// connexion à la base MongoDB, retourne la collection utilisée qui sera manipulée par le modèle et la DAO
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->testdb->produits;

return $collection;