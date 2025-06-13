<header>
 <nav>
<a href="/">Accueil</a>
<a href="/concept">Concept</a>
<a href="/infos_pratiques">Infos pratiques</a>
<a href="/mentions_legales">Mentions légales</a>
<a href="/admin">Admin</a>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['participant_nom'])) {
echo '<div id="connexion">Bienvenue ' . $_SESSION['participant_nom'] . ' <a href="/connexion/deconnexion">Déconnexion</a></div>' . ' <a href="/profil">Profil</a></div>';
 } else {
echo '<div id="connexion">
 <a href="/connexion">Connexion</a>
 <a href="/connexion/inscription">Inscription</a>
 </div>';
 }
?>

<?php if (isset($_SESSION['participant_email'])) : ?>
<ul>
<li><a href="/messagerie">Messagerie</a></li>
<li><a href="/messagerie/nouveau_message">Nouveau message</a></li>
<li><a href="/commentaire">Commentaire</a></li>
</ul>
<?php endif; ?>

</nav>
</header>