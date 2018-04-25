<?php

class Admin extends CI_Controller {
    public function __construct()

    {
       parent::__construct();
       $this->load->model('modeleproduit');
       $this->load->model('modelecategorie');
        $this->load->model('');
        $this->load->model('modelemarque');
         $this->load->library('session');
       if ($this->session->statut=='c') // c : statut visiteur
       {
    $this->load->helper('url'); // pour utiliser redirect
    redirect('/client/connexion.php'); // pas les droits : redirection vers connexion
       }
      
    } // __construct
   public function ajouterunproduit()
   {
    $this->load->helper('form');
    $DonneesInjectees['TitreDeLaPage'] = 'Ajouter un produit';
    $DonneesInjectees['LesMarques'] = $this->modelemarque->Retournermarques();
    $DonneesInjectees['LesCategorie'] = $this->modelecategorie->Retournercategorie();
  
      if ($this->input->post('boutonAjouter')===null)
      {
        $this->load->view('templates/Entete');
        $this->load->view('admin/ajouterproduit', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
      }
      else
       {
        $this->load->view('templates/Entete');
        $this->load->view('admin/ajouterproduit', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
        $donneesAInserer=array(
          'LIBELLE' =>$this->input->post('txtlibelle'),
          'DETAIL' =>$this->input->post('txtdetail'),
          'PRIXHT' =>$this->input->post('txtprixht'),
          'TAUXTVA' =>$this->input->post('txttva'),
          'QUANTITEENSTOCK'=>$this->input->post('txtquantitestock'),
          'DATEAJOUT'=>$this->input->post('txtdateajout'),
          'NOMIMAGE'=>$this->input->post('txtimage'),
          'DISPONIBLE'=>$this->input->post('txtdispo'),
          'NOMARQUE'=>$this->input->post('nomarque'),
          'NOCATEGORIE'=>$this->input->post('nocategorie'),
            );
        $this->modeleproduit->insertionproduit($donneesAInserer);
        $this->load->helper('url'); // helper chargé pour utilisation de site_url (dans la vue)
        $this->load->view('visiteur/insertionReussie');
       }
        
   }
    







}
