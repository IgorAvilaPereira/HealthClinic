<form action="/atendimento/editar" method="post">
observacao: <textarea name="observacao"><?=$atendimento->observacao?></textarea>
<input type="hidden" name="id" value="<?=$atendimento->id?>">
<input value="Editar" type="submit">
</form>