<?php
class modelecategorie extends CI_Model {

public function __construct()
{
    $this->load->database();
}

  
public function Retournercategorie($nocategorie = NULL)
{
     if($nocategorie==NULL)
     {
      $requete=$this->db->get('categorie');
      return $requete->result_array();
     }
     $requete=$this->db->get_where('categorie',array('NOCATEGORIE'=>$nocategorie));
     return $requete->row_array();   
}
    

}

/* End of file ModelName.php */
