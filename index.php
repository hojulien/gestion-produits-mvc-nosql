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
        $prodC->home();
        break;
}

?>
