<div id="contenu">
    <h1>Mon profil</h1>

    <form action="/profil/validation_profil" method="post">
        <div>
            <label for="participant_nom">Nom :</label>
            <input type="text" name="participant_nom" id="participant_nom" value="<?= htmlspecialchars($utilisateur['participant_nom']) ?>" required>
        </div>

        <div>
            <label for="participant_prenom">Prénom :</label>
            <input type="text" name="participant_prenom" id="participant_prenom" value="<?= htmlspecialchars($utilisateur['participant_prenom']) ?>" required>
        </div>

        <div>
            <label for="participant_mail">Email :</label>
            <input type="email" id="participant_mail" value="<?= htmlspecialchars($utilisateur['participant_email']) ?>" disabled>
        </div>

        <div>
            <label for="participant_adresse">Adresse :</label>
            <input type="text" name="participant_adresse" id="participant_adresse" value="<?= htmlspecialchars($utilisateur['participant_adresse']) ?>" required>
        </div>

        <div>
            <label for="participant_code_postal">Code postal :</label>
            <input type="text" name="participant_code_postal" id="participant_code_postal" value="<?= htmlspecialchars($utilisateur['participant_code_postal']) ?>" required>
        </div>

        <div>
            <label for="participant_ville">Ville :</label>
            <input type="text" name="participant_ville" id="participant_ville" value="<?= htmlspecialchars($utilisateur['participant_ville']) ?>" required>
        </div>

        <div>
            <label for="participant_pays">Pays :</label>
            <input type="text" name="participant_pays" id="participant_pays" value="<?= htmlspecialchars($utilisateur['participant_pays']) ?>" required>
        </div>

        <div>
            <label for="participant_telephone">Téléphone :</label>
            <input type="text" name="participant_telephone" id="participant_telephone" value="<?= htmlspecialchars($utilisateur['participant_telephone']) ?>" required>
        </div>

        <div>
            <label for="mot_de_passe">Nouveau mot de passe :</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe">
        </div>

        <div>
            <label for="mot_de_passe2">Confirmer mot de passe :</label>
            <input type="password" name="mot_de_passe2" id="mot_de_passe2">
        </div>

        <div>
            <button type="submit">Mettre à jour</button>
        </div>
    </form>
</div>