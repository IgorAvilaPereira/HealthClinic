
<h1>Editar - pessoa documentos </h1>
<form action="/documento/editar" method="post">
Nome: <input type="text" name="nome" value="<?=$documento->nome?>"> <br>
documento: <input type="file" name="documento"> <br>
<input type="hidden" name="pessoa_id" value="<?=$pessoa_id?>"> <br>
<input type="hidden" name="id" value="<?=$documento->id?>"> <br>
<input type="submit" value="Editar">
</form>