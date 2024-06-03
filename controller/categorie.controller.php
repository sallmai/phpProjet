<?php
require_once("../model/categorie.model.php");

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == "liste-categorie") {
        listerCategorie();
    } elseif ($_REQUEST['action'] == "save-categorie") {
        unset($_REQUEST['action']);
        unset($_REQUEST['btn-save']);
        store($_REQUEST);
        
        header("Location: " . WEBROOT . "?controller=categorie&action=liste-categorie");
       
        exit;
    } elseif ($_REQUEST['action'] == 'form-categorie') {
        listerType();
    } elseif ($_REQUEST['action'] == "supprimer-categorie") {
        if (isset($_REQUEST['categorie_id'])) {
            $id = (int)$_REQUEST['categorie_id'];
            delete($id);
            header("Location: " . WEBROOT . "?controller=categorie&action=liste-categorie");
            exit;
        }
        }elseif ($_REQUEST['action'] == "update-categorie") {
            if (isset($_REQUEST['categorie_id'])) {
                $id = (int)$_REQUEST['categorie_id'];
                unset($_REQUEST['action']);
                unset($_REQUEST['btnUpdate']);
                $newValues = [
                    'nomCategorie' => $_REQUEST['nomCategorie'],
                ];
                updateCategorie($id, $newValues);
                header("Location: " . WEBROOT . "?controller=categorie&action=liste-categorie");
                exit;
            }
    } elseif ($_REQUEST['action'] == 'modifier-categorie') {
        ChargerFormulaireUpdate();
    }
} else {
    listerType();
}


function listerCategorie(): void
{

    $categories = findAllCategorie();
    
  
    require_once("../views/categorie/liste.html.php");
}

function store(array $categorie): void
{
    saveCategorie($categorie);
}

function delete(int $id): void {
    supprimerCategorie($id);
}

function ChargerFormulaireUpdate(): void {
    $id = (int)$_REQUEST['categorie_id'];
    $categorie = getCategorieById($id);
    
    require_once("../views/categorie/update.form.html.php");
}


function updateCategorie(int $id, array $newValues): void {
    if (isset($newValues['nomCategorie'])) {
        $nomCategorie = $newValues['nomCategorie'];
        modifierCategorie($id, $nomCategorie);
    } else {
        echo "Tous les champs nécessaires ne sont pas fournis.";
    }
}