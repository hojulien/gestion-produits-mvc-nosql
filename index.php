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

echo "<h1> Test de getProduits() </h1>";

$testAll = $repo->getProduits();
foreach ($testAll as $item){
    test($item);
}

echo "<h1> Test de getProduit() </h1>";

$test1 = $repo->getProduit("6881f054d01b74b659ed7a30");
$test2 = $repo->getProduit("6881f054d01b74b659ed7a30");
$testFail= $repo->getProduit("yes");

test($test1);
test($test2);
test($testFail);

?>
