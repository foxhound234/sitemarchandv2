<?php

class Visiteur extends CI_Controller{

    public function __construct()

    {
       parent::__construct();
       
       $this->load->helper('assets'); // helper 'assets' ajouté a Application
       $this->load->library('pagination');
 
       $this->load->model('modeleclient'); // chargement modèle, obligatoire
 
       $this->load->model('modeleproduit');
       $this->load->model('modelecategorie');

       $this->load->helper('form');

       $this->load->library('form_validation');

       $this->load->library('cart');
    } // __construct

    public function ajouterunclient()
    {
     $DonneesInjectees['TitreDeLaPage'] = 'enregistrement';
      $this->form_validation->set_rules('txtNom','nom','required');
      
      $this->form_validation->set_rules('txtPrenom','prenom','required');
     
      $this->form_validation->set_rules('txtEmail','email','required');

      $this->form_validation->set_rules('txtMdp','mdp','required');
       if($this->form_validation->run()===false)
       {
        $this->load->view('templates/entete');
        $this->load->view('visiteur/creercompte', $DonneesInjectees);
        $this->load->view('templates/piedDePage');
       }
       else
       {
         $client=array(
            'nom' => $this->input->post('txtNom'),

            'prenom' => $this->input->post('txtPrenom'),

            'adresse'=>$this->input->post('txtadresse'),

            'ville'=>$this->input->post('txtVille'),

            'codePostal'=>$this->input->post('txtcodePostal'),

            'email'=>$this->input->post('txtEmail'),

            'motdePasse'=>$this->input->post('txtMdp'),
             'profil'=>'C'
            ); 
        $this->modeleclient->insererUnclient($client);
        $this->load->helper('url');// helper chargé pour utilisation de site_url (dans la vue)
        $this->load->view('visiteur/insertionReussie');
       }
    }

    public function rechercheproduit()
    {
      if ($this->input->post('btnajouter'))
    {
  $leproduit=array(
    'produit'=>$this->input->post('txtlibelle'));
       $produit=serialize($leproduit);
  $DonneesInjectees['lesproduits']= $this->modeleproduit->rechercheproduit($produit);
   if (empty($DonneesInjectees['lesproduits']))
   {
    show_404();
   }
   $DonneesInjectees['Titredelapage']='résultat de la recherche';
   $this->load->view('visiteur/afficherecherche',$DonneesInjectees);
  }
}
    public function VoirunProduit($NOPRODUIT=false)
    {
     $Produitretourne=$this->modeleproduit->retournerproduit($NOPRODUIT);
      
      if (empty($Produitretourne))
      {
       show_404();
      }
      $DonneesInjectees['Leproduit']=$this->modeleproduit->retournerproduit($NOPRODUIT);
       $Produitretourne=$this->modeleproduit->retournerproduit($NOPRODUIT);
      $Libelle=$Produitretourne['LIBELLE'];
      $prixproduit=$Produitretourne['PRIXHT'];
      if($this->input->post('btnajouter'))
      {
        $insertion=array(
          'id'=>$NOPRODUIT,
          'qty' => 1,
          'price'=>$prixproduit,
          'name'=>$Libelle);
          var_dump($insertion);
          $this->cart->insert($insertion);
          $this->load->view('visiteur/insertionReussie');
      }
      else
      {
        $this->load->view('templates/Entete');
        $this->load->view('visiteur/VoirUnArticle', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
      }
    }
    public function affichagedepanier()
    {
      $DonneesInjectees['TitreDeLaPage'] ='Panier';
      $this->load->view('templates/entete');
      $this->load->view('visiteur/affichagedupanier', $DonneesInjectees);
      $this->load->view('templates/piedDePage');
    }
    public function afficherlesproduits()
    {
     $config=array();
    $config["base_url"] = site_url('visiteur/listerLesproduit');
    $config["total_rows"] =$this->modeleproduit->nombredeproduit();
    $config["per_page"] = 3;
    $config["uri_segment"] = 3; 
    $config['first_link'] = 'Premier';

    $config['last_link'] = 'Dernier';
  
    $config['next_link'] = 'Suivant';
  
    $config['prev_link'] = 'Précédent';
    
    $this->pagination->initialize($config);

    $noPage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 $DonneesInjectees['TitreDeLaPage'] = 'Les produits';
  $DonneesInjectees["Lesproduits"]=$this->modeleproduit->retournerproduitlimite($config["per_page"],$noPage);
  $DonneesInjectees["lienspagination"]=$this->pagination->create_links();

  $this->load->view('templates/entete');

  $this->load->view('visiteur/listerlesproduit',$DonneesInjectees);

  $this->load->view('templates/piedDePage');
    }
 public function affichelescategorie()
 {
 $DonneesInjectees['lescategories']=$this->modelecategorie->Retournercategorie();
  $DonneesInjectees['TitredelaPage']='les Catégorie';
  $this->load->view('templates/entete');
  $this->load->view('visiteur/listerlesCategorie',$DonneesInjectees);
   $this->load->view('templates/piedDePage');
 }
 public function afficherlesproduitscategorie($nocategorie=null)
 { 
  $config=array();
  $config["base_url"] = site_url('visiteur/listerLesproduitcatego');

  $config["total_rows"] =$this->modeleproduit->nombredeproduitcatego($nocategorie);

  $config["per_page"] = 3;

  $config["uri_segment"] = 3; 

  $config['first_link'] = 'Premier';

  $config['last_link'] = 'Dernier';

  $config['next_link'] = 'Suivant';

  $config['prev_link'] = 'Précédent';
  $this->pagination->initialize($config);
  $noPage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

  $DonneesInjectees['TitreDeLaPage'] = 'Les produit de la catégorie';
  $DonneesInjectees['LaCategorie']= $this->modelecategorie->Retournercategorie($nocategorie);
  $DonneesInjectees["LesProduits"]=$this->modeleproduit-> retournerproduitcatego($nocategorie,$config["per_page"],$noPage);

  $DonneesInjectees["lienspagination"]=$this->pagination->create_links();

  $this->load->view('templates/entete');
  $this->load->view('visiteur/listerlesproduit',$DonneesInjectees);
   $this->load->view('templates/piedDePage');

 }

}

