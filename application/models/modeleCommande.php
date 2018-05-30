<?php
class modeleCommande extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
  public function AjoutCommande($donnesinseres)
  {
    $this->db->insert('commande',$donnesinseres);
    return $this->db->insert_id();
  }
  public function AjoutLigne($donnesaInseres)
  {
      return $this->db->insert('ligne',$donnesaInseres);

  }
  public function afficherlescommande()
  {
   $requete="select distinct commande.NOCOMMANDE,DATECOMMANDE
   FROM client,commande,ligne,produit 
   WHERE client.noclient=commande.NOCLIENT
   AND ligne.NOCOMMANDE=commande.NOCOMMANDE
   AND ligne.NOPRODUIT=produit.NOPRODUIT
   AND DATETRAITEMENT IS NULL
   group by ligne.NOCOMMANDE,ligne.NOPRODUIT";
   $query = $this->db->query($requete);
   return $query->result_array();
  }
  public function afficherunecommande($NOCOMMANDE)
  {
     $requete="select distinct commande.NOCOMMANDE,ligne.NOPRODUIT,NOM,PRENOM,ADRESSE,EMAIL,DATECOMMANDE,QUANTITECOMMANDEE,LIBELLE,ROUND(SUM(produit.PRIXHT*((produit.TAUXTVA/100)+1)*ligne.QUANTITECOMMANDEE))AS PRIXTTC
    FROM client,commande,ligne,produit 
    WHERE client.noclient=commande.NOCLIENT
    AND ligne.NOCOMMANDE=commande.NOCOMMANDE
    AND ligne.NOPRODUIT=produit.NOPRODUIT
    AND ligne.NOCOMMANDE=".$NOCOMMANDE."
    group by ligne.NOCOMMANDE,ligne.NOPRODUIT";
    $query = $this->db->query($requete);
    return $query->result_array();
  }
  public function CalculPrixTotal($NOCOMMANDE)
  {
    $requete="select ROUND(SUM(produit.PRIXHT*((produit.TAUXTVA/100)+1)*ligne.QUANTITECOMMANDEE))AS PRIXTTC
    FROM commande,ligne,produit 
    WHERE  ligne.NOCOMMANDE=commande.NOCOMMANDE
    AND ligne.NOPRODUIT=produit.NOPRODUIT
    and ligne.NOCOMMANDE=".$NOCOMMANDE."
    GROUP by ligne.NOCOMMANDE";
    $query = $this->db->query($requete);
    return $query->row_array();
  }
  public function TraitementDeLaCommande($NOCOMMANDE,$dateTraitement)
  {
    $this->db->set('DATETRAITEMENT',$dateTraitement); 
    $this->db->where('NOCOMMANDE', $NOCOMMANDE);
    $this->db->update('commande');
  }
}

/* End of file ModelName.php */
