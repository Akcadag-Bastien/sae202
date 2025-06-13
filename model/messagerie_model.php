<?php
require_once('conf/conf.inc.php'); 

function getMessages($email, $type)
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    
    if ($type == 'recu') {
        $req = $pdo->prepare("SELECT * FROM message WHERE destinataire = :email ORDER BY date_envoi DESC");
    } else {
        $req = $pdo->prepare("SELECT * FROM message WHERE expediteur = :email ORDER BY date_envoi DESC");
    }
    
    $req->execute(['email' => $email]);
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function getMessage($id)
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $req = $pdo->prepare("SELECT * FROM message WHERE id = :id");
    $req->execute(['id' => $id]);
    return $req->fetch(PDO::FETCH_ASSOC);
}

function envoyerMessage($expediteur, $destinataire, $sujet, $message) 
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("INSERT INTO message (expediteur, destinataire, sujet, message, date_envoi) VALUES (:expediteur, :destinataire, :sujet, :message, NOW())");
    
    return $stmt->execute([
        'expediteur' => $expediteur,
        'destinataire' => $destinataire,
        'sujet' => $sujet,
        'message' => $message
    ]);
}

function marquerLu($id)
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("UPDATE message SET lu = 1 WHERE id = :id");
    return $stmt->execute(['id' => $id]);
}

function supprimerMessage($id)
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("DELETE FROM message WHERE id = :id");
    return $stmt->execute(['id' => $id]);
}
?>