<?php
// Un contrôleur pour la connexion
require('model/participants_model.php');

function index()
{
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/connexion_view.php');
    require('view/autres_pages/footer.php');
}

function inscription()
{
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/inscription_view.php');
    require('view/autres_pages/footer.php');
}

function verif_connexion()
{
    if (isset($_POST['participant_mail']) && isset($_POST['mot_de_passe'])) {
        $resultat = verif_utilisateur($_POST['participant_mail']);
        
        if ($resultat && $resultat['participant_email'] == $_POST['participant_mail'] && 
            password_verify($_POST['mot_de_passe'], $resultat['participant_mdp'])) {
            
            session_start();
            $_SESSION['participant_nom'] = $resultat['participant_nom'];
            $_SESSION['participant_email'] = $resultat['participant_email'];
            header('Location: /');
        } else {
            header('Location: /connexion?error=1');
        }
    } else {
        header('Location: /connexion?error=2');
    }
}

function deconnexion()
{
    session_start();
    session_destroy();
    header('Location: /');
}

function validation_inscription()
{
    if (!empty($_POST['participant_mail']) && !empty($_POST['mot_de_passe']) && 
        !empty($_POST['mot_de_passe2']) && !empty($_POST['participant_nom']) && 
        !empty($_POST['participant_prenom'])) {
        
        if ($_POST['mot_de_passe'] == $_POST['mot_de_passe2']) {
            $resultat = verif_utilisateur($_POST['participant_mail']);
            
            if (!$resultat) {
                $mdp = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

                $adresse = $_POST['participant_adresse'] ?? '';
                $code_postal = $_POST['participant_code_postal'] ?? '';
                $ville = $_POST['participant_ville'] ?? '';
                $pays = $_POST['participant_pays'] ?? '';
                $telephone = $_POST['participant_telephone'] ?? '';

                inscription_utilisateur(
                    $_POST['participant_nom'],
                    $_POST['participant_prenom'],
                    $_POST['participant_mail'],
                    $adresse,
                    $code_postal,
                    $ville,
                    $pays,
                    $telephone,
                    $mdp
                );
                
                session_start();
                $_SESSION['participant_nom'] = $_POST['participant_nom'];
                $_SESSION['participant_email'] = $_POST['participant_mail'];
                header('Location: /');
                exit;
            } else {
                header('Location: /connexion?error=user_exists');
                exit;
            }
        } else {
            header('Location: /connexion/inscription?error=password_mismatch');
            exit;
        }
    } else {
        header('Location: /connexion/inscription?error=missing_fields');
        exit;
    }
}
?>