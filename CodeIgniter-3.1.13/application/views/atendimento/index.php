<h1>Atendimentos</h1>
<ul>
<?php foreach($vetAtendimento as $atendimento) { ?>
    <li>
         <a href="/atendimento/remover/<?=$atendimento->id?>">Remover</a>
         <a href="/atendimento/tela_editar/<?=$atendimento->id?>">Editar</a>
         <?php echo $atendimento->data_hora; ?>  <?php echo $atendimento->pessoa_nome; ?>  <?php echo $atendimento->usuario_nome; ?>  
    </li>
<?php } ?>
</ul>    
<a href="tela_adicionar">Adicionar </a>