<?php

class client extends CI_Controller{

 public function _construct()
 {
  parent::_construct();
 }
 
public function seDeconnecter()
{
    $this->session->sess_destroy();

 $this->load->view('templates/entete');
        $this->load->view('visiteur/insertionReussie');
        $this->load->view('templates/piedDePage');
    }
 public function profil()
 {
$DonneesInjectees['titredelapage']='PROFIL';
$donnnesprofil=array(
"NOCLIENT"=>$this->session->noclient
);
var_dump($donnnesprofil);
$DonneesInjectees['leclient']=$this->modeleclient->retournerUtilisateur($donnnesprofil);

if($this->input->post('Btnmodif')===null)
{

    $this->load->view('templates/entete');
    $this->load->view('Client/afficheprofil', $DonneesInjectees); // on renvoie le formulaire
    $this->load->view('templates/PiedDePage');
}
else
{

}
 }
 public function passerCommande()
 {
    $DonneesInjectees['TitreDeLaPage'] ='Panier';
     if ($this->input->post('btnAchat'))
     {

        $datetime = date("Y-m-d H:i:s");
        $Donnesdecommande=array(
            "DATECOMMANDE"=>$datetime,
            "NOCLIENT"=>$this->session->noclient
        );
        $commande=$this->modeleCommande->AjoutCommande($Donnesdecommande);
        foreach($this->cart->contents() as $unproduit)
        {
        $Donnesdeproduit=array(
        'NOCOMMANDE'=>$commande,
        'NOPRODUIT'=>$unproduit['id'],
         'QUANTITECOMMANDEE'=>$unproduit['qty']
        );
        $this->modeleCommande->AjoutLigne($Donnesdeproduit);
        }
        $this->cart->destroy();
        $this->load->view('templates/entete');
        $this->load->view('visiteur/insertionReussie');
        $this->load->view('templates/piedDePage'); 
     }
     else
     {
        $this->load->view('templates/entete');
        $this->load->view('visiteur/affichagedupanier', $DonneesInjectees);
        $this->load->view('templates/piedDePage'); 
     }
 }
public function connexion()
{
$DonneesInjectees['TitreDeLaPage']='connexion';
if($this->input->post('btnconnect')===null)
{

    $this->load->view('templates/entete');

    $this->load->view('Client/connexion', $DonneesInjectees); // on renvoie le formulaire

    $this->load->view('templates/PiedDePage');
    
}

else
{
 $Utilisateur= array(
    'EMAIL'=>$this->input->post('txtEmail'),
    'MOTDEPASSE'=>$this->input->post('txtMotDePasse'),
 );
$Utilisateurretourner = $this->modeleclient->retournerUtilisateur($Utilisateur);


if($Utilisateurretourner===null)
{

    $this->load->view('templates/Entete');

    $this->load->view('Client/connexion', $DonneesInjectees);

    $this->load->view('templates/PiedDePage');
}
else
{
    $this->session->noclient=$Utilisateurretourner->NOCLIENT;
    $this->session->identifiant=$Utilisateurretourner->PRENOM;
    $this->session->profil=$Utilisateurretourner->PROFIL;
    $DonneesInjectees['identifiant']=$Utilisateurretourner->PRENOM;
    $this->load->helper('url');
$this->load->view('templates/Entete');

$this->load->view('client/connexionReussie', $DonneesInjectees);

$this->load->view('templates/PiedDePage');
}

}


}



}