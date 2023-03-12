<h1>Adicionar - Atendimento</h1>
<form action="/atendimento/adicionar" method="post">
    <table>
        <tr>
            <td>
                Usuario: </td>
            <td> <select name="usuario_id">
                    <?php foreach($vetUsuario as $usuario) { ?>
                    <option value=<?php echo $usuario->id; ?>><?php echo $usuario->nome; ?> </option>
                    <?php } ?>
                </select>
        <tr>
            <td> Pessoa:</td>
            <td> <select name="pessoa_id">
                    <?php foreach($vetPessoa as $pessoa) { ?>
                    <option value=<?php echo $pessoa->id; ?>><?php echo $pessoa->nome; ?> </option>
                    <?php } ?>
                </select> </td>
        </tr>
        <tr>
            <td> Observação: </td>
            <td> <textarea name="observacao" required></textarea> </td>
        </tr>
    </table>
    <input class="btn btn-primary" value="Adicionar" type="submit">
</form>