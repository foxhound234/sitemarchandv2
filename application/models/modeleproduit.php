<?php


class modeleproduit extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function insertionproduit($pDonneesAInserer)
    {
    return $this->db->insert('produit',$pDonneesAInserer);
    }
 public function rechercheproduit($nomproduit)
 {
  $this->db->select('*');
  $this->db->from('produit');
  $this->db->like('LIBELLE',$nomproduit['LIBELLE']);
   $query = $this->db->get();
  return $query->result_array();
 }
 
public function retournerproduitcatego($nocategorie)
{  
    $requete=$this->db->get_where('produit',array('NOCATEGORIE'=>$nocategorie));
    return $requete->result_array();
}
public function ModifierLeStockdunProduit($pNoproduit,$quantitecommandée)
{
    $this->db->where('NOPRODUIT', $pNoproduit);
$this->db->set('QUANTITEENSTOCK', '`QUANTITEENSTOCK`-'.$quantitecommandée.'', FALSE); 
$this->db->update('produit');
}
public function Modifierunproduit($donnesamodifier,$pNoproduit)
{
    $this->db->where('NOPRODUIT', $pNoproduit);
$this->db->update('produit',$donnesamodifier);
}
public function nombredeproduitcatego($nocategorie)
{
         $this->db->count_all('produit');
         $this->db->where('NOCATEGORIE',$nocategorie);
         $requete=$this->db->get();
         return $requete;
}


 public function nombredeproduit()
 {
    return $this->db->count_all("produit");
 }

	public function retournerproduit($pNoproduit)
		{
			// ici on va chercher l'article dont l'id est $pNoArticle
            $requete = $this->db->get_where('produit', array('NOPRODUIT' => $pNoproduit));
			return $requete->row_array(); // retour d'un tableau associatif, idem
		} // retournerArticles


 public function retournerproduitlimite($nombreDeLignesARetourner, $noPremiereLigneARetourner)
{// Nota Bene : surcharge non supportée par PHP
$this->db->limit($nombreDeLignesARetourner, $noPremiereLigneARetourner);

$requete = $this->db->get("produit");

if ($requete->num_rows() > 0) { // si nombre de lignes > 0

foreach ($requete->result() as $ligne) {

$jeuDEnregsitrements[] = $ligne;

}
return $jeuDEnregsitrements;
} // fin if
return false;
} // retournerArticlesLimite




}

/* End of file ModelName.php */
