<h1>Adicionar Foto - Pessoa</h1>
<?php if (!empty($error)) echo "<h1> Erros </h1>"; echo $error;?>

<?php if (count($upload_data)>0) { ?>
<h1> Upload </h1>
<ul>
    <?php foreach ($upload_data as $item => $value):?>
    <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>
<?php } ?>

<form enctype='multipart/form-data' action="/pessoa/adicionar_foto" method="post">
    <table>
        <!-- <tr>
            <td> Nome: </td>
            <td> <input type="text" name="nome"> </td>
        </tr>
        <tr>
            <td> Data Nascimento: </td>
            <td> <input type="date" name="data_nascimento"> </td>
        </tr>
        <tr>
            <td> Cpf: </td>
            <td> <input type="text" name="cpf"> </td>
        </tr>
        <tr>
            <td> RG: </td>
            <td> <input type="text" name="rg"> </td>
        </tr>
        <tr>
            <td> Rua: </td>
            <td> <input type="text" name="rua"> </td>
        </tr>
        <tr>
            <td> Bairro: </td>
            <td> <input type="text" name="bairro"> </td>
        </tr>
        <tr>
            <td> Complemento:</td>
            <td> <input type="text" name="complemento"> </td>
        </tr>
        <tr>
            <td> Cep:</td>
            <td> <input type="text" name="cep"> </td>
        </tr>
        <tr>
            <td> Sexo: </td>
            <td> <input type="radio" name="sexo" value="M"> Masculino <input type="radio" name="sexo" value="F">
                Feminino </td>
        </tr> -->
        <tr>
            <td> Foto:</td>
            <td> <input type="file" name="foto"> </td>
        </tr>
    </table>
    <input type="hidden" name="id" value=<?=$id?>>
    <input class="btn btn-primary" value="Adicionar" type="submit">
</form>