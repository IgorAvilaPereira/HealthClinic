<h1>Atendimentos</h1>
<ul>
    <?php foreach($vetAtendimento as $atendimento) { ?>
    <li>
        <a class="btn btn-secondary" href="/atendimento/remover/<?=$atendimento->id?>">Remover</a>
        <a class="btn btn-secondary" href="/atendimento/tela_editar/<?=$atendimento->id?>">Editar</a>
        <?php echo $atendimento->data_hora; ?> <?php echo $atendimento->pessoa_nome; ?>
        <?php echo $atendimento->usuario_nome; ?>
    </li>
    <?php } ?>
</ul>
<a class="btn btn-primary" href="tela_adicionar">Adicionar </a>