<?php
class Modeleclient extends CI_Model {

public function __construct()
{
    $this->load->database();
}

public function insererUnclient($pDonneesAInserer)

{
    return $this->db->insert('client', $pDonneesAInserer);
} // insererUnArticle

public function retournerUtilisateur($pclient)

{

   $requete = $this->db->get_where('client',$pclient);
   return $requete->row(); // retour d'une seule ligne !
   // retour sous forme d'objets
} // retournerUtilisateur

 





}