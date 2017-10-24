<?php
require_once 'ControleurSecurise.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/Utilisateur.php';
/**
 * Contrôleur des actions d'administration
 *
 * @author Baptiste Pesquet
 */
class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;
    private $Utilisateur;
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
        $this->utilisateur = new Utilisateur();
    }
    public function index()
    {
        $nbBillets = $this->billet->getNombreBillets();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $billets = $this->billet->getBilletsAbreger();


        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbBillets' => $nbBillets, 'nbCommentaires' => $nbCommentaires, 'login' => $login));
    }
    public function commentaires()
    {
        $commentaires = $this->commentaire->getAllCommentaires();
        $this->genererVue(array('commentaires' =>$commentaires));



    }

    public function inscription()
      {
          $param = array();
          if ($this->requete->existeParametre("pseudo") && $this->requete->existeParametre("nom") && $this->requete->existeParametre("prenom")
              && $this->requete->existeParametre("dateNaissance") && $this->requete->existeParametre("email") && $this->requete->existeParametre("mdp")
              && $this->requete->existeParametre("verif_mdp")) {
              $mdp = $this->requete->getParametre('mdp');
              $verifMdp = $this->requete->getParametre('verif_mdp');
              $pseudo = $this->requete->getParametre('pseudo');
              $nom = $this->requete->getParametre('nom');
              $prenom = $this->requete->getParametre('prenom');
              $dateNaissance = $this->requete->getParametre('dateNaissance');
              $email = $this->requete->getParametre('email');

              if ($mdp === $verifMdp) {
                  $this->utilisateur->inscription($pseudo, $mdp, $nom, $prenom, $dateNaissance, $email);
                  $this->rediriger("admin");
              } else {
                  $param['msgErreur'] = 'Mot de passe non identique';
              }
          }
          $this->genererVue($param);
      }

      public function modifierMdp()
          {
              $param = array();

              if ($this->requete->existeParametre("mdp") &&
                  $this->requete->existeParametre("verif_mdp")) {
                  $mdp = $this->requete->getParametre('mdp');
                  $verifMdp = $this->requete->getParametre('verif_mdp');
                  if ($mdp === $verifMdp) {
                      $id = $this->requete->getSession()->getAttribut("idUtilisateur");
                      $this->utilisateur->modificationPassword($id, $mdp);
                      $this->rediriger("admin");
                  } else {
                      $param['msgErreur'] = 'Mot de passe non identique';
                  }

              }

              $this->genererVue($param);
          }



          public function creationBillet()
          {
              if ($this->requete->existeParametre("dateBillet") && $this->requete->existeParametre("titreBillet") && $this->requete->existeParametre("contenuBillet")) {
                  $dateBillet = $this->requete->getParametre('dateBillet');
                  $titreBillet = $this->requete->getParametre('titreBillet');
                  $contenuBillet = $this->requete->getParametre('contenuBillet');
                  $this->billet->creationBillet($dateBillet, $titreBillet, $contenuBillet);
                  $this->rediriger("admin");
              }
              $this->genererVue();
          }




          public function compterChecbox () {
                if(!empty($_POST['check_list'])) {
                    foreach($_POST['check_list'] as $check) {
                        echo $check;
                    }
                }
            }
            public function supprimerBillet()
    {
        $this->compterChecbox();
        if ($this->requete->existeParametre("idBillet")) {
            $idBillet = $this->requete->getParametre("idBillet");
            $this->billet->supprimerBillet($idBillet);
            $this->rediriger("admin");
        }

            $param['msgErreur'] = 'Non supprimé';

    }

}
