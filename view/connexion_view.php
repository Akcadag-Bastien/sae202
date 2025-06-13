<div id="contenu">
    <h1>Connexion</h1>
    
    <?php if (isset($_GET['error'])): ?>
        <div class="error">
            <?php
            switch($_GET['error']) {
                case '1':
                    echo 'Email ou mot de passe incorrect.';
                    break;
                case '2':
                    echo 'Veuillez remplir tous les champs.';
                    break;
            }
            ?>
        </div>
    <?php endif; ?>
    
    <form action="/connexion/verif_connexion" method="post">
        <div>
            <label for="participant_mail">Email :</label>
            <input type="email" name="participant_mail" id="participant_mail" required>
        </div>
        
        <div>
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        </div>
        
        <div>
            <input type="submit" value="Se connecter">
            <a href="/connexion/inscription">Pas encore inscrit ?</a>
        </div>
    </form>
</div>