<?php $this->titre = "Mon Blog - Ajouter un utilisateur" ?>
    <p>Ajouter un utilisateur</p>
    <form action="admin/inscription" method="post">
        <input name="pseudo" placeholder="Entrez votre pseudo"
               required>
        <input name="nom" placeholder="Entrez votre nom"
               required>
        <input name="prenom" placeholder="Entrez votre prenom"
               required>
        <input name="dateNaissance" placeholder="Entrez votre date de naissance"
               required>
        <input name="email" placeholder="Entrez votre Email"
               required>
        <input name="mdp" type="password" placeholder="Entrez votre mot de passe"
               required>

        <button type="submit">Ajouter l'utilisateur</button>
    </form>
<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>
