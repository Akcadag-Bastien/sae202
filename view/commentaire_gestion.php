<?php if (!isset($commentaires)) {
    die("Erreur : variable \$commentaires non définie.");
} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des commentaires</title>
</head>
<body>
    <h1>Gestion des commentaires</h1>
    <a href="/">Retour</a>
    <table>
        <thead>
            <tr>
                <th>Auteur</th>
                <th>Contenu</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commentaires as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['auteur_email']) ?></td>
                    <td><?= htmlspecialchars($c['contenu']) ?></td>
                    <td><?= $c['date_commentaire'] ?></td>
                    <td>
                        <?php if (!$c['approuve']): ?>
                        <?php endif; ?>
                        <a href="/commentaire/approuver?id=<?= $c['commentaire_id'] ?>">Approuver</a>
                        <a href="/commentaire/supprimer?id=<?= $c['commentaire_id'] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>