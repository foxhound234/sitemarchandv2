<h2><?php echo $TitreDeLaPage ?></h2>

<?php

echo validation_errors(); // mise en place de la validation

/* set_value : en cas de non validation les données déjà

saisies sont réinjectées dans le formulaire */

echo form_open('Visiteur/ajouterunclient');

echo form_label('prenom','lbxPrenom');

echo form_input(array('name'=>'txtPrenom','value'=>'','pattern'=>'[a-zA-Z0-9]+','required'=>'required')).'<BR>';

echo form_label('Nom','lbxNom'); // creation d'un label devant la zone de saisie

echo form_input(array('name'=>'txtNom','value'=>'','pattern'=>'[a-zA-Z0-9]+','required'=>'required')).'<BR>';
echo form_label('adresse', 'lbxadresse');

echo form_input(array('name'=>'txtadresse','value'=>'','pattern'=>'[a-zA-Z0-9]+','required'=>'required')).'<BR>';

echo form_label('ville', 'lbxVille');

echo form_input(array('name'=>'txtVille','value'=>'','pattern'=>'[a-zA-Z0-9]+','required'=>'required')).'<BR>';
echo form_label('codepostal','lbxcodePostal');

echo form_input(array('name'=>'txtcodePostal','value'=>'','pattern'=>'[0-9]{4}','required'=>'required')).'<BR>';
echo form_label('email', 'lbxemail');

echo form_input(array('name'=>'txtEmail','value'=>'','type'=>'email','required'=>'required')).'<BR>';

echo form_label('Mot de passe','lbxMdp');

echo form_password(array('name'=>'txtMdp','value'=>'','pattern'=>'(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$','required'=>'required')).'<BR>';

echo form_submit('btnEnregistrement', 'enregistrement').'<BR>';

echo form_close();
?>