<h1>Editar - Pessoa</h1>
<form enctype='multipart/form-data' action="/pessoa/editar" method="post">
    <table>
        <tr>
            <td> Nome: </td>
            <td> <input type="text" name="nome" value="<?=$pessoa->nome?>"> </td>
        </tr>
        <tr>
            <td> Data Nascimento: </td>
            <td> <input type="date" name="data_nascimento" value="<?=$pessoa->data_nascimento?>"> </td>
        </tr>
        <tr>
            <td> Cpf: </td>
            <td> <input type="text" name="cpf" value="<?=$pessoa->cpf?>"> </td>
        </tr>
        <tr>
            <td> RG: </td>
            <td> <input type="text" name="rg" value="<?=$pessoa->rg?>"> </td>
        </tr>
        <tr>
            <td> Rua: </td>
            <td> <input type="text" name="rua" value="<?=$pessoa->rua?>"> </td>
        </tr>
        <tr>
            <td> Bairro: </td>
            <td> <input type="text" name="bairro" value="<?=$pessoa->bairro?>"> </td>
        </tr>
        <tr>
            <td> Complemento: </td>
            <td> <input type="text" name="complemento" value="<?=$pessoa->complemento?>"> </td>
        </tr>
        <tr>
            <td> Cep: </td>
            <td> <input type="text" name="cep" value="<?=$pessoa->cep?>"> </td>
        </tr>
        <tr>
            <td> Sexo: </td>
            <td> <input type="radio" name="sexo" value="M" <?=(($pessoa->sexo == 'M') ?  "checked" : "")?>> Masculino
                <input type="radio" name="sexo" value="F" <?=(($pessoa->sexo == 'F') ?  "checked" : "")?>> Feminino
            </td>
        </tr>
        <tr>
            <td> Foto: </td>
            <td> <input type="file" name="foto">
                <?=((!empty($pessoa->foto)) ? "<a class=\"btn btn-secondary\" href=\"/pessoa/foto/".$pessoa->id."\">Foto</a>": "")?>
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$pessoa->id?>">
    <input class="btn btn-primary" value="Editar" type="submit">
</form>