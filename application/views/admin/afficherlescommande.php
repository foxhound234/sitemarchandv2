<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
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
<th> le numéro de commande</th>
<th> le nom du produit </th>
<th> le nom et prénom du client </th>
<th> son adresse </th>
<th> la quantité commandée </th>
<th> Datedecommande</th>
<th> prixttc </th>
</thead>
<tbody>
<?php foreach($LesCommandes as $unCommande):
echo form_open('Admin/Validerlescommande/'.$unCommande['NOCOMMANDE']);
echo '<tr>
<td>'.$unCommande['NOCOMMANDE'].'</td>
<td>'.$unCommande['LIBELLE'].'</td>
<td>'.$unCommande['NOM'] ,$unCommande['PRENOM'].'</td>
<td>'.$unCommande['ADRESSE'].'</td>
<td>'.$unCommande['QUANTITECOMMANDEE'].'</td>
<td>'.$unCommande['DATECOMMANDE'].'</td> 
<td>'.$unCommande['PRIXTTC'].'</td>
<td>'. form_submit('btnTraitement', 'valider la commande').'</td>';
echo form_close();
'</tr>';
endforeach?>
</tbody
</table>
</div>
</body>
</html>