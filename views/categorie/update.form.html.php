<div class="container mx-auto mt-10">
    <div class="card">
        <h5 class="card-title">MODIFIER CATEGORIE</h5>
        <div class="space-y-4">
            <form action="<?= WEBROOT ?>" method="post">
                <div>
                    <label for="libelle" class="block text-sm font-medium text-purple-700">NOM CATAGORIE</label>
                    <input type="text" id="libelle" name="nomCategorie" class="input-field" placeholder="Entrer libelle :" value="<?= htmlspecialchars($categorie['nomCategorie']) ?>">
                </div>

              <input type="hidden" name="action" value="update-categorie">
                <input type="hidden" name="controller" value="categorie">
                <input type="hidden" name="categorie_id" value="<?= htmlspecialchars($categorie['id']) ?>">
                <button type="submit" name="btnUpdate" class="submit-button">MODIFIER</button>


               
           
            </form>
        </div>
    </div>
</div>