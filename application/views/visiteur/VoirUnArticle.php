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
   echo '<h2>'.$unProduit['LIBELLE'].'</h2>';

  echo '<p>'.img($unProduit['NOMIMAGE']).'</p>';

  echo '<p>' .$unProduit['DETAIL'].'</p>';

  echo form_open('Visiteur\VoirunProduit');
  echo form_label('choisir la quantité','lblquantité');
  
 echo form_input(array('name'=>'txtquantitestock','type'=>'number', 'min'=>'0','max'=>'100','step'=>'1','required'=>'required')).'<BR>';

   echo form_submit('boutonajouter', 'ajouter').'<BR>';

   echo form_close();
   
   ?>
    </div>
    </body>
    </html>