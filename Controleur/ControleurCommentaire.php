<?php
namespace Blog\Controleur;

require_once 'Framework\Controleur';
require_once 'Modele\Billet';
require_once 'Blog\'Modele\Commentaire';

/**
 * Contrôleur des actions liées aux billets
 *
 * @author Baptiste Pesquet
 */
class ControleurCommentaire extends Controleur {


    private $commentaire;

    /**
     * Constructeur
     */
    public function __construct() {
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function index() {
    }

    // Signalement
    public function signaler() {
        $idCommentaire = $this->requete->getParametre("id");
        $com = $this->commentaire->getCommentaire($idCommentaire);
        $this->commentaire->ajouterUnSignalement($idCommentaire);

        $this->rediriger("billet","index/" . $com['bil_id']);

        //
        //  header("Location: /coursPhp/chapitre3_mvc/tp_MonBlog/MonBlog-final/billet/index/$com[bil_id]");
    }
}
