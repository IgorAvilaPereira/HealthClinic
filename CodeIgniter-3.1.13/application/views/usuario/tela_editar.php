<h1>Editar - Usuário</h1>
<form action="/usuario/editar" method="post">
    Nome: <input type="text" name="nome" value="<?=$usuario->nome?>"> <br>
    Email: <input type="text" name="email" required value="<?=$usuario->email?>"> <br>
    Senha: <input type="password" name="senha"> <br>
    Setor: <select name="setor_id">
        <?php foreach($vetSetor as $setor) { ?>
            <?php if ($usuario->setor_id == $setor->id) { ?>
                <option value=<?php echo $setor->id; ?> selected><?php echo $setor->nome; ?> </option>
            <?php } else  { ?>
                <option value=<?php echo $setor->id; ?>><?php echo $setor->nome; ?> </option>
            <?php } ?>
        <?php } ?>
    </select> <br>
    <input type="hidden" name="id" value="<?=$usuario->id?>">
    <input class="btn btn-primary" value="Editar" type="submit">
</form>