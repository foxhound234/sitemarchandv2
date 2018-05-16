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
       <?php endif; ?>
       <?php if ($this->session->profil=='C') : ?>
       <?php endif; ?>
    
       <?php else : ?>
        <a href="<?php echo site_url('Visiteur/connexion') ?>">Se Connecter</a>&nbsp;&nbsp;
        <?php endif; ?>

        <a href="<?php echo site_url('Visiteur/afficherlesproduits') ?>">Lister les produits</a>&nbsp;&nbsp;
    <a href="<?php echo site_url('Visiteur/affichelescategorie') ?>">Lister les categories </a>&nbsp;&nbsp;
</body>
</html>