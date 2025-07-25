<?php require_once __DIR__ . '/templates/header.php'; ?>

    <script src="./assets/scripts/produitform.js" defer></script>
    <div class="mx-auto w-full max-w-6xl p-5 bg-yellow-200 rounded-2xl shadow-md">
        <h1 class="text-3xl font-bold text-center">Ajouter un nouveau produit</h1>
    </div>

    <form class="flex flex-col items-center mx-auto w-full max-w-6xl p-5 gap-2 bg-yellow-200 rounded-2xl shadow-md" id="formProduit" action="?action=add" method="POST">
        <div class="flex p-3 gap-5 w-full h-16">
            <label class="flex justify-center items-center p-2 w-[200px] bg-yellow-400 shadow-md rounded-lg font-bold" for="nom">Nom:</label>
            <input class="w-full bg-gray-50 p-2 rounded-lg shadow-md" type="text" id="nom" name="nom">
        </div>
        <div class="text-red-500 font-bold" id="error-nom"></div>

        <div class="flex p-3 gap-5 w-full h-16">
            <label class="flex justify-center items-center p-2 w-[200px] bg-yellow-400 shadow-md rounded-lg font-bold" for="description">Description:</label>
            <input class="w-full bg-gray-50 p-2 rounded-lg shadow-md" type="text" id="description" name="description">
        </div>
        <div class="text-red-500 font-bold" id="error-description"></div>

        <div class="flex p-3 gap-5 w-full h-16">
            <label class="flex justify-center items-center p-2 w-[200px] bg-yellow-400 shadow-md rounded-lg font-bold" for="quantite">Quantité:</label>
            <input class="w-full bg-gray-50 p-2 rounded-lg shadow-md" type="number" id="quantite" name="quantite">
        </div>
        <div class="text-red-500 font-bold" id="error-quantite"></div>

        <div class="flex p-3 gap-5 w-full h-16">
            <label class="flex justify-center items-center p-2 w-[200px] bg-yellow-400 shadow-md rounded-lg font-bold" for="prix">Prix:</label>
            <input class="w-full bg-gray-50 p-2 rounded-lg shadow-md" type="number" step="0.01" id="prix" name="prix">
        </div>
        <div class="text-red-500 font-bold" id="error-prix"></div>

        <button class="flex justify-center items-center w-full bg-yellow-400 p-2 shadow-md rounded-lg font-bold max-w-[200px]" type="submit">Ajouter</button>
    </form>
    
    <a href="?action=home" class="mx-auto flex justify-center items-center w-full h-full bg-yellow-400 p-2 shadow-md rounded-lg font-bold max-w-[300px]">Retourner à la liste des produits</a>

<?php require_once __DIR__ . '/templates/footer.php';