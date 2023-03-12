<h1>Editar - Pessoa</h1>
<form action="/pessoa/editar" method="post">
    Nome: <input type="text" name="nome" value="<?=$pessoa->nome?>"> <br>
    Data Nascimento: <input type="date" name="data_nascimento" value="<?=$pessoa->data_nascimento?>"> <br>
    Cpf: <input type="text" name="cpf" value="<?=$pessoa->cpf?>"> <br>
    RG: <input type="text" name="rg" value="<?=$pessoa->rg?>"> <br>
    Rua: <input type="text" name="rua" value="<?=$pessoa->rua?>"> <br>
    Bairro <input type="text" name="bairro" value="<?=$pessoa->bairro?>"> <br>
    Complemento: <input type="text" name="complemento" value="<?=$pessoa->complemento?>"> <br>
    Cep: <input type="text" name="cep" value="<?=$pessoa->cep?>"> <br>
    Foto: <input type="file" name="foto"> <br>
    <input type="hidden" name="id" value="<?=$pessoa->id?>">
    <input class="btn btn-primary" value="Editar" type="submit">
</form>