<div class="container mx-auto mt-10">
    <div class="card">
        <h5 class="card-title">MODIFIER TYPE</h5>
        <div class="space-y-4">
            <form action="<?= WEBROOT ?>" method="post">
                <div>
                    <label for="libelle" class="block text-sm font-medium text-purple-700">NOM TYPE</label>
                    <input type="text" id="libelle" name="nomType" class="input-field" placeholder="Entrer libelle :" value="<?= htmlspecialchars($type['nomType']) ?>">
                </div>

              <input type="hidden" name="action" value="update-type">
                <input type="hidden" name="controller" value="type">
                <input type="hidden" name="type_id" value="<?= htmlspecialchars($type['id']) ?>">
                <button type="submit" name="btnUpdate" class="submit-button">MODIFIER</button>


               
           
            </form>
        </div>
    </div>
</div>