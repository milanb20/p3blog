<?php
require_once 'Framework/Modele.php';

class Commentaire extends Modele {
// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
                . ' where BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    public function getAllCommentaires() {
      $sql = 'select COM_ID as id, COM_DATE as date,'
              . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
              . ' order by COM_ID desc ';
        $Allcommentaires = $this ->executerRequete($sql);
        return $Allcommentaires;


    }
    public function nombreCommentairesperBillet($idBillet){
      $sql = 'select COM_ID as id, COM_DATE as date,'
          . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
          . ' where BIL_ID=?';
      $nombreCommentairesperBillet = $this->executerRequete($sql, array($idBillet))->fetch();
      return $nombreCommentairesperBillet;
  }

    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into T_COMMENTAIRE(COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?)';
        $date = date(DATE_W3C);
        $this->executerRequete($sql, array( $auteur, $contenu, $idBillet));
    }

    public function ajouterUnSignalement($id) {
            $sql = 'update T_COMMENTAIRE SET COM_SIGNALEMENT = COM_SIGNALEMENT + 1 WHERE COM_ID = ?';
            $this->executerRequete($sql, array($id));
        }
    /**
     * Renvoie le nombre total de commentaires
     *
     * @return int Le nombre de commentaires
     */
    public function getNombreCommentaires()
    {
        $sql = 'select count(*) as nbCommentaires from T_COMMENTAIRE';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbCommentaires'];
    }

    public function getNombreSignalements()
  {
      $sql = 'select count(*) as nbSignalements from T_COMMENTAIRE WHERE COM_SIGNALEMENT != 0';
      $reponse=$this->executerRequete($sql);
      $ligne = $reponse->fetch();
      return $ligne['nbSignalements'];
  }

}
