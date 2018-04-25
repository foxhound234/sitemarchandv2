<html>
<head>
    <title>Blog simple</title>
</head>
<body>

<?php if(!is_null($this->session->identifiant)) : ?>
    <?php echo'Utilisateur connecté : <B>'.$this->session->identifiant.'</B>&nbsp;&nbsp;';?>
    <a href="<?php echo site_url('Client/seDeconnecter') ?>">Se déconnecter</a>&nbsp;&nbsp;
    
    <?php if ($this->session->statut=='A') : ?>
       <a href="<?php echo site_url('Admin/ajouterunproduit') ?>">Ajouter un produit</a>&nbsp;&nbsp;
       <?php endif; ?>
    
    <?php else : ?>
        <a href="<?php echo site_url('Client/Connexion') ?>">Se Connecter</a>&nbsp;&nbsp;
    <?php endif; ?>

    <a href="<?php echo site_url('Visiteur/ajouterunclient') ?>"> créer un compte</a>&nbsp;&nbsp;
    <a href="<?php echo site_url('Visiteur/afficherlesproduits') ?>">Lister les  produit</a>&nbsp;&nbsp;

