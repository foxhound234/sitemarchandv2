<?php

class modelemarque extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    
    public function Retournermarques($nomarque=NULL)
    {
         if($nomarque==NULL)
         {
          $requete=$this->db->get('marque');
          return $requete->result_array();
         }
         $requete=$this->db->get_where('marque',array('NOMARQUE '=>$nomarque));
         return $requete->row_array();   
    }

}
