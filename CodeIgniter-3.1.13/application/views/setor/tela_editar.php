<h1>Editar - Setor</h1>

<form action="/setor/editar" method="post">
    Nome: <input type="text" name="nome" required value="<?=$setor->nome?>"> <br>
    Email: <input type="text" name="email" value="<?=$setor->email?>"> <br>
    Endereço: <input type="text" name="endereco" value="<?=$setor->endereco?>"> <br>
    Telefone: <input type="text" name="telefone" value="<?=$setor->telefone?>"> <br>
    <input type="hidden" name="id" value="<?=$setor->id?>">
    <input class="btn btn-primary" value="Editar" type="submit">
</form>