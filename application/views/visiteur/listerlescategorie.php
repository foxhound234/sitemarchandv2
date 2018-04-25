<h2> <?php echo $TitredelaPage?></h2>


<?php foreach($lescategories as $unecategorie):
echo '<h3>'.anchor('visiteur/voirCategorieArticle'.$unecategorie->noCategorie,$unecategorie->libelle);
endforeach?>
<p> pour voir les produit d'une categorie clique  sur le nom de la categorie</p>

