<?php
session_start();

if (!isset($_SESSION['participant_email'])) {
    header('Location: /connexion');
    exit;
}

function index(){
require_once('model/participants_model.php');
require_once('model/commentaire_model.php');
}

$admin = getRole($_SESSION['participant_email']) === 'admin';
if (!$admin) {
    $_SESSION['message'] = "Accès réservé aux administrateurs.";
    header('Location: /');
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['message'] = "ID de commentaire invalide.";
    header('Location: commentaire_gestion_controller.php');
    exit;
}

$commentaire_id = (int)$_GET['id'];

try {
    if (($commentaire_id)) {
        $_SESSION['message'] = "Commentaire approuvé avec succès.";
    } else {
        $_SESSION['message'] = "Erreur lors de l'approbation du commentaire.";
    }
} catch (Exception $e) {
    $_SESSION['message'] = "Erreur : " . $e->getMessage();
}

header('Location: commentaire_gestion_controller.php');
exit;
?>