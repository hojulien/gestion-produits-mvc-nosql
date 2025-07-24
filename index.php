<?php
require 'vendor/autoload.php';
require 'models/repositories/ProduitRepository.php';

$repo = new ProduitRepository();

function test(Produit|null $test) {
    if ($test) {
        echo $test->getNom() . "<br>" . $test->getDescription() . "<br>" . $test->getPrix() . "<br>";
    } else {
        echo "Erreur: ID non valide.<br>";
    }
}

echo "<h1> Test de create() </h1>";

$p1 = new Produit ('Console portable', 'Une console moderne pour jouer entre amis.', 299.99);
$repo->create($p1);
test($p1);

echo "<h1> Test de update() </h1>";
$p1->setPrix(249.99);
$repo->update($p1);
test($p1);

?>
