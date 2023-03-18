
<h1>Editar - Documento </h1>
<form action="/documento/editar" method="post">
Descrição: <input type="text" name="nome" value="<?=$documento->nome?>"> <br>
<!-- Documento: <input type="file" name="documento"> <br> -->
<input type="hidden" name="pessoa_id" value="<?=$pessoa_id?>"> <br>
<input type="hidden" name="id" value="<?=$documento->id?>"> <br>
<input class="btn btn-primary" type="submit" value="Editar">
</form>