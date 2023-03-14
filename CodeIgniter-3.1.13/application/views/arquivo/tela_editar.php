<h1>Editar - Arquivo </h1>
<form action="/arquivo/editar" method="post">
Descrição: <input type="text" name="nome" value="<?=$arquivo->nome?>"> <br>
<!-- Arquivo: <input type="file" name="arquivo"> <br> -->
<input type="hidden" name="atendimento_id" value="<?=$atendimento_id?>"> <br>
<input type="hidden" name="id" value="<?=$arquivo->id?>"> <br>
<input type="submit" class="btn btn-primary" value="Editar">
</form>