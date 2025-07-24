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
            $produit = new Produit($row['nom'], $row['description'], $row['quantite'], $row['prix'], $row['_id']);;
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

        $produit = new Produit($result['nom'], $result['description'], $result['quantite'], $result['prix'], $result['_id']);
        return $produit;
    }

    public function create(Produit $produit): bool {
        
        $id = new MongoDB\BSON\ObjectId();
        try {
            $result = $this->collection->insertOne([
                '_id' => $id,
                'nom' => $produit->getNom(),
                'description' => $produit->getDescription(),
                'quantite' => $produit->getQuantite(),
                'prix' => $produit->getPrix()
            ]);
        } catch (MongoDB\Driver\Exception\BulkWriteException $e) {
            error_log("L'insertion MongoDB a échoué: " . $e->getMessage());
            return false;
        }

        $produit->setId((string) $id);
        return $result->isAcknowledged();
    }

    public function update(Produit $produit): bool {
        try {
            $result = $this->collection->updateOne(
                [ '_id' => new MongoDB\BSON\ObjectId($produit->getId()) ],
                [ '$set' => 
                    [
                    'nom' => $produit->getNom(),
                    'description' => $produit->getDescription(),
                    'quantite' => $produit->getQuantite(),
                    'prix' => $produit->getPrix()
                    ]
                ]
            );
        } catch (MongoDB\Driver\Exception\BulkWriteException $e) {
            error_log("L'insertion MongoDB a échoué: " . $e->getMessage());
            return false;
        }

        return $result->isAcknowledged() && $result->getModifiedCount() > 0;
    }

    public function delete(string $id): ?bool {
        try {
            $objectId = new MongoDB\BSON\ObjectId($id);
        } catch (\Exception $e) {
            return null;
        }

        $result = $this->collection->deleteOne(['_id' => $objectId]);

        return $result->isAcknowledged() && $result->getDeletedCount() > 0;
    }
}