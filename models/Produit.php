<?php

require_once __DIR__ . '/../lib/database.php';

class Produit {
    private ?string $id;
    private string $nom;
    private string $description;
    private int $quantite;
    private float $prix;

    public function __construct(string $nom, string $desc, int $quantite, float $prix, ?string $id = null) {
        $this->setNom($nom);
        $this->setDescription($desc);
        $this->setQuantite($quantite);
        $this->setPrix($prix);
        $this->setId($id);
    }

    // GETTERS

    public function getId(): string {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getQuantite(): int {
        return $this->quantite;
    }

    public function getPrix(): float {
        return $this->prix;
    }

    // SETTERS

    public function setId(?string $id): void {
        $this->id = $id;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function setDescription(string $desc): void {
        $this->description = $desc;
    }

    public function setQuantite(int $quantite): void {
        $this->quantite = $quantite;
    }

    public function setPrix(float $prix): void {
        $this->prix = $prix;
    }
}