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
<div class="container">
<?php
   echo '<p> Le Nom et Prenom du client :'.$LaCommande[0]["PRENOM"],$LaCommande[0]["NOM"].'</p>';
   echo '<p> son adresse :'.$LaCommande[0]["ADRESSE"].'</p>';
echo '<div class="table-responsive">';
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th> le nom du produit </th>';
echo '<th> la quantité commandée </th>';
echo '<th> prixttc </th>';
echo '</thead>';
echo '<tbody>';

  foreach($LaCommande as $Leproduit):
    {
        echo '<tr>
        <td>'.$Leproduit['LIBELLE'].'</td>
        <td>'.$Leproduit['QUANTITECOMMANDEE'].'</td>
        <td>'.$Leproduit['PRIXTTC'].'</td>
        </tr>';
    }
  endforeach?>
  </tbody>
</table>

 <?php
 echo '<h2> PRIX TOTAL :'.$PRIXTOTAL['PRIXTTC'].'€ </h2>';
echo form_open('Admin/Validerlescommande/'.$LaCommande[0]['NOCOMMANDE']);
echo form_submit('btnTraitement', 'valider la commande').'</td>';
echo form_close();
?>
    </div>
    </body>
    </html>
</body>
</html>