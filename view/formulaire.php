<div>
    <h2>Proposer un commentaire</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="message"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <form method="post" action="/commentaire/soumettre">
        <textarea name="contenu" rows="5" required placeholder="Votre commentaire ici..."></textarea>
        <br>
        <button type="submit">Envoyer</button>
    </form>
</div>