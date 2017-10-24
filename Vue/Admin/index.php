<?php $this->titre = "Mon Blog - Administration" ?>

<h2>Administration</h2>

Bienvenue, <?= $this->nettoyer($login) ?> !
Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s) et <?= $this->nettoyer($nbCommentaires) ?> commentaire(s).
<br>
<a id="lienNbillet" href="admin/creationBillet"><p>Création Billet</p></a>
<br>
<a id="lienModifBillet" href="admin/modifierBillet"><p>Modifier billet</p>
<br>
<a id="lienSupprimerBillet" href="admin/supprimerBillet"> <p> Supprimer billet </p></a>

<br>
<a href='admin/commentaires'>Page Gestion des commentaires</a>
<br>
<a id="lienPass" href="admin/modifierMdp">Changer le mot de passe</a> -
<br>
<a id="lienIns" href="admin/inscription">Ajouter un nouvel utilisateur</a> -
<br>
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>
