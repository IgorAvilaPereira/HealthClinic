<h1>Adicionar - Documento </h1>

<form enctype='multipart/form-data' action="/documento/adicionar" method="post">
Descrição: <input type="text" name="nome"> <br>
Documento: <input type="file" name="documento"> <br>
<input type="hidden" name="pessoa_id" value="<?=$pessoa_id?>"> <br>
<input class="btn btn-primary" type="submit" value="Adicionar">
</form>