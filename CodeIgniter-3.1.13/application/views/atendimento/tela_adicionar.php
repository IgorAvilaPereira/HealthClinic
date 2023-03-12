<form action="/atendimento/adicionar" method="post">
observacao: <textarea name="observacao">  </textarea> <br>
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
<input value="Adicionar" type="submit">
</form>