<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    <body>
    <div class="container">
 <?php
 
 echo '<h2>'.$unProduit['LIBELLE'].'</h2>';

 echo '<p>'.img($unProduit['NOMIMAGE']).'</p>';
 
  echo '<p>'.['DETAIL'].'</p>';

  if($Leproduit['QUANTITEENSTOCK']==0 or $Leproduit['DISPONIBLE']==0)
  {
   echo '<h2> le produit est indisponible </h2>';
  }
  else
  {
    echo form_open('Visiteur\VoirunProduit/'.$Leproduit['NOPRODUIT']);

    echo form_submit('btnajouter', 'ajouter').'<BR>';
    echo form_close();

  }
   ?>
    </div>
    </body>
    </html>