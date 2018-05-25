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
   $requete="select commande.NOCOMMANDE,NOM,PRENOM,ADRESSE,DATECOMMANDE,QUANTITECOMMANDEE,LIBELLE 
   FROM client,commande,ligne,produit 
   WHERE client.noclient=commande.NOCLIENT
   AND ligne.NOCOMMANDE=commande.NOCOMMANDE
   AND ligne.NOPRODUIT=produit.NOPRODUIT
   AND DATETRAITEMENT IS NULL";
   $query = $this->db->query($requete);
   return $query->result_array();
  }
}

/* End of file ModelName.php */
