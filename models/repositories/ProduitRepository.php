<?php

require_once __DIR__ . '/../Produit.php';
require_once __DIR__ . '/../../lib/database.php';

class ProduitRepository {
    private MongoDB\Collection $collection;

    public function __construct() {
        $this->collection = require __DIR__ . '/../../lib/database.php';
    }

    public function getProduits(): array {
        $result = $this->collection->find();
        $produits = [];

        foreach($result as $row) {
            $produit = new Produit($row['_id'], $row['nom'], $row['description'], $row['prix']);;
            $produits[] = $produit;
        }

        return $produits;
    }

    public function getProduit(string $id): ?Produit {
        try {
            $objectId = new MongoDB\BSON\ObjectId($id);
        } catch (\Exception $e) {
            return null; // Invalid ObjectId format
        }

        $result = $this->collection->findOne(['_id' => $objectId]);

        if (!$result) {
            return null;
        }

        $produit = new Produit($result['_id'], $result['nom'], $result['description'], $result['prix']);
        return $produit;
    }

    public function create(Produit $produit): bool {
        
        $id = new MongoDB\BSON\ObjectId();
        $result = $this->collection->insertOne([
            '_id' => $id,
            'nom' => $produit->getNom(),
            'description' => $produit->getDescription(),
            'prix' => $produit->getPrix()
        ]);

        $produit->setId((string) $id);

        return $result->isAcknowledged();
    }

    public function update(Produit $produit): bool {
        $result = $this->collection->updateOne(
            [ '_id' => new MongoDB\BSON\ObjectId($produit->getId()) ],
            [ '$set' => 
                [
                'nom' => $produit->getNom(),
                'description' => $produit->getDescription(),
                'prix' => $produit->getPrix()
                ]
            ]
    );
        return $result->isAcknowledged();
    }
}