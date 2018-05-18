<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" />
    <script src="main.js"></script>
</head>
<body>
    <h2> <?php echo $titredelapage?></h2>
  <?php  
  echo validation_errors(); // mise en place de la validation

  /* set_value : en cas de non validation les données déjà
  
  saisies sont réinjectées dans le formulaire */
  
  echo form_open('Client/profil');
echo form_label('prenom','lbxPrenom');

echo form_input('txtPrenom','value'=>$leclient['PRENOM').'<BR>';

echo form_label('Nom','lbxNom'); // creation d'un label devant la zone de saisie

echo form_input('txtNom',$leclient->NOM).'<BR>';
echo form_label('adresse', 'lbxadresse');

echo form_input('txtadresse',$leclient->ADRESSE).'<BR>';

echo form_label('ville', 'lbxVille');

echo form_input('txtVille',$leclient->VILLE).'<BR>';
echo form_label('codepostal','lbxcodePostal');

echo form_input('txtcodePostal',$leclient->CODEPOSTAL).'<BR>';
echo form_label('email', 'lbxemail');

echo form_input('txtEmail',$leclient->EMAIL).'<BR>';

echo form_label('Mot de passe','lbxMdp');

echo form_password('txtMdp',$leclient->MOTSDEPASSE).'<BR>';

echo form_submit('submit', 'enregistrement').'<BR>';

echo form_close();
?>
</body>
</html>