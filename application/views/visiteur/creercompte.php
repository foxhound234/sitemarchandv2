<h2><?php echo $TitreDeLaPage ?></h2>

<?php

echo validation_errors(); // mise en place de la validation

/* set_value : en cas de non validation les données déjà

saisies sont réinjectées dans le formulaire */

echo form_open('Visiteur/ajouterunclient');

echo form_label('prenom','lbxPrenom');

echo form_input('txtPrenom','').'<BR>';

echo form_label('Nom','lbxNom'); // creation d'un label devant la zone de saisie

echo form_input('txtNom','').'<BR>';
echo form_label('adresse', 'lbxadresse');

echo form_input('txtadresse','').'<BR>';

echo form_label('ville', 'lbxVille');

echo form_input('txtVille','').'<BR>';
echo form_label('codepostal','lbxcodePostal');

echo form_input('txtcodePostal','').'<BR>';
echo form_label('email', 'lbxemail');

echo form_input('txtEmail','').'<BR>';

echo form_label('Mot de passe','lbxMdp');

echo form_password('txtMdp','').'<BR>';

echo form_submit('submit', 'enregistrement').'<BR>';

echo form_close();
?>