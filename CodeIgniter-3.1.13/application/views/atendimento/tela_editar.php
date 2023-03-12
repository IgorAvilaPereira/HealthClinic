<?php echo var_dump($atendimento);?>

<form action="/atendimento/editar" method="post">
data/hora: <input type="date" value="<?=$atendimento->data_hora?>"> <br>
observacao: <textarea name="observacao"><?=$atendimento->observacao?></textarea><br>
<input type="hidden" name="id" value="<?=$atendimento->id?>">
<input value="Editar" type="submit">
</form>