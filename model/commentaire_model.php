<?php
require_once('conf/conf.inc.php');

function proposerCommentaire($email, $contenu)
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO commentaire (auteur_email, contenu, date_commentaire, approuve) VALUES (:email, :contenu, NOW(), 0)");
    return $stmt->execute([
        'email' => $email,
        'contenu' => $contenu
    ]);
}

function getCommentairesApprouves()
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT * FROM commentaire WHERE approuve = 1 ORDER BY date_commentaire DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCommentairesEnAttente()
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT * FROM commentaire WHERE approuve = 0 ORDER BY date_commentaire DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function approuverCommentaire($id)
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("UPDATE commentaire SET approuve = 1 WHERE commentaire_id = :id");
    return $stmt->execute(['id' => $id]);
}

function supprimerCommentaire($id)
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("DELETE FROM commentaire WHERE commentaire_id = :id");
    return $stmt->execute(['id' => $id]);
}

function getTousCommentaires()
{
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $stmt = $pdo->query("SELECT * FROM commentaire ORDER BY date_commentaire DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>