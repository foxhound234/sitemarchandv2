<h2><?php echo $TitreDeLaPage ?></h2>

<?php


echo form_open('Client/connexion');

echo form_label('email','lblEmail'); // creation d'un label devant la zone de saisie

echo form_input(array('type'=>'email','name'=>'txtEmail','required'=>'required'));

echo form_label('Mot de passe','lblMotDePasse');

echo form_password('txtMotDePasse',array('required'=>'required'));

echo form_submit('btnconnect', 'Se connecter');

echo form_close();
?>