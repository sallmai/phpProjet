<div class="my-container mt-5 mb-5">
    <div class="my-card w-90 mx-auto">
        <div class="my-card-header my-gradient">
            <h5 class="my-card-title my-text-color">LISTE DES ARTICLES</h5>
        </div>
        <div class="my-flex my-justify-end my-m-3">
            <a href="<?= WEBROOT ?>/?controller=article&action=form-article" class="my-btn my-btn-outline my-text-pink">NOUVEAU</a>
        </div>
        <div class="my-card-body">
            <table class="my-table my-table-hover">
                <thead>
                    <tr>
                        <th scope="col">LIBELLÉ</th>
                        <th scope="col">QUANTITÉ EN STOCK</th>
                        <th scope="col">PRIX</th>
                        <th scope="col">CATÉGORIE</th>
                        <th scope="col">TYPE</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article) : ?>
                        <tr>
                            <td><?= $article["libelle"] ?></td>
                            <td><?= $article["qteStock"] ?></td>
                            <td><?= $article["prixAppro"] ?></td>
                            <td><?= $article["nomCategorie"] ?></td>
                            <td><?= $article["nomType"] ?></td>

                        
                            <td>
                                <a href="<?= WEBROOT ?>/?controller=article&action=supprimer-article&article_id=<?= htmlspecialchars($article['article_id']) ?>">
                                    <button class="my-btn my-btn-outline my-text-pink">SUPPRIMER</button>
                                </a>
                                <a href="<?= WEBROOT ?>/?controller=article&action=modifier-article&article_id=<?= htmlspecialchars($article['article_id']) ?>">
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