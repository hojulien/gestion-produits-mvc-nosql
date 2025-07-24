<?php require_once __DIR__ . '/templates/header.php'; ?>
    
    <div class="mx-auto w-full max-w-6xl p-5 bg-yellow-200 rounded-2xl shadow-md">
        <h1 class="text-3xl font-bold text-center">Liste des produits</h1>
    </div>

    <div class="mx-auto w-full overflow-x-auto">
        <table class="mx-auto w-full max-w-6xl">
            <thead>
                <tr>
                    <th class="border p-3 bg-yellow-200">ID</th>
                    <th class="border p-3 bg-yellow-200">Nom</th>
                    <th class="border p-3 bg-yellow-200">Description</th>
                    <th class="border p-3 bg-yellow-200">Quantité</th>
                    <th class="border p-3 bg-yellow-200">Prix</th>
                    <th class="border p-3 bg-yellow-200">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($produits as $produit): ?>
                <tr>
                    <td class="border p-3 text-center"><?= $produit->getId(); ?></td>
                    <td class="border p-3 text-center"><?= $produit->getNom(); ?></td>
                    <td class="border p-3 text-center"><?= $produit->getDescription(); ?></td>
                    <td class="border p-3 text-center"><?= $produit->getQuantite(); ?></td>
                    <td class="border p-3 text-center"><?= $produit->getPrix(); ?></td>
                    <td class="border p-3 text-center min-w-[150px]">
                        <div class="flex justify-center items-center gap-3">
                            <a class="bg-blue-200 border-2 border-blue-300 rounded-md p-1 shadow-sm" href="?action=view&id=<?= $produit->getId() ?>">
                                <img class="w-8 h-8 flex-shrink-0" src="./assets/icons/view.svg" alt="view icon">
                            </a>
                            <a class="bg-orange-200 border-2 border-orange-300 rounded-md p-1 shadow-sm" href="?action=edit&id=<?= $produit->getId() ?>">
                                <img class="w-8 h-8 flex-shrink-0" src="./assets/icons/edit.svg" alt="edit icon">
                            </a>
                            <a class="bg-red-200 border-2 border-red-300 rounded-md p-1 shadow-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?');" href="?action=delete&id=<?= $produit->getId() ?>">
                                <img class="w-8 h-8 flex-shrink-0" src="./assets/icons/delete.svg" alt="delete icon">
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require_once __DIR__ . '/templates/footer.php';