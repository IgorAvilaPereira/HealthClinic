<h1>Adicionar - Atendimento Arquivos </h1>

<form action="/arquivo/adicionar" method="post">
Nome: <input type="text" name="nome"> <br>
Arquivo: <input type="file" name="arquivo"> <br>
<input type="hidden" name="atendimento_id" value="<?=$atendimento_id?>"> <br>
<input type="submit" value="Adicionar">
</form>