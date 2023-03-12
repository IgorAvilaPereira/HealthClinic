<h1>Adicionar - pessoa documentos </h1>

<form action="/documento/adicionar" method="post">
Nome: <input type="text" name="nome"> <br>
documento: <input type="file" name="documento"> <br>
<input type="hidden" name="pessoa_id" value="<?=$pessoa_id?>"> <br>
<input type="submit" value="Adicionar">
</form>