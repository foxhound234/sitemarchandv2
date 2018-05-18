<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
    <body>
    <div class="container">
 <?php
   echo '<h2>'.$Leproduit['LIBELLE'].'</h2>';

  echo '<p>'.img($Leproduit['NOMIMAGE']).'</p>';

  echo '<p>'.$Leproduit['DETAIL'].'</p>';

  echo form_open('Visiteur\VoirunProduit/'.$Leproduit['NOPRODUIT']);

   echo form_submit('btnajouter', 'ajouter').'<BR>';
   echo form_close();
   ?>
    </div>
    </body>
    </html>