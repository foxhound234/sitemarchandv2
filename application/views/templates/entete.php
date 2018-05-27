<html>
<head>
    <title>Blog simple</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php if(!is_null($this->session->identifiant)) : ?>
    <?php echo'Utilisateur connecté : <B>'.$this->session->identifiant.'</B>&nbsp;&nbsp;';?>
    <a href="<?php echo site_url('Client/seDeconnecter') ?>">Se déconnecter</a>&nbsp;&nbsp;
    
    <?php if ($this->session->profil=='A') : ?>
       <a href="<?php echo site_url('Admin/ajouterunproduit') ?>">Ajouter un produit</a>&nbsp;&nbsp;
       <a href="<?php echo site_url('Admin/listerlesCommande')?>">afficher les commande</a>&nbsp;&nbsp;
       <a href="<?php echo site_url('Admin/afficherlesproduits')?>"> modifier les produits</a>&nbsp;&nbsp;
       <?php endif; ?>
       <?php if ($this->session->profil=='C') : ?>
       <a href="<?php echo site_url('Visiteur/afficherlesproduits') ?>">Lister les produits</a>&nbsp;&nbsp;
    <a href="<?php echo site_url('Visiteur/affichelescategorie') ?>">Lister les categories </a>&nbsp;&nbsp;
    <a href="<?php echo site_url('Visiteur/affichagedepanier') ?>">affiché le panier </a>&nbsp;&nbsp;
    <a href="<?php echo site_url('Client/profil') ?>">affiché le profil </a>&nbsp;&nbsp;
    <?php
    echo form_open('Visiteur\rechercheproduit');
    echo form_input('txtlibelle','',array('pattern'=>'^[a-zA-Z][a-zA-Z0-9]*','title'=>'le produit  doit commencer par une lettre', 'required'=>'required'));
   echo form_submit('btnajouter','recherché');
   echo form_close();?>
       <?php endif; ?>
       <?php else : ?>
        <a href="<?php echo site_url('Client/connexion') ?>">Se Connecter</a>&nbsp;&nbsp;
        <?php endif; ?>
        <?php if($this->session->profil==null) : ?>
     <a href="<?php echo site_url('Visiteur/afficherlesproduits') ?>">Lister les produits</a>&nbsp;&nbsp;
    <a href="<?php echo site_url('Visiteur/affichelescategorie') ?>">Lister les categories </a>&nbsp;&nbsp;
    <a href="<?php echo site_url('Visiteur/affichagedepanier') ?>">affiché le panier </a>&nbsp;&nbsp;
    <a href="<?php echo site_url('Visiteur/ajouterunclient') ?>"> enregistrement </a>&nbsp;&nbsp;
    <?php
    echo form_open('Visiteur\rechercheproduit');
    echo form_input('txtlibelle','',array('pattern'=>'^[a-zA-Z][a-zA-Z0-9]*','title'=>'le produit  doit commencer par une lettre', 'required'=>'required'));
   echo form_submit('btnajouter', 'ajouter');
   echo form_close();?>
    <?php endif;?>
</body>
</html>