<h1>Adicionar - Pessoa</h1>
<?php if (!empty($error)) echo "<h1> Erros </h1>"; echo $error;?>

<?php if (count($upload_data)>0) { ?>
    <h1> Upload </h1>
<ul>
    <?php foreach ($upload_data as $item => $value):?>
    <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>
<?php } ?>

<form enctype='multipart/form-data' action="/pessoa/adicionar" method="post">
    Nome: <input type="text" name="nome"> <br>
    Data Nascimento: <input type="date" name="data_nascimento"> <br>
    Cpf: <input type="text" name="cpf"> <br>
    RG: <input type="text" name="rg"> <br>
    Rua: <input type="text" name="rua"> <br>
    Bairro <input type="text" name="bairro"> <br>
    Complemento: <input type="text" name="complemento"> <br>
    Cep: <input type="text" name="cep"> <br>
    Sexo: <input type="radio" name="sexo" value="M"> Masculino  <input type="radio" name="sexo" value="F"> Feminino <br>
    Foto: <input type="file" name="foto"> <br>
    <input class="btn btn-primary" value="Adicionar" type="submit">
</form>