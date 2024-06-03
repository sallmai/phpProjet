<?php

function findAllCategorie(): array
{
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $sql = "SELECT * FROM `categorie`";
        $stm = $dbh->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
}

function saveCategorie(array $categorie): int
{
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        extract($categorie);
        $sql = "INSERT INTO `categorie` (`nomCategorie`) VALUES ('$nomCategorie')";
        return $dbh->exec($sql);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    return 0;
}

function supprimerCategorie(int $id) {
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement with a placeholder
        $sql = "DELETE FROM `categorie` WHERE `id` = :id";
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

function getCategorieById(int $id) {
    $categories = findAllCategorie();
    
    foreach ($categories as $categorie) {
        if ($categorie['id'] == $id) {
            return $categorie;
        }
    }
    return null;
}



function modifierCategorie(int $id, string $nomCategorie): bool {
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prépare la requête SQL avec des placeholders
        $sql = "UPDATE `categorie` SET `nomCategorie` = :nomCategorie WHERE `id` = :id";
        $stmt = $dbh->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nomCategorie', $nomCategorie, PDO::PARAM_STR);

        // Exécution de la requête
        return $stmt->execute();
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    return false;
}
