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
 public function rechercheproduit($nomproduit,$nombreDeLignesARetourner, $noPremiereLigneARetourner)
 {
 $this->db->limit($nombreDeLignesARetourner, $noPremiereLigneARetourner);
  $this->db->select('*');
  $this->db->from('produit');
  $this->db->like('LIBELLE',$nomproduit);
   $query = $this->db->get();
   if($query->num_rows()>0)
   {
    foreach ($query->result_array() as $ligne) {

        $jeuDEnregsitrements[] = $ligne;
        
        }
        return $jeuDEnregsitrements;
   }
   return false;
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
         $this->db->from('produit');
         $this->db->where('NOCATEGORIE',$nocategorie);
         $requete=$this->db->count_all_results();
         return $requete;
}


 public function nombredeproduit($Nomproduit= FALSE)
 {
     if($Nomproduit===false)
     {
     return $this->db->count_all("produit"); 
     }
    $this->db->from('produit');
    $this->db->like('LIBELLE',$Nomproduit);
    $requete=$this->db->count_all_results();
    return $requete;
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
