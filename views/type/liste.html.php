<div class="container mt-5 mb-5">
        <div class="card w-90 mx-auto">
            <div class="card-header bg-gradient-to-r from-blue-300 to-purple-500 text-white">
                <h5 class="card-title">LISTE DES TYPES</h5>
            </div>
            <div class="flex justify-end m-3">
                <form action="<?= WEBROOT ?>" method="post" class="flex space-x-2">
                    <label for="nomType" class="self-center">NOM TYPE</label>
                    <input type="text" name="nomType" id="nomType" class="border rounded px-2 py-1" required>
                    <input type="hidden" name="action" value="save-type">
                    <input type="hidden" name="controller" value="type">
                    <button type="submit" name="btn-save" class="bg-blue-500 text-white px-4 py-2 rounded">ENREGISTRER</button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-hover w-full text-left">
                    <thead>
                        <tr>
                            <th scope="col" class="border px-4 py-2">ID</th>
                            <th scope="col" class="border px-4 py-2">NOM TYPE</th>
                            <th scope="col" class="border px-4 py-2">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($types as $type): ?>
                            <tr>
                                <td class="border px-4 py-2"><?= $type["id"] ?></td>
                                <td class="border px-4 py-2"><?= $type["nomType"] ?></td>
                                <td>
                                <a href="<?= WEBROOT ?>/?controller=type&action=supprimer-type&type_id=<?= htmlspecialchars($type['id']) ?>">
                                    <button class="my-btn my-btn-outline my-text-pink">SUPPRIMER</button>
                                </a>
                                <a href="<?= WEBROOT ?>/?controller=type&action=modifier-type&type_id=<?= htmlspecialchars($type['id']) ?>">
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