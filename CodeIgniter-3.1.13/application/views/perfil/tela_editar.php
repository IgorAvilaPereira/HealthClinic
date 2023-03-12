<h1>Editar - Perfil</h1>
<form action="/perfil/editar" method="post">
    Nome: <input type="text" name="nome" value="<?=$perfil->nome?>"> <br>
    adicionar: <input type="checkbox" name="adicionar" value="TRUE"> <br>
    visualizar: <input type="checkbox" name="visualizar" value="TRUE"> <br>
    editar: <input type="checkbox" name="editar" value="TRUE"> <br>
    remover: <input type="checkbox" name="remover" value="TRUE"> <br>
    <input type="hidden" name="id" value="<?=$perfil->id?>">
    <input class="btn btn-primary" value="Editar" type="submit">
</form>