<?php
require_once('conf/conf.inc.php');

function get_utilisateur_par_email($email) {
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM participants WHERE participant_email = :email");
    $stmt->execute([':email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function modifierInfos($email, $nom, $prenom, $adresse, $code_postal, $ville, $pays, $telephone, $mdp = null) {
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($mdp) {
        $sql = "UPDATE participants SET 
            participant_nom = :nom,
            participant_prenom = :prenom,
            participant_adresse = :adresse,
            participant_code_postal = :code_postal,
            participant_ville = :ville,
            participant_pays = :pays,
            participant_telephone = :telephone,
            participant_mdp = :mdp
        WHERE participant_email = :email";
    } else {
        $sql = "UPDATE participants SET 
            participant_nom = :nom,
            participant_prenom = :prenom,
            participant_adresse = :adresse,
            participant_code_postal = :code_postal,
            participant_ville = :ville,
            participant_pays = :pays,
            participant_telephone = :telephone
        WHERE participant_email = :email";
    }

    $stmt = $pdo->prepare($sql);

    $params = [
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':adresse' => $adresse,
        ':code_postal' => $code_postal,
        ':ville' => $ville,
        ':pays' => $pays,
        ':telephone' => $telephone,
        ':email' => $email
    ];

    if ($mdp) {
        $params[':mdp'] = $mdp;
    }

    return $stmt->execute($params);
}
?>