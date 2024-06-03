<?php
require_once("../model/type.model.php");

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == "liste-type") {
        listerType();
    } elseif ($_REQUEST['action'] == "save-type") {
        unset($_REQUEST['action']);
        unset($_REQUEST['btn-save']);
        store($_REQUEST);
        
        header("Location: " . WEBROOT . "?controller=type&action=liste-type");
       
        exit;
    } elseif ($_REQUEST['action'] == 'form-type') {
        listerType();
    }elseif ($_REQUEST['action'] == "supprimer-type") {
        if (isset($_REQUEST['type_id'])) {
            $id = (int)$_REQUEST['type_id'];
            deleteType($id);
            header("Location: " . WEBROOT . "?controller=type&action=liste-type");
            exit;
        }
        }elseif ($_REQUEST['action'] == "update-type") {
            if (isset($_REQUEST['type_id'])) {
                $id = (int)$_REQUEST['type_id'];
                unset($_REQUEST['action']);
                unset($_REQUEST['btnUpdate']);
                $newValues = [
                    'nomType' => $_REQUEST['nomType'],
                ];
                updateType($id, $newValues);
                header("Location: " . WEBROOT . "?controller=type&action=liste-type");
                exit;
            }
    } elseif ($_REQUEST['action'] == 'modifier-type') {
        ChargerFormulaireUpdate();
    }
} else {
    listerType();
}

function listerType(): void
{
    $types = findAlltype();
    
   
    require_once("../views/type/liste.html.php");
}

function store(array $type): void
{
    saveType($type);
}

function deleteType(int $id): void {
    supprimerType($id);
}


function ChargerFormulaireUpdate(): void {
    $id = (int)$_REQUEST['type_id'];
    $type = getTypeById($id);
   
    
    require_once("../views/type/update.form.html.php");
}


function updateType(int $id, array $newValues): void {
    if (isset($newValues['nomType'])) {
        $nomType = $newValues['nomType'];
        modifierType($id, $nomType);
    } else {
        echo "Tous les champs nécessaires ne sont pas fournis.";
    }
}