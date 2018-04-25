<h2><?php echo $TitreDeLaPage ?></h2>

<?php
echo form_open('Admin/ajouterunproduit');

 echo form_label('nom du produit :', 'lbllibelle');

 echo  form_input('txtlibelle','',array('pattern'=>'^[a-zA-Z][a-zA-Z0-9]*','title'=>'le produit  doit commencer par une lettre', 'required'=>'required')).'<BR>';

 echo form_label('détail du produit :', 'lbldétail');

 echo  form_textarea('txtdetail', '',array('required'=>'required')).'<BR>';


 
  echo  form_label('prixht :','lblprixht');
  echo  form_input('txtprixht', '',array('pattern'=>".{0,}",'title'=>'le prix doit est uniquement composé de chiffres','required'=>'required')).'<BR>';

  echo  form_label('tauxtva :', 'lbltva');

  echo  form_input('txttva', '',array('pattern'=>".{0,10}" ,'title'=>'la tva doit est uniquement composé de chiffres','required'=>'required')).'<BR>';

   echo form_label('image :', 'lblimage');
 
   echo form_input(array('type'=>'file','name'=>'txtimage')).'<BR>';
   
   echo form_label('quantité dans le stock', 'lblquantitestock');

   echo form_input(array( 'name'=>'txtquantitestock','type'=>'number', 'min'=>'0','max'=>'1000','step'=>'1','required'=>'required')).'<BR>';
  
  echo form_label('dateajout', 'lbldateajout');
  
  echo form_input('txtdateajout', '',array('type'=>'date','name'=>'txtdateajout','required'=>'required')).'<BR>';
  
  echo form_label('disponibilité', 'lbldispo');
  $liste=array(
     '1'=> 'VRAI',
     '0'=> 'FAUX'
  );
  echo form_dropdown('txtdispo',$liste,'default',array('required'=>'required')).'<BR>';

 echo form_label('Numero de marque :','lblnomarque');
?>
<select name "nomarque" required>
<option value="" selected>choisir une marque</option>
<?php 

foreach ($LesMarques as $UneMarque) {
 echo '<option value="'.$UneMarque['NOMARQUE'].'">'.$UneMarque['NOM'].'</option>';

}
?>
</select> <BR>
<?php
 echo form_label('Numero de categorie:','lblnocategorie');
 ?>
 <select name "nocategorie" required>
<option value="" selected>choisir une categorie </option>
<?php
foreach($LesCategorie as $Unecategorie){
  echo '<option value="'.$Unecategorie['NOCATEGORIE'].'">'.$Unecategorie['LIBELLE'].'</option>';
}
?>
</select> <BR>
<?php
echo form_submit('boutonAjouter', 'ajouter').'<BR>';
echo form_close();
?>