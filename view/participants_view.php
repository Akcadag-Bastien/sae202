<div id="contenu">
    <h1>Participants</h1>
    <p>Voici la liste des participants :</p>
    <table>
        <tr>
            <th>Code</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Code postal</th>
            <th>Ville</th>
            <th>Pays</th>
            <th>Telephone</th>
            <th>Date de naissance</th>
            <th>Email</th>
        </tr>
        <?php
        $titre=(isset($titre)) ? $titre : "";
        echo "<H2>".$titre."</H2>";
        foreach ($participants as $participant) {
            echo '<tr>';
            echo '<td>' . $participant['participant_code'] . '</td>';
            echo '<td>' . $participant['participant_prenom'] . '</td>';
            echo '<td>' . $participant['participant_nom'] . '</td>';
            echo '<td>' . $participant['participant_adr'] . '</td>';
            echo '<td>' . $participant['participant_cp'] . '</td>';
            echo '<td>' . $participant['participant_ville'] . '</td>';
            echo '<td>' . $participant['participant_pays'] . '</td>';
            echo '<td>' . $participant['participant_tel'] . '</td>';
            echo '<td>' . $participant['participant_email'] . '</td>';
            echo '</tr>';
        }
        ?>
<div class="remarque"></div>
</div>