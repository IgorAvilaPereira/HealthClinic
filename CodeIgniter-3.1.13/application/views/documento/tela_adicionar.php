<h1>Adicionar - Documento </h1>

<?php if (!empty($error)) echo "<h1> Erros </h1>"; echo $error;?>

<?php if (count($upload_data)>0) { ?>
    <h1> Upload </h1>
<ul>
    <?php foreach ($upload_data as $item => $value):?>
    <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>
<?php } ?>

<form enctype='multipart/form-data' action="/documento/adicionar" method="post">
Descrição: <input type="text" name="nome"> <br>
Documento: <input type="file" name="documento"> <br>
<input type="hidden" name="pessoa_id" value="<?=$pessoa_id?>"> <br>
<input class="btn btn-primary" type="submit" value="Adicionar">
</form>