<h1>Adicionar - Arquivos </h1>

<?php if (!empty($error)) echo "<h1> Erros </h1>"; echo $error;?>

<?php if (count($upload_data)>0) { ?>
    <h1> Upload </h1>
<ul>
    <?php foreach ($upload_data as $item => $value):?>
    <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>
<?php } ?>

<form enctype='multipart/form-data' action="/arquivo/adicionar" method="post">
    Descrição: <input type="text" name="nome"> <br>
    Arquivo: <input type="file" name="arquivo"> <br>
    <input type="hidden" name="atendimento_id" value="<?=$atendimento_id?>"> <br>
    <input type="submit" value="Adicionar">
</form>