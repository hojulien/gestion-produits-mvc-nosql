<?php

require_once __DIR__ . '/../models/repositories/ProduitRepository.php';
require_once __DIR__ . '/../models/Produit.php';

function redirect(string $action) {
    header('Location: ' . $action);
    exit;
}

class ProduitController {
    private ProduitRepository $produitRepo;

    public function __construct() {
        $this->produitRepo = new ProduitRepository();
    }

    public function home() {
        $produits = $this->produitRepo->getProduits();
        require_once __DIR__ . '/../views/home.php';
    }

    public function view(int $id) {
        $produit = $this->produitRepo->getProduit($id);
        require_once __DIR__ . '/../views/view.php';
    }

    public function create() {
        require_once __DIR__ . '/../views/create.php';
    }

    public function add() {
        $produit = new Produit($_POST['nom'], $_POST['description'], $_POST['quantite'], $_POST['prix']);
        $this->produitRepo->create($produit);

        redirect("?action=home");
    }

    public function edit(string $id) {
        $produit = $this->produitRepo->getProduit($id);
        require_once __DIR__ . '/../views/edit.php';
    }

    public function update() {
        $produitId = $_POST['id'];
        $produit = new Produit($_POST['nom'], $_POST['description'], $_POST['quantite'], $_POST['prix']);
        $produit->setId($produitId);
        $this->produitRepo->update($produit);

        redirect("?action=home");
    }

    public function delete(string $id) {
        $this->produitRepo->delete($id);

        redirect("?action=home");
    }
}