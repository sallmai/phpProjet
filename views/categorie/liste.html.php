<div class="container mt-5 mb-5">
    <div class="card w-90 mx-auto">
        <div class="card-header bg-gradient-to-r from-blue-300 to-purple-500 text-white">
            <h5 class="card-title">LISTE DES TYPES</h5>
        </div>
        <div class="flex justify-end m-3">
            <form action="<?= WEBROOT ?>" method="post" class="flex space-x-2">
                <label for="nomType" class="self-center">NOM CATEGORIE</label>
                <input type="text" name="nomCategorie" id="nom" class="border rounded px-2 py-1" required>
                <input type="hidden" name="action" value="save-categorie">
                <input type="hidden" name="controller" value="categorie">
                <button type="submit" name="btn-save" class="bg-blue-500 text-white px-4 py-2 rounded">ENREGISTRER</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover w-full text-left">
                <thead>
                    <tr>
                        <th scope="col" class="border px-4 py-2">ID</th>
                        <th scope="col" class="border px-4 py-2">NOM CATEGORIE</th>
                        <th scope="col" class="border px-4 py-2">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $categorie) : ?>
                        <tr>
                            <td class="border px-4 py-2"><?= $categorie["id"] ?></td>
                            <td class="border px-4 py-2"><?= $categorie["nomCategorie"] ?></td>
                            <td>
                                <a href="<?= WEBROOT ?>/?controller=categorie&action=supprimer-categorie&categorie_id=<?= htmlspecialchars($categorie['id']) ?>">
                                    <button class="my-btn my-btn-outline my-text-pink">SUPPRIMER</button>
                                </a>
                                <a href="<?= WEBROOT ?>/?controller=categorie&action=modifier-categorie&categorie_id=<?= htmlspecialchars($categorie['id']) ?>">
                                    <button class="my-btn my-btn-outline my-text-pink">MODIFIER</button>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>