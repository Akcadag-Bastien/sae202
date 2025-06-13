<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des participants</title>
</head>
<body>
    <h1>Participants :</h1>
    <a href="/">Retour</a>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Téléphone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($participants as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['participant_nom']) ?></td>
                    <td><?= htmlspecialchars($c['participant_prenom']) ?></td>
                    <td><?= htmlspecialchars($c['participant_email']) ?></td>
                    <td><?= htmlspecialchars($c['participant_adresse']) ?></td>
                    <td><?= htmlspecialchars($c['participant_code_postal']) ?></td>
                    <td><?= htmlspecialchars($c['participant_ville']) ?></td>
                    <td><?= htmlspecialchars($c['participant_telephone']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>