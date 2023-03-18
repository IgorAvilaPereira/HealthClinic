<h1>Editar - Usuário</h1>
<!-- <?php if (!empty($error)) echo "<h1> Erros </h1>"; echo $error;?> -->

<form action="/usuario/editar" method="post">
    Nome: <input type="text" name="nome" value="<?=$usuario->nome?>" required> <br>
    Email: <input type="text" name="email" required value="<?=$usuario->email?>" required> <br>
    Senha: <input type="password" name="senha" required> <br>
    <!-- Senha Nova: <input type="password" name="senha_nova">*obs: preencher caso deseja mudar <br> -->
    <!-- Senha Nova: <input type="password" name="senha_nova1" required> <br> -->
    <!-- Senha Nova (Confirmação): <input type="password" name="senha_nova2" required> <br> -->
    Admin: </td> <td> <input type="checkbox" name="eh_admin" value="1" <?=(($usuario->eh_admin == 1) ? "checked" : "")?>> <br>
    Setor: <select required name="setor_id">
        <?php foreach($vetSetor as $setor) { ?>
        <?php if ($usuario->setor_id == $setor->id) { ?>
        <option value=<?php echo $setor->id; ?> selected><?php echo $setor->nome; ?> </option>
        <?php } else  { ?>
        <option value=<?php echo $setor->id; ?>><?php echo $setor->nome; ?> </option>
        <?php } ?>
        <?php } ?>
    </select> <br>
    <!-- Perfil: </td>
     <td> <select required name="perfil_id[]" multiple>
            <?php foreach($vetPerfil as $perfil) { ?>
            <?php if (in_array($perfil->id, $vetUsuarioPerfil)) { ?>
            <option value=<?php echo $perfil->id; ?> selected><?php echo $perfil->nome; ?> </option>
            <?php }  else { ?>
            <option value=<?php echo $perfil->id; ?>><?php echo $perfil->nome; ?> </option>
            <?php } ?>
            <?php } ?> 

        </select> <br>-->
        <input type="hidden" name="id" value="<?=$usuario->id?>">
        <input class="btn btn-primary" value="Editar" type="submit">
</form>