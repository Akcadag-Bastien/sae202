<?php
require_once('model/messagerie_model.php');

function index()
{
    session_start();
    
    if (!isset($_SESSION['participant_email'])) {
        header('Location: /connexion');
        exit;
    }
    
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');

    $email = $_SESSION['participant_email'];
    $messagesE = getMessages($email, 'envoye');
    $messagesR = getMessages($email, 'recu');

    require('view/messagerie/messages.php');
    require('view/autres_pages/footer.php');
}

function nouveau_message()
{
    session_start();
    
    if (!isset($_SESSION['participant_email'])) {
        header('Location: /connexion');
        exit;
    }
    
    require('model/participants_model.php');
    $participants = getAdministrateurs();

    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/messagerie/nouveau_message.php');
    require('view/autres_pages/footer.php');
}

function envoyer_message()
{
    session_start();

    if (!isset($_SESSION['participant_email'])) {
        $_SESSION['message'] = "Vous devez être connecté pour envoyer un message.";
        header('Location: /connexion');
        exit;
    }

    if (empty($_POST['destinataire']) || empty($_POST['sujet']) || empty($_POST['message'])) {
        $_SESSION['message'] = 'Tous les champs doivent être remplis.';
        header('Location: /messagerie/nouveau_message');
        exit;
    }

    require_once('model/participants_model.php');
    $adminEmails = array_column(getAdministrateurs(), 'participant_email');

    $expediteur = $_SESSION['participant_email'];
    $destinataire = htmlspecialchars($_POST['destinataire']);
    $sujet = htmlspecialchars($_POST['sujet']);
    $message = htmlspecialchars($_POST['message']);

    if (!in_array($destinataire, $adminEmails)) {
        $_SESSION['message'] = "Vous ne pouvez envoyer un message qu'aux administrateurs.";
        header('Location: /messagerie/nouveau_message');
        exit;
    }

    envoyerMessage($expediteur, $destinataire, $sujet, $message);

    $_SESSION['message'] = 'Message envoyé avec succès !';
    header('Location: /messagerie');
}

function afficher_message()
{
    session_start();
    
    if (!isset($_SESSION['participant_email'])) {
        header('Location: /connexion');
        exit;
    }
    
    $id = $_GET['id'] ?? '';
    if ($id) {
        marquerLu($id);
        $message = getMessage($id);
    }
    
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/messagerie/message_affiche.php');
    require('view/autres_pages/footer.php');
}

function supprimer_message()
{
    session_start();
    
    if (!isset($_SESSION['participant_email'])) {
        header('Location: /connexion');
        exit;
    }
    
    $id = $_GET['id'] ?? '';
    supprimerMessage($id);
    $_SESSION['message'] = 'Message supprimé avec succès !';
    header('Location: /messagerie');
}
?>