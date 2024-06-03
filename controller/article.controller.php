<?php
require_once("../model/article.model.php");
require_once("../model/type.model.php");
require_once("../model/categorie.model.php");

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == "liste-article") {
        listerArticle();
    } elseif ($_REQUEST['action'] == "save-article") {
        unset($_REQUEST['action']);
        unset($_REQUEST['btnSave']);
        store($_REQUEST);
        header("Location: " . WEBROOT . "?controller=article&action=liste-article");
        exit;
    } elseif ($_REQUEST['action'] == "supprimer-article") {
        if (isset($_REQUEST['article_id'])) {
            $id = (int)$_REQUEST['article_id'];
            delete($id);
        }
        header("Location: " . WEBROOT . "?controller=article&action=liste-article");
        exit;
    } elseif ($_REQUEST['action'] == "update-article") {
        if (isset($_REQUEST['article_id'])) {
            $id = (int)$_REQUEST['article_id'];
            unset($_REQUEST['action']);
            unset($_REQUEST['btnUpdate']);
            $newValues = [
                'libelle' => $_REQUEST['libelle'],
                'qteStock' => $_REQUEST['qteStock'],
                'prixAppro' => $_REQUEST['prixAppro'],
                'categorieId' => $_REQUEST['categorieId'],
                'typeId' => $_REQUEST['typeId']
            ];
            update($id, $newValues);
            header("Location: " . WEBROOT . "?controller=article&action=liste-article");
            exit;
        }
    } elseif ($_REQUEST['action'] == 'form-article') {
        ChargerFormulaire();
    } elseif ($_REQUEST['action'] == 'modifier-article') {
        ChargerFormulaireUpdate();
    }
} else {
    listerArticle();
}

function listerArticle(): void {
    $articles = findAll();
    require_once("../views/article/liste.html.php");
}

function ChargerFormulaire(): void {
    $types = findCatetype();
    $categories = findCategorie();
    require_once("../views/article/form.html.php");
}

function ChargerFormulaireUpdate(): void {
    $id = (int)$_REQUEST['article_id'];
    $article = getArticleById($id);
    $types = findCatetype();
    $categories = findCategorie();
    require_once("../views/article/update.form.html.php");
}

function store(array $article): void {
    save($article);
}

function delete(int $id): void {
    supprimer($id);
}

function update(int $id, array $newValues): void {
    if (isset($newValues['libelle'], $newValues['qteStock'], $newValues['prixAppro'], $newValues['categorieId'], $newValues['typeId'])) {
        $libelle = $newValues['libelle'];
        $qteStock = $newValues['qteStock'];
        $prixAppro = $newValues['prixAppro'];
        $categorieId = $newValues['categorieId'];
        $typeId = $newValues['typeId'];
        modifier($id, $libelle, $qteStock, $prixAppro, $categorieId, $typeId);
    } else {
        echo "Tous les champs nécessaires ne sont pas fournis.";
    }
}

