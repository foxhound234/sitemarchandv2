<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h2> <?php echo $TitreDeLaPage?> </h2>
<div class="table-responsive">
    <table class="table">
    <thead>
    <tr>
        <th> image </th>
        <th> libellé </th>
        <th> prix </th>
        <th> quantitéenstock </th>
  </tr>
</thead>
<tbody>
<?php foreach($LesProduits as $unProduit):
echo '<tr>
<td><img width="25%" src="'.img_url($unProduit['NOMIMAGE']).'"></td>
<td>' .anchor('Visiteur/VoirunProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</td>
<td>' .$unProduit['PRIXHT'].'</td>
<td>' .$unProduit['QUANTITEENSTOCK'].'</td>
</tr>';
endforeach ?>
</tbody>
</table>
</div>
<p> pour avoir le détail d'un produit clique sur le nom du produit </p>
    </body>
</html>