<div class="container mx-auto mt-10">
        <div class="card">
            <h5 class="card-title ">NOUVEAUX ARTICLES</h5>
            <div class="space-y-4">
                <form action="<?=WEBROOT?>" method="post">
            
                <div>
                    <label for="libelle" class="block text-sm font-medium text-purple-700">LIBELLÉ</label>
                    <input type="text" id="libelle" name="libelle" class="input-field" placeholder="Entrez le libellé">
                </div>
                <div>
                    <label for="qteStock" class="block text-sm font-medium text-purple-700">QUANTITÉ EN STOCK</label>
                    <input type="number" id="qteStock" name="qteStock" class="input-field" placeholder="Entrez la quantité en stock">
                </div>
                <div>
                    <label for="prix" class="block text-sm font-medium text-purple-700">PRIX</label>
                    <input type="number" id="prix" name="prixAppro" class="input-field" placeholder="Entrez le prix">
                </div>
                <div>
                    <label for="categorie" class="block text-sm font-medium text-purple-700">CATÉGORIE</label>
                    <select id="categorie" name="categorieId" class="select-field">
                        <option value="" disabled selected>---</option>
                        <?php foreach($categories as $categorie): ?>
                        <option value="<?= $categorie['id'] ?>"><?= $categorie['nomCategorie'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-purple-700">TYPE</label>
                    <select id="type" name="typeId" class="select-field">
                        <option value="" disabled selected>---</option>
                        <?php foreach($types as $type): ?>
                        <option value="<?= $type['id'] ?>"><?= $type['nomType'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="action" value="save-article">
                <input type="hidden" name="controller" value="article">
                <button type="submit" name="btnSave" class="submit-button">Submit</button>
            
            </form>
            </div>
        </div>
    </div>