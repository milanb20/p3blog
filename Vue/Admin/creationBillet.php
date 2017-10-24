<?php $this->titre = "Mon Blog - Ajouter un nouveau billet" ?>
    <h3>Création d'un nouveau billet</h3>
    <form method="post">
        <input name="dateBillet" placeholder="Entrez la date de ce billet"
               required>
        <input name="titreBillet" placeholder="Entrez votre le titre"
               required>
        <textarea id="tiny" name="contenuBillet" placeholder="Le texte">Votre prochain chapitre commence içi</textarea>
        <button type="submit">Créer le nouveau billet</button>
    </form>

<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>
