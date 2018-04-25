<?php

class client extends CI_Controller{

 public function _construct()
 {
  parent::_construct();
  $this->load->helper('url');

  $this->load->helper('assets');

  $this->load->model('modeleclient');

  $this->load->model('modeleproduit');

  $this->load->model('modelecategorie');
 }
 
public function seDeconnecter()
{
    $this->session->sess_destroy();
}

 
public function connexion()
{
$this->load->helper('form');
$DonneesInjectees['TitreDeLaPage']='connexion';
if($this->input->post('btnconnect')===null)
{

    $this->load->view('templates/entete');

    $this->load->view('visiteur/connexion', $DonneesInjectees); // on renvoie le formulaire

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
    $this->load->view('templates/Entete');

    $this->load->view('Client/connexion', $DonneesInjectees);

    $this->load->view('templates/PiedDePage');
    $this->load->library('session');
$this->session->identfiant=$Utilisateurretourner->nom;
$this->session->profil=$Utilisateurretourner->profil;
$DonneesInjectees['identifiant']=$Utilisateur['identifiant'];

$this->load->view('templates/Entete');

$this->load->view('visiteur/connexionReussie', $DonneesInjectees);

$this->load->view('templates/PiedDePage');
}

}


}



}