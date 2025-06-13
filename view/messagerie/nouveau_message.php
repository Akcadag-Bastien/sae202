<div id="contenu">
    <h1>Nouveau message</h1>
    
    <?php if (isset($_SESSION['message'])): ?>
        <div class="message"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>
    
    <form action="/messagerie/envoyer_message" method="post">
        <div>
            <label for="destinataire">Destinataire :</label>
            <select name="destinataire" id="destinataire" required>
                <option value="">Choisir un destinataire</option>
                <?php foreach ($participants as $participant): ?>
                    <option value="<?= htmlspecialchars($participant['participant_email']) ?>">
                        <?= htmlspecialchars($participant['participant_prenom'] . ' ' . $participant['participant_nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div>
            <label for="sujet">Sujet :</label>
            <input type="text" name="sujet" id="sujet" required>
        </div>
        
        <div>
            <label for="message">Message :</label>
            <textarea name="message" id="message" rows="10" required></textarea>
        </div>
        
        <div>
            <input type="submit" value="Envoyer">
            <a href="/messagerie">Annuler</a>
        </div>
    </form>
</div>