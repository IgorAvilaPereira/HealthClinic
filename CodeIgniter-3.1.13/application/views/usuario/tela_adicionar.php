<form action="/usuario/adicionar" method="post">
Nome: <input type="text" name="nome">  <br>
Email: <input type="text" name="email" required>  <br>
Senha: <input type="password" name="senha">  <br>
Setor: <select name="setor_id">
<?php foreach($vetSetor as $setor) { ?>
    <option value=<?php echo $setor->id; ?>><?php echo $setor->nome; ?> </option>
<?php } ?>    
</select> <br>
<input value="Adicionar" type="submit">
</form>