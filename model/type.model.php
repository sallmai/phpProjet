<?php

function findAlltype(): array
{
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $sql = "SELECT * FROM `type`";
        $stm = $dbh->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
}

function savetype(array $article): int
{
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        extract($article);
        $sql = "INSERT INTO `type` (`nomType`) VALUES ('$nomType')";
        return $dbh->exec($sql);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    return 0;
}

function supprimerType(int $id) {
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
        $sql = "DELETE FROM `type` WHERE `id` = :id";
        $stmt = $dbh->prepare($sql);
        
      
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        
        return $stmt->execute();
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    return 0;
}


function getTypeById(int $id) {
    $types= findAlltype();
    
    foreach ($types as $type) {
        if ($type['id'] == $id) {
            return $type;
        }
    }
    return null;
}



function modifierType(int $id, string $nomType): bool {
    $dsn = 'mysql:host=localhost:3306;dbname=atelier_couture';
    $username = 'root';
    $password = 'mai2004?';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       
        $sql = "UPDATE `type` SET `nomType` = :nomType WHERE `id` = :id";
        $stmt = $dbh->prepare($sql);

      
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nomType', $nomType, PDO::PARAM_STR);

       
        return $stmt->execute();
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    return false;
}
