<h1>Adicionar - Atendimento</h1>
<form action="/atendimento/adicionar" method="post">
    Usuario: <select name="usuario_id">
        <?php foreach($vetUsuario as $usuario) { ?>
        <option value=<?php echo $usuario->id; ?>><?php echo $usuario->nome; ?> </option>
        <?php } ?>
    </select> <br>
    Pessoa: <select name="pessoa_id">
        <?php foreach($vetPessoa as $pessoa) { ?>
        <option value=<?php echo $pessoa->id; ?>><?php echo $pessoa->nome; ?> </option>
        <?php } ?>
    </select> <br>
    Observação: <textarea name="observacao">  </textarea> <br>
    <input class="btn btn-primary" value="Adicionar" type="submit">
</form>