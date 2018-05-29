<html>
<head>
    <title>Blog simple</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
<ul class="nav navbar-nav">
<?php if(!is_null($this->session->identifiant)) : ?>
<li class="active"><?php echo'Utilisateur connecté : <B>'.$this->session->identifiant.'</B>&nbsp;&nbsp;';?></li>
    <li class="active"><a href="<?php echo site_url('Client/seDeconnecter') ?>">Se déconnecter</a>&nbsp;&nbsp;</li>
    <?php if ($this->session->profil=='A') : ?>
    <li class="active"><a href="<?php echo site_url('Admin/ajouterunproduit') ?>">Ajouter un produit</a>&nbsp;&nbsp;</li>
    <li class="active"><a href="<?php echo site_url('Admin/listerlesCommande')?>">afficher les commande</a>&nbsp;&nbsp;</li>
    <li class="active"><a href="<?php echo site_url('Admin/afficherlesproduits')?>"> modifier les produits</a>&nbsp;&nbsp;</li>
       <?php endif; ?>

       <?php if ($this->session->profil=='C') : ?>
       <li class="active"> <a href="<?php echo site_url('Visiteur/afficherlesproduits') ?>">Lister les produits</a>&nbsp;&nbsp; </li>
       <li class="active"><a href="<?php echo site_url('Visiteur/affichelescategorie') ?>">Lister les categories </a>&nbsp;&nbsp; </li>
       <li class="active"><a href="<?php echo site_url('Visiteur/affichagedepanier') ?>">affiché le panier </a>&nbsp;&nbsp; </li>
       <li class="active"> <a href="<?php echo site_url('Client/profil') ?>">affiché le profil </a>&nbsp;&nbsp; </li>
    <?php
    echo form_open('Visiteur/Recherche');?>
     <li class="active"><?php echo form_input(array('name'=>'txtlibelle','value'=>'','pattern'=>'^[a-zA-Z][a-zA-Z0-9]*','title'=>'le produit  doit commencer par une lettre', 'required'=>'required'));?> </li>
     <li class="active"><?php echo form_submit('btnrecherche','recherché');?> </li>
   <?php echo form_close();?>
   <?php endif;?>
    </ul>
</div>
</nav>
<?php endif;?>
        <?php if($this->session->profil==null) : ?> 
     <li class="active"><a href="<?php echo site_url('Visiteur/afficherlesproduits') ?>">Lister les produits</a>&nbsp;&nbsp;</li>
    <li class="active"><a href="<?php echo site_url('Visiteur/affichelescategorie') ?>">Lister les categories </a>&nbsp;&nbsp;</li>
    <li class="active"><a href="<?php echo site_url('Visiteur/affichagedepanier') ?>">affiché le panier </a>&nbsp;&nbsp;</li>
    <li class="active"><a href="<?php echo site_url('Visiteur/ajouterunclient') ?>"> enregistrement </a>&nbsp;&nbsp;</li>
    <li class="active"><a href="<?php echo site_url('Client/connexion') ?>">Se Connecter</a>&nbsp;&nbsp;</li>

      <?php echo form_open('Visiteur\Recherche');?>
   <li class="active"> <?php echo form_input('txtlibelle','',array('pattern'=>'^[a-zA-Z][a-zA-Z0-9]*','title'=>'le produit  doit commencer par une lettre', 'required'=>'required')); ?></li>
   <li class="active"> <?php echo form_submit('btnrecherche', 'recherché');?></li>
       <?php echo form_close();?>
    <?php endif;?>
</div>
</nav>
</body>
</html>