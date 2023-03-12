<h1>Editar - Atendimento</h1>
<form action="/atendimento/editar" method="post">
    <table>
        <tr>
            <td> Data/Hora: </td>
            <td> <?=$atendimento->data_hora?></td>
        </tr>
        <tr>
            <td> Usuário: </td>
            <td>
                <select name="usuario_id">
                    <?php foreach ($vetUsuario as $usuario) {?>
                    <option value=<?php echo $usuario->id; ?>><?php echo $usuario->nome; ?> </option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <td> Pessoa: </td>
        <td> <select name="pessoa_id">
                <?php foreach ($vetPessoa as $pessoa) {?>
                <option value=<?php echo $pessoa->id; ?>><?php echo $pessoa->nome; ?> </option>
                <?php }?>
            </select> </td>
        </tr>
        <tr>
            <td>
                Observação: </td>
            <td> <textarea name="observacao"><?=$atendimento->observacao?></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$atendimento->id?>">
    <input class="btn btn-primary" value="Editar" type="submit">
</form>