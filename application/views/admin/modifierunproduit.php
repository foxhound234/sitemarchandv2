<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
<div class="form-group">
<h2><?php echo $TitredeLaPage ?></h2>
<?php
echo form_open('Admin/ModifierunProduit/'.$Leproduit['NOPRODUIT']);

 echo form_label('nom du produit :', 'lbllibelle');

 echo  form_input(array('name'=>'txtlibelle','value'=>$Leproduit['LIBELLE'],'pattern'=>'[a-zA-Z0-9]+','title'=>'le produit  doit commencer par une lettre', 'required'=>'required','class'=>'form-control')).'<BR>';

 echo form_label('détail du produit :', 'lbldétail');

 echo  form_textarea(array('name'=>'txtdetail','value'=>$Leproduit['DETAIL'],'required'=>'required','class'=>'form-control')).'<BR>';
  echo  form_label('prixht :','lblprixht');
  echo  form_input(array('name'=>'txtprixht','value'=>$Leproduit['PRIXHT'],'pattern'=>".{0,}",'title'=>'le prix doit est uniquement composé de chiffres','required'=>'required','class'=>'form-control')).'<BR>';

  echo  form_label('tauxtva :', 'lbltva');

  echo  form_input(array('name'=>'txttva','value'=>$Leproduit['TAUXTVA'],'pattern'=>".{0,10}" ,'title'=>'la tva doit est uniquement composé de chiffres','required'=>'required','class'=>'form-control')).'<BR>';

   echo form_label('image :', 'lblimage');
 
   echo form_input(array('type'=>'file','name'=>'txtimage','value'=>$Leproduit['NOMIMAGE'])).'<BR>';
   
   echo form_label('quantité dans le stock', 'lblquantitestock');

   echo form_input(array( 'name'=>'txtquantitestock','type'=>'number','value'=>$Leproduit['QUANTITEENSTOCK'],'min'=>'0','max'=>'1000','step'=>'1','required'=>'required','class'=>'form-control')).'<BR>';
  
  echo form_label('dateajout', 'lbldateajout');
  
  echo form_input(array('type'=>'date','name'=>'txtdateajout','value'=>$Leproduit['DATEAJOUT'],'class'=>'clearBtn','required'=>'required','class'=>'form-control')).'<BR>';
  
  echo form_label('disponibilité', 'lbldispo');
  $liste=array(
     '1'=> 'VRAI',
     '0'=> 'FAUX'
  );
  echo form_dropdown('txtdispo',$liste,'default',array('required'=>'required','class'=>'form-control')).'<BR>';

 echo form_label('Numero de marque :','lblnomarque');
 echo "<select name='txtNoMarque' class='form-control' id='id' required>";
     foreach ($LesMarques as $uneMarque) {
         echo "<option value='". $uneMarque['NOMARQUE'] . "'>" . $uneMarque['NOM'] . "</option>";
     }
 echo "</select><br/>";
 echo form_label('Numero de Categorie :','lblnocategorie');
echo "<select name='txtNoCategorie' class='form-control' id='id' required>";
    foreach ($LesCategorie as $uneCategorie) {
        echo "<option value='". $uneCategorie['NOCATEGORIE'] . "'>" . $uneCategorie['LIBELLE'] . "</option>";
    }
echo "</select><br/>";
echo form_submit('btnModifier', 'modifier',array('class'=>'btn btn-primary')).'<BR>';
echo form_close();
?>
</div>
</body>
</html>