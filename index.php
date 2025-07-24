<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->testdb->produits;

$cursor = $collection->find();
foreach ($cursor as $document) {
    echo $document["nom"] . "<br>" . $document["description"] . "<br>" .$document["prix"] . "<br>";
}
?>
