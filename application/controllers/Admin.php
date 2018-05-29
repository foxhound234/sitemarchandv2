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
         $this->load->helper('url');
       if ($this->session->profil=='C'or $this->session->profil==null) // c : statut visiteur
       {
    redirect('Client/connexion'); // pas les droits : redirection vers connexion
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
        $donneesAInserer=array(
          'LIBELLE' =>$this->input->post('txtlibelle'),
          'DETAIL' =>$this->input->post('txtdetail'),
          'PRIXHT' =>$this->input->post('txtprixht'),
          'TAUXTVA' =>$this->input->post('txttva'),
          'QUANTITEENSTOCK'=>$this->input->post('txtquantitestock'),
          'DATEAJOUT'=>$this->input->post('txtdateajout'),
          'NOMIMAGE'=>$this->input->post('txtimage'),
          'DISPONIBLE'=>$this->input->post('txtdispo'),
          'NOMARQUE'=>$this->input->post('txtNoMarque'),
          'NOCATEGORIE'=>$this->input->post('txtNoCategorie')
            );
        $this->modeleproduit->insertionproduit($donneesAInserer);
        $this->load->helper('url'); // helper chargé pour utilisation de site_url (dans la vue)
        $this->load->view('visiteur/insertionReussie');
       }
        
   }
   public function listerlesCommande()
   {
    $DonneesInjectees['TitreDeLaPage'] = 'listerlescommande';
    $DonneesInjectees['LesCommandes']=$this->modeleCommande->afficherlescommande();
    $this->load->view('templates/Entete');
    $this->load->view('admin/afficherlescommande', $DonneesInjectees);
    $this->load->view('templates/PiedDePage');
   }
   public function ModifierunProduit($NOPRODUIT=false)
   {
    $Produitretourne=$this->modeleproduit->retournerproduit($NOPRODUIT);
      
    if (empty($Produitretourne))
    {
     show_404();
    }
    $DonneesInjectees['Leproduit']=$this->modeleproduit->retournerproduit($NOPRODUIT);
    $DonneesInjectees['LesMarques'] = $this->modelemarque->Retournermarques();
    $DonneesInjectees['LesCategorie'] = $this->modelecategorie->Retournercategorie();
    $DonneesInjectees['TitredeLaPage']=$Produitretourne['LIBELLE'];
    $Produitretourne=$this->modeleproduit->retournerproduit($NOPRODUIT);
   if($this->input->post('btnModifier'))
   {
    $donnesamodifier=array(
      'LIBELLE' =>$this->input->post('txtlibelle'),
      'DETAIL' =>$this->input->post('txtdetail'),
      'PRIXHT' =>$this->input->post('txtprixht'),
      'TAUXTVA' =>$this->input->post('txttva'),
      'QUANTITEENSTOCK'=>$this->input->post('txtquantitestock'),
      'DATEAJOUT'=>$this->input->post('txtdateajout'),
      'NOMIMAGE'=>$this->input->post('txtimage'),
      'DISPONIBLE'=>$this->input->post('txtdispo'),
      'NOMARQUE'=>$this->input->post('txtNoMarque'),
      'NOCATEGORIE'=>$this->input->post('txtNoCategorie')
        );
        $this->modeleproduit->Modifierunproduit($donnesamodifier,$NOPRODUIT);
        $this->load->helper('url'); // helper chargé pour utilisation de site_url (dans la vue)
        redirect('Admin/afficherlesproduits');
   }
   else
   {
    $this->load->view('templates/Entete');
    $this->load->view('admin/modifierunproduit', $DonneesInjectees);
    $this->load->view('templates/PiedDePage');
   }
   }
  public function afficherlesproduits()
  {
    $config=array();
    $config["base_url"] = site_url('Admin/afficherlesproduits');
    $config["total_rows"] =$this->modeleproduit->nombredeproduit();
    $config["per_page"] = 5;
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

  $this->load->view('admin/listedesproduits',$DonneesInjectees);

  $this->load->view('templates/piedDePage');
  }
  public function Validerlescommande($NOCOMMANDE=null)
{
  $DonneesInjectees['TitreDeLaPage'] = 'listerlescommande';

  if ($this->input->post('btnTraitement'))
{
  $this->load->view('templates/Entete');
  $this->load->view('admin/commandetraités');
  $this->load->view('templates/PiedDePage');
  
 $lesproduits=$this->modeleCommande->afficherunecommande($NOCOMMANDE);
 foreach ($lesproduits as $unproduit)
 {
 $donneesamodifier=array(
 'NOPRODUIT'=>$unproduit['NOPRODUIT'],
 'QUANTITECOMMANDEE'=>$unproduit['QUANTITECOMMANDEE']
 );
 $this->modeleproduit->ModifierLeStockdunProduit($donneesamodifier['NOPRODUIT'],$donneesamodifier['QUANTITECOMMANDEE']);
 }
 $datedujour= date("Y-m-d H:i:s");
 $this->modeleCommande->TraitementDeLaCommande($NOCOMMANDE,$datedujour);
}
else
{
  $this->load->view('templates/Entete');
  $this->load->view('admin/afficherlescommande');
  $this->load->view('templates/PiedDePage');
}
}





}
