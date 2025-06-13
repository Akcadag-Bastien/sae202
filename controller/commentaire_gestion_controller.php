<?php
{
    session_start();

    require_once('model/participants_model.php');
    require_once('model/commentaire_model.php');

    if (!isset($_SESSION['participant_email'])) {
        header('Location: /connexion');
        exit;
    }

    if (getRole($_SESSION['participant_email']) !== 'admin') {
        $_SESSION['message'] = "Accès réservé aux administrateurs.";
        header('Location: /');
        exit;
    }

    $commentaires = getTousCommentaires();

    require('view/commentaire_gestion.php');
}