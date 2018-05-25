<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php echo form_open('Admin/listerlesCommande');?>
<h2> <?php echo $TitreDeLaPage?> </h2>
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th> le numéro de commande</th>
<th> le nom du produit </th>
<th> le nom et prénom du client </th>
<th> son adresse </th>
<th> la quantité commandée </th>
<th> Datedecommande</th>
</thead>
<tbody>
<?php foreach($LesCommandes as $unCommande):
echo '<tr>
<td>'.$unCommande['NOCOMMANDE'].'</td>
<td>'.$unCommande['LIBELLE'].'</td>
<td>'.$unCommande['NOM'] ,$unCommande['PRENOM'].'</td>
<td>'.$unCommande['ADRESSE'].'</td>
<td>'.$unCommande['QUANTITECOMMANDEE'].'</td>
<td>'.$unCommande['DATECOMMANDE'].'</td> 
</tr>' ;
endforeach?>
</tbody
</table>
</div>
</body>
</html>