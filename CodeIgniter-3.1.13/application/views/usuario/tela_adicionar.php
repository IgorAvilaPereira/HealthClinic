<h1>Adicionar - Usuário</h1>

<form action="/usuario/adicionar" method="post">
    <table>
    <tr> <td> Nome: </td> <td> <input type="text" name="nome"> </td></tr>
    <tr> <td>Email: </td> <td> <input type="text" name="email" required> </td></tr>
    <tr> <td>Senha: </td> <td> <input type="password" name="senha"> </td></tr>
    <tr> <td>Setor: </td> <td> <select name="setor_id">
        <?php foreach($vetSetor as $setor) { ?>
        <option value=<?php echo $setor->id; ?>><?php echo $setor->nome; ?> </option>
        <?php } ?>
    </select> </td></tr>
        </table>
    <input class="btn btn-primary" value="Adicionar" type="submit">
</form>