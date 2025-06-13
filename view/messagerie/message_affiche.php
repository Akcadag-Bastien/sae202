<?php
echo '<h2>Objet : ' . $message['sujet'] . '</h2>';
echo '<h2>Expéditeur : ' . $message['expediteur'] . '</h2>';
echo '<h2>Destinataire : ' . $message['destinataire'] . '</h2>';
echo '<h4>Message : ' . $message['message'] . '</h4>';
echo '<h4>Date d\'envoi : ' . $message['date_envoi'] . '</h4>';
echo '<a href="/messagerie">Retour à la liste des messages</a>';
?>