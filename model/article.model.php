<?php

 function findAll(): array
{
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $sql = "SELECT 
                    a.id AS article_id, 
                    a.libelle, 
                    a.qteStock, 
                    a.prixAppro, 
                    a.typeId, 
                    a.categorieId, 
                    c.nomCategorie AS nomCategorie, 
                    t.nomType AS nomType 
                FROM 
                    `article` a 
                JOIN 
                    categorie c ON a.categorieId = c.id 
                JOIN 
                    type t ON a.typeId = t.id";
        $stm = $dbh->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    return [];
}

function findCategorie(): array
{
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $sql = "SELECT * FROM categorie c;";
        $stm = $dbh->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    return [];
}

function findCatetype(): array
{
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $sql = "SELECT * FROM type t;";
        $stm = $dbh->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    return [];
}

function save(array $article): int
{
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        extract($article);
        $sql = "INSERT INTO `article` (`libelle`, `qteStock`, `prixAppro`, `typeId`, `categorieId`) VALUES ('$libelle', '$qteStock', '$prixAppro', '$typeId', '$categorieId')";
        return $dbh->exec($sql);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    return 0;
}

 function supprimer(int $id) {
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement with a placeholder
        $sql = "DELETE FROM `article` WHERE `id` = :id";
        $stmt = $dbh->prepare($sql);
        
        // Bind the actual id value to the placeholder
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Execute the statement
        return $stmt->execute();
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    return 0;
}



 function modifier(int $id, string $libelle, int $qteStock, float $prixAppro, int $categorieId, int $typeId): bool {
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement with placeholders
        $sql = "UPDATE `article` SET `libelle` = :libelle, `qteStock` = :qteStock, `prixAppro` = :prixAppro, `categorieId` = :categorieId, `typeId` = :typeId WHERE `id` = :id";
        $stmt = $dbh->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);
        $stmt->bindParam(':qteStock', $qteStock, PDO::PARAM_INT);
        $stmt->bindParam(':prixAppro', $prixAppro, PDO::PARAM_STR);
        $stmt->bindParam(':categorieId', $categorieId, PDO::PARAM_INT);
        $stmt->bindParam(':typeId', $typeId, PDO::PARAM_INT);

        // Execute the statement
        return $stmt->execute();
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    return false;
}

function getArticleById(int $id) {
    $articles = findAll();
    
    foreach ($articles as $article) {
        if ($article['article_id'] == $id) {
            return $article;
        }
    }
    return null;
}
