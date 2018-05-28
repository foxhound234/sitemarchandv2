<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php echo form_open('Visiteur/modifierlepanier');?>
<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

<tr>
        <th>Quantité</th>
        <th> Description</th>
        <th style="text-align:right"> prix TTC</th>
        <th style="text-align:right">Total</th>
</tr>
<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
         
        <tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <?php echo form_close(); ?>
                 <?php echo form_open('Visiteur\supprimerunproduit/'.$items['rowid']);?>
                <td><?php echo form_submit('btnSupprimer', 'enlevé du panier'); ?>   </td>
                <?php echo form_close(); ?>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>
<?php
echo form_submit('btnModifier', 'modifier');
 echo form_close();?>
<?php
 echo form_open('Client/passerCommande');
 if ($this->session->profil=='C')
{
  echo form_submit('btnAchat', 'passer commande'); 
}
 echo form_close();
 ?>
</body>
</html>