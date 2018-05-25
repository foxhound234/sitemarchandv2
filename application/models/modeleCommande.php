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
}

/* End of file ModelName.php */
