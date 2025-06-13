<div id="contenu">
  <h1>Bienvenue!</h1>
</div>

<h2>Commentaires des utilisateurs</h2>
<ul>
    <?php
    require_once('model/commentaire_model.php');
    foreach (getCommentairesApprouves() as $com):
    ?>
        <li>
            <strong><?= $com['auteur_email'] ?></strong> :
            <blockquote><?= htmlspecialchars($com['contenu']) ?></blockquote>
        </li>
    <?php endforeach; ?>
</ul>