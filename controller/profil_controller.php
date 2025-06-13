<?php

require('model/profil_model.php');

function index() {
    session_start();
    if (!isset($_SESSION['participant_email'])) {
        header('Location: /connexion');
        exit;
    }

    $utilisateur = get_utilisateur_par_email($_SESSION['participant_email']);

    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/profil_view.php');
    require('view/autres_pages/footer.php');
}

function validation_profil() {
    session_start();
    if (!isset($_SESSION['participant_email'])) {
        header('Location: /connexion');
        exit;
    }

    $email = $_SESSION['participant_email'];

    $required_fields = [
        'participant_nom', 'participant_prenom',
        'participant_adresse', 'participant_code_postal', 'participant_ville',
        'participant_pays', 'participant_telephone'
    ];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            header('Location: /profil?error=missing_fields');
            exit;
        }
    }

    $mdp = null;
    if (!empty($_POST['mot_de_passe']) || !empty($_POST['mot_de_passe2'])) {
        if ($_POST['mot_de_passe'] !== $_POST['mot_de_passe2']) {
            header('Location: /profil?error=password_mismatch');
            exit;
        }
        $mdp = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    }

    modifierInfos(
        $email,
        $_POST['participant_nom'],
        $_POST['participant_prenom'],
        $_POST['participant_adresse'],
        $_POST['participant_code_postal'],
        $_POST['participant_ville'],
        $_POST['participant_pays'],
        $_POST['participant_telephone'],
        $mdp
    );

    $_SESSION['participant_nom'] = $_POST['participant_nom'];
    header('Location: /profil?success=updated');
    exit;
}
?>