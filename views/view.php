<?php require_once __DIR__ . '/templates/header.php'; ?>

    <div class="mx-auto w-full max-w-6xl p-5 bg-yellow-200 rounded-2xl shadow-md">
        <h1 class="text-3xl font-bold text-center">Détails du produit</h1>
    </div>

    <div class="flex flex-col items-center mx-auto w-full max-w-6xl p-5 gap-2 bg-yellow-200 rounded-2xl shadow-md">
        <div class="flex text-center p-3 gap-5 w-full max-w-6xl items-stretch">
            <div class="flex justify-center items-center w-full max-w-[200px] bg-yellow-400 p-2 shadow-md rounded-lg font-bold">Nom</div>
            <div class="w-full bg-yellow-300 p-2 rounded-lg shadow-md"><?= $produit->getNom() ?></div>
        </div>
        <div class="flex text-center p-3 gap-5 w-full max-w-6xl items-stretch">
            <div class="flex justify-center items-center w-full max-w-[200px] bg-yellow-400 p-2 shadow-md rounded-lg font-bold ">Description</div>
            <div class="w-full bg-yellow-300 p-2 rounded-lg shadow-md"><?= $produit->getDescription() ?></div>
        </div>
        <div class="flex text-center p-3 gap-5 w-full max-w-6xl items-stretch">
            <div class="flex justify-center items-center w-full h-full max-w-[200px] bg-yellow-400 p-2 shadow-md rounded-lg font-bold">Quantité</div>
            <div class="w-full bg-yellow-300 p-2 rounded-lg shadow-md"><?= $produit->getQuantite() ?></div>
        </div>
        <div class="flex text-center p-3 gap-5 w-full max-w-6xl items-stretch">
            <div class="flex justify-center items-center w-full h-full max-w-[200px] bg-yellow-400 p-2 shadow-md rounded-lg font-bold">Prix</div>
            <div class=" w-full bg-yellow-300 p-2 rounded-lg shadow-md"><?= $produit->getPrix() ?></div>
        </div>
        <div class="flex flex-col sm:flex-row justify-center p-3 gap-5 w-full h-full">
            <a class="flex justify-center items-center bg-orange-200 border-2 border-orange-300 rounded-md p-2 gap-2 shadow-sm" href="?action=edit&id=<?= $produit->getId() ?>">
                <img class="w-8 h-8 flex-shrink-0" src="./assets/icons/edit.svg" alt="edit icon">
                <p class="flex justify-center items-center font-bold">Modifier le produit</p>
            </a>
            <a class="flex justify-center items-center bg-red-200 border-2 border-red-300 rounded-md p-2 gap-2 shadow-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?');" href="?action=delete&id=<?= $produit->getId() ?>">
                <img class="w-8 h-8 flex-shrink-0" src="./assets/icons/delete.svg" alt="delete icon">
                <p class="flex justify-center items-center font-bold">Supprimer le produit</p>
            </a>
        </div>
    </div>
    
    <a href="?action=home" class="mx-auto flex justify-center items-center w-full h-full max-w-6xl bg-yellow-400 p-2 shadow-md rounded-lg font-bold">Retourner à la liste des produits</a>

<?php require_once __DIR__ . '/templates/header.php';