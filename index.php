<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controllers/ProduitController.php';

$prodC = new ProduitController();

$action = $_GET['action'] ?? 'home'; // home par defaut.
$id = $_GET['id'] ?? null;

switch($action) {
    case('home'):
        $prodC->home();
        break;
    // USER
    case('view'):
        $prodC->view($id);
        break;
    case('create'):
        $prodC->create();
        break;   
    case('add'):
        $prodC->add();
        break;
    case('edit'):
        $prodC->edit($id);
        break;
    case('update'):
        $prodC->update();
        break;
    case('delete'):
        $prodC->delete($id);
        break;
    // 404
    default:
        $_SESSION['error'] = "Erreur 404";
        require_once __DIR__ . '/views/404.php';
}

// $repo = new ProduitRepository();

// function test(Produit|null $test) {
//     if ($test) {
//         echo $test->getNom() . "<br>" . $test->getDescription() . "<br>" . $test->getPrix() . "<br>";
//     } else {
//         echo "Erreur: ID non valide.<br>";
//     }
// }

// echo "<h1> Test de create() </h1>";

// $p1 = new Produit ('Console portable', 'Une console moderne pour jouer entre amis.', 299.99);
// $repo->create($p1);
// test($p1);

// echo "<h1> Test de update() </h1>";
// $p1->setPrix(249.99);
// $repo->update($p1);
// test($p1);

// echo "<h1> Test de delete() </h1>";
// $repo->delete($p1->getId());
// $testAll = $repo->getProduits();
// foreach ($testAll as $item) {
//     test($item);
// }

?>
