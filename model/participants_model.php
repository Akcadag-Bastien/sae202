<?php
require_once('conf/conf.inc.php'); 

function getParticipants()
{
    $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $req = $db->query('SELECT * FROM participants');
    $participants = $req->fetchAll(PDO::FETCH_ASSOC);
    return $participants;
}

function getAdministrateurs()
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $req = $pdo->prepare("SELECT participant_email, participant_nom, participant_prenom FROM participants WHERE role = 'admin'");
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function verif_utilisateur($participant_mail) 
{
    $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $req = $db->prepare('SELECT * FROM participants WHERE participant_email = :email');
    $req->execute(['email' => $participant_mail]);
    $participant = $req->fetch(PDO::FETCH_ASSOC);
    
    return $participant;
}

function inscription_utilisateur($nom, $prenom, $email, $adresse, $code_postal, $ville, $pays, $telephone, $mdp, $role = 'utilisateur')
{
    $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $req = $db->prepare('INSERT INTO participants (
        participant_nom,
        participant_prenom,
        participant_email,
        participant_adresse,
        participant_code_postal,
        participant_ville,
        participant_pays,
        participant_telephone,
        participant_mdp,
        role
    ) VALUES (
        :nom,
        :prenom,
        :email,
        :adresse,
        :code_postal,
        :ville,
        :pays,
        :telephone,
        :mdp,
        :role
    )');

    $result = $req->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'adresse' => $adresse ?: null,
        'code_postal' => is_numeric($code_postal) ? $code_postal : null,
        'ville' => $ville ?: null,
        'pays' => $pays ?: null,
        'telephone' => is_numeric($telephone) ? $telephone : null,
        'mdp' => $mdp,
        'role' => $role
    ]);

    return $result;
}

function getRole($email)
{
    $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $req = $db->prepare("SELECT role FROM participants WHERE participant_email = :email");
    $req->execute(['email' => $email]);
    $result = $req->fetch(PDO::FETCH_ASSOC);
    
    return $result ? $result['role'] : null;
}

?>