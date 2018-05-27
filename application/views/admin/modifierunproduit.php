<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<h2><?php echo $TITREDELAPAGE ?></h2>
<?php
echo form_open('Admin/ajouterunproduit');

 echo form_label('nom du produit :', 'lbllibelle');

 echo  form_input(array('name'=>'txtlibelle','value'=>$Leproduit['LIBELLE'],'pattern'=>'^[a-zA-Z][a-zA-Z0-9]*','title'=>'le produit  doit commencer par une lettre', 'required'=>'required')).'<BR>';

 echo form_label('détail du produit :', 'lbldétail');

 echo  form_textarea(array('name'=>'txtdetail','value'=>$Leproduit['DETAIL'],'required'=>'required')).'<BR>';
  echo  form_label('prixht :','lblprixht');
  echo  form_input(array('name'=>'txtprixht','value'=>$Leproduit['PRIXHT'],'pattern'=>".{0,}",'title'=>'le prix doit est uniquement composé de chiffres','required'=>'required')).'<BR>';

  echo  form_label('tauxtva :', 'lbltva');

  echo  form_input(array('name'=>'txttva','value'=>$Leproduit['TAUXTVA'],'pattern'=>".{0,10}" ,'title'=>'la tva doit est uniquement composé de chiffres','required'=>'required')).'<BR>';

   echo form_label('image :', 'lblimage');
 
   echo form_input(array('type'=>'file','name'=>'txtimage','value'=>$Leproduit['NOMIMAGE'])).'<BR>';
   
   echo form_label('quantité dans le stock', 'lblquantitestock');

   echo form_input(array( 'name'=>'txtquantitestock','type'=>'number','value'=>$Leproduit['QUANTITEENSTOCK'],'min'=>'0','max'=>'1000','step'=>'1','required'=>'required')).'<BR>';
  
  echo form_label('dateajout', 'lbldateajout');
  
  echo form_input('txtdateajout', '',array('type'=>'date','name'=>'txtdateajout','value'=>$Leproduit['DATEAJOUT'],'required'=>'required')).'<BR>';
  
  echo form_label('disponibilité', 'lbldispo');
  $liste=array(
     '1'=> 'VRAI',
     '0'=> 'FAUX'
  );
  echo form_dropdown('txtdispo',$liste,'default',array('required'=>'required')).'<BR>';

 echo form_label('Numero de marque :','lblnomarque');
 $marque=array(
'1'=>'Sony'
 );
 echo form_dropdown('txtNoMarque',$marque, 'default',array('required'=>'required')).'<BR>';
 $categorie=array(
   '1'=>'jeuxvidéo'
 );
 echo form_label('Numero de Categorie :','lblnocategorie');
echo form_dropdown('txtNoCategorie',$categorie, 'default',array('required'=>'required')).'<BR>';

echo form_submit('btnModifier', 'modifier').'<BR>';
echo form_close();
?>
</body>
</html>