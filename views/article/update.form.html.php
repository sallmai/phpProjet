<div class="container mx-auto mt-10">
    <div class="card">
        <h5 class="card-title">MODIFIER ARTICLE</h5>
        <div class="space-y-4">
            <form action="<?= WEBROOT ?>" method="post">
                <div>
                    <label for="libelle" class="block text-sm font-medium text-purple-700">LIBELLÉ</label>
                    <input type="text" id="libelle" name="libelle" class="input-field" placeholder="Entrer libelle :" value="<?= htmlspecialchars($article['libelle']) ?>">
                </div>
                <div>
                    <label for="qteStock" class="block text-sm font-medium text-purple-700">QUANTITÉ EN STOCK</label>
                    <input type="number" id="qteStock" name="qteStock" class="input-field" placeholder="Entrer quantité en stock :" value="<?= htmlspecialchars($article['qteStock']) ?>">
                </div>
                <div>
                    <label for="prix" class="block text-sm font-medium text-purple-700">PRIX</label>
                    <input type="number" id="prix" name="prixAppro" class="input-field" placeholder="Entrer prix :" value="<?= htmlspecialchars($article['prixAppro']) ?>">
                </div>
                <div>
                    <label for="categorie" class="block text-sm font-medium text-purple-700">CATÉGORIE</label>
                    <select id="categorie" name="categorieId" class="select-field">
                        <?php foreach ($categories as $categorie) : ?>
                            <option value="<?= $categorie['id'] ?>" <?= $article['categorieId'] == $categorie['id'] ? 'selected' : '' ?>>
                                <?= $categorie['nomCategorie'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-purple-700">TYPE</label>
                    <select id="type" name="typeId" class="select-field">
                        <?php foreach ($types as $type) : ?>
                            <option value="<?= $type['id'] ?>" <?= $article['typeId'] == $type['id'] ? 'selected' : '' ?>>
                                <?= $type['nomType'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="action" value="update-article">
                <input type="hidden" name="controller" value="article">
                <input type="hidden" name="article_id" value="<?= htmlspecialchars($article['article_id']) ?>">
                <button type="submit" name="btnUpdate" class="submit-button">MODIFIER</button>
            </form>
        </div>
    </div>
</div>