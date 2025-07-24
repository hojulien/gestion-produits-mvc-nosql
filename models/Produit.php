<?php

require_once __DIR__ . '/../lib/database.php';

class Produit {
    private ?string $id;
    private string $nom;
    private string $description;
    private float $prix;

    public function __construct(string $nom, string $desc, float $prix, ?string $id = null) {
        $this->setNom($nom);
        $this->setDescription($desc);
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

    public function getPrix(): float {
        return $this->prix;
    }

    // SETTERS

    public function setId(?string $id): void {
        $this->id = htmlspecialchars($id);
    }

    public function setNom(string $nom): void {
        $this->nom = htmlspecialchars($nom);
    }

    public function setDescription(string $desc): void {
        $this->description = htmlspecialchars($desc);
    }

    public function setPrix(float $prix): void {
        $this->prix = $prix;
    }
}