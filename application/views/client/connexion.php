<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<h2><?php echo $TitreDeLaPage ?></h2>
<div class="input-group">
<?php


echo form_open('Client/connexion');

echo form_label('email','lblEmail'); // creation d'un label devant la zone de saisie

echo form_input(array('type'=>'email','name'=>'txtEmail','required'=>'required','class'=>'form-control'));

echo form_label('Mot de passe','lblMotDePasse');

echo form_password(array('name'=>'txtMotDePasse','required'=>'required','class'=>'form-control'));

echo form_submit('btnconnect', 'Se connecter');

echo form_close();
?>
</body>
</html>