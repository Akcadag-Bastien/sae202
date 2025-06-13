<div id="contenu">
    <h1>Inscription</h1>
    
    <?php if (isset($_GET['error'])): ?>
        <div class="error">
            <?php
            switch($_GET['error']) {
                case 'password_mismatch':
                    echo 'Les mots de passe ne correspondent pas.';
                    break;
                case 'missing_fields':
                    echo 'Tous les champs obligatoires doivent être remplis.';
                    break;
                case 'user_exists':
                    echo 'Un utilisateur avec cet email existe déjà.';
                    break;
            }
            ?>
        </div>
    <?php endif; ?>
    
    <form action="/connexion/validation_inscription" method="post">
        <div>
            <label for="participant_nom">Nom :*</label>
            <input type="text" name="participant_nom" id="participant_nom" required>
        </div>
        
        <div>
            <label for="participant_prenom">Prénom :*</label>
            <input type="text" name="participant_prenom" id="participant_prenom" required>
        </div>
        
        <div>
            <label for="participant_mail">Email :*</label>
            <input type="email" name="participant_mail" id="participant_mail" required>
        </div>

        <div>
            <label for="participant_adresse">Adresse :</label>
            <input type="text" name="participant_adresse" id="participant_adresse">
        </div>
        
        <div>
            <label for="participant_code_postal">Code postal :</label>
            <input type="num" name="participant_code_postal" id="participant_code_postal">
        </div>
        
        <div>
            <label for="participant_ville">Ville :</label>
            <input type="text" name="participant_ville" id="participant_ville">
        </div>

        <div>
            <label for="participant_pays">Pays :</label>
            <input type="text" name="participant_pays" id="participant_pays">
        </div>
        
        <div>
            <label for="participant_telephone">Téléphone :</label>
            <input type="num" name="participant_telephone" id="participant_telephone">
        </div>
    
        <div>
            <label for="mot_de_passe">Mot de passe :*</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        </div>
        
        <div>
            <label for="mot_de_passe2">Confirmer mot de passe :*</label>
            <input type="password" name="mot_de_passe2" id="mot_de_passe2" required>
        </div>
        
        <div>
            <input type="submit" value="S'inscrire">
            <a href="/connexion">Déjà inscrit ? Se connecter</a>
        </div>
    </form>
</div>