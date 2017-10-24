<?php
require_once 'Framework/Modele.php';
/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Billet extends Modele {

    const MAX_PER_PAGE = 10;

    /** Renvoie la liste des billets du blog
     *
     * @return PDOStatement La liste des billets
     */
    public function getBillets($page = 1) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' order by BIL_ID asc';
        $billets = $this->executerRequete($sql, array(), self::MAX_PER_PAGE, ($page - 1) * self::MAX_PER_PAGE);
        return $billets;
    }

    public function getBilletsAbreger($page = 1, $limit = 100)
        {
            $valeur = intval($limit);
            $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, LEFT (BIL_CONTENU,' . $valeur . ') as contenu from T_BILLET'
                . ' order by BIL_ID desc';
            $billetsAbreger = $this->executerRequete($sql, array(), self::MAX_PER_PAGE, ($page - 1) * self::MAX_PER_PAGE);
            return $billetsAbreger;
        }





    /** Renvoie les informations sur un billet
     *
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getBillet($idBillet) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' where BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }
    /**
     * Renvoie le nombre total de billets
     *
     * @return int Le nombre de billets
     */
    public function getNombreBillets()
    {
        $sql = 'select count(*) as nbBillets from T_BILLET';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbBillets'];
    }

    public function creationBillet($dateBillet, $titreBillet, $contenuBillet)
      {
          $sql = 'INSERT INTO T_BILLET SET BIL_DATE= :dateBillet, BIL_TITRE= :titreBillet, BIL_CONTENU= :contenuBillet';
          return $this->executerRequete($sql, array(
                  'dateBillet' => $dateBillet,
                  'titreBillet' => $titreBillet,
                  'contenuBillet' => $contenuBillet
              ))->rowCount() == 1;
      }

      public function supprimerBillet($idBillet)
      {
          $sql = 'DELETE FROM `t_billet` WHERE BIL_ID = :numeroBillet';
          return $this->executerRequete($sql, array(
                  'numeroBillet' => $idBillet,
              ))->rowCount() == 1;
      }


}
