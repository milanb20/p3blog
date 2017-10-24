<?php $this->titre = "Mon Blog"; ?>

<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
            <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>">
                <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
            </a>
            <time><?= $this->nettoyer($billet['date']) ?></time>
        </header>
        <p><?= $this->nettoyer($billet['contenu']) ?></p>
    </article>
    <hr />
<?php endforeach; ?>

<?php $this->lien = "<a href='email'>M'envoyer un email</a> - <a href='admin'>Administration</a>"; ?>
