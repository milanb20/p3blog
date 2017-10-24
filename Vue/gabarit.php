<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link href="Contenu/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="Contenu/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link rel="stylesheet" href="Contenu/style.css" />

        <script src="Contenu/jquery/jquery.min.js"></script>
        <script src="Contenu/boostrap/js/boostrap.min.js"></script>

        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href=""><h1 id="titreBlog">Mon Blog</h1></a>
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
                <a class="btn btn-danger" href="admin">admin</a>
            </footer>
        </div> <!-- #global -->
    </body>
</html>
