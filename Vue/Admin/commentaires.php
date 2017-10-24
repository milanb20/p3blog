<?php $this->titre = "Mon Blog - Gestion des commentaires" ?>

<table class="table">
  <?php foreach ($commentaires as $commentaire): ?>
  <tr>
    <td><?= $this->nettoyer($commentaire['auteur']) ?></td>
    <td><?= $this->nettoyer($commentaire['contenu']) ?></td>
    <td>Lien vers suppression du com</td>
  </tr>
  <?php endforeach; ?>
</table>
