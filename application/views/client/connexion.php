<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h2><?php echo $TitreDeLaPage ?></h2>
<div class="input-group">
<?php
echo form_open('Client/connexion');

echo form_label('email','lblEmail'); // creation d'un label devant la zone de saisie

echo form_input(array('type'=>'email','name'=>'txtEmail','required'=>'required','class'=>"form-control")).'<BR>';

echo form_label('Mot de passe','lblMotDePasse');

echo form_password(array('name'=>'txtMotDePasse','required'=>'required','class'=>"form-control")).'<BR>';

echo form_submit('btnconnect', 'Se connecter'); 

echo form_close();
?>
</body>
</html>