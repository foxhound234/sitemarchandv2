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
<th> Datedecommande</th>
</thead>
<tbody>
<?php foreach($LesCommandes as $unCommande):
echo '<tr>
<td>'.$unCommande['NOCOMMANDE'].'</td>
<td>'.$unCommande['DATECOMMANDE'].'</td> 
<td>' .anchor('Admin/AfficherDetaildeLaCommande/'.$unCommande['NOCOMMANDE'],'Voir Le Detail de la commande').'</td>
 </tr>';
endforeach?>
</tbody>
</table>
</div>
</body>
</html>