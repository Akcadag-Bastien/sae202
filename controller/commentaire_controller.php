<?php
require_once('model/commentaire_model.php');

function index(){
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/formulaire.php');
    require('view/autres_pages/footer.php');
}

function soumettre()
{
    session_start();
    if (!isset($_SESSION['participant_email'])) {
        $_SESSION['message'] = "Vous devez être connecté pour commenter.";
        header('Location: /connexion');
        exit;
    }

    if (empty($_POST['contenu'])) {
        $_SESSION['message'] = "Le champ commentaire est vide.";
        header('Location: /commentaire/formulaire');
        exit;
    }

    proposerCommentaire($_SESSION['participant_email'], htmlspecialchars($_POST['contenu']));
    $_SESSION['message'] = "Votre commentaire a été soumis. Il sera visible après validation.";
    header('Location: /');
}

function formulaire_commentaire()
{
    session_start();
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/commentaire/formulaire.php');
    require('view/autres_pages/footer.php');
}

function gerer()
{
    session_start();
    if (!isset($_SESSION['participant_email'])) {
        header('Location: /connexion');
        exit;
    }

    require_once('model/participants_model.php');
    $admin = getRole($_SESSION['participant_email']) === 'admin';

    if (!$admin) {
        $_SESSION['message'] = "Accès réservé aux administrateurs.";
        header('Location: /');
        exit;
    }

    $commentaires = getCommentairesEnAttente();

    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/accueil_view.php');
    require('view/autres_pages/footer.php');
}

function approuver()
{
    session_start();
    if (!isset($_SESSION['participant_email'])) {
        header('Location: /connexion');
        exit;
    }

    require_once('model/participants_model.php');
    if (getRole($_SESSION['participant_email']) === 'admin') {
        approuverCommentaire($_GET['id']);
    }

    header('Location: /commentaire/gerer');
}

function supprimer()
{
    session_start();
    if (!isset($_SESSION['participant_email'])) {
        header('Location: /connexion');
        exit;
    }

    require_once('model/participants_model.php');
    if (getRole($_SESSION['participant_email']) === 'admin') {
        supprimerCommentaire($_GET['id']);
    }

    header('Location: /commentaire/gerer');
}