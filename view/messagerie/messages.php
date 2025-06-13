<h2>Messages reçus</h2>
<table>
    <thead>
        <tr>
            <th>Expéditeur</th>
            <th>Sujet</th>
            <th>Date d'envoi</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messagesR as $message): ?>
            <tr>
                <td><?php echo htmlspecialchars($message['expediteur']); ?></td>
                <td><?php echo htmlspecialchars($message['sujet']); ?></td>
                <td><?php echo htmlspecialchars($message['date_envoi']); ?></td>
                <td><?php echo $message['lu'] ? 'Lu' : 'Non lu'; ?></td>
                <td>
                    <a href="/messagerie/afficher_message?id=<?php echo urlencode($message['id']); ?>">Afficher</a>
                    <a href="/messagerie/supprimer_message?id=<?php echo urlencode($message['id']); ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>Messages envoyés</h2>
<table>
    <thead>
        <tr>
            <th>Destinataire</th>
            <th>Sujet</th>
            <th>Date d'envoi</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messagesE as $message): ?>
            <tr>
                <td><?php echo htmlspecialchars($message['destinataire']); ?></td>
                <td><?php echo htmlspecialchars($message['sujet']); ?></td>
                <td><?php echo htmlspecialchars($message['date_envoi']); ?></td>
                <td>
                <a href="/messagerie/afficher_message?id=<?php echo urlencode($message['id']); ?>">Afficher</a>
                <a href="/messagerie/supprimer_message?id=<?php echo urlencode($message['id']); ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>