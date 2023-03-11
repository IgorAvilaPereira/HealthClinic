<h1>Atendimentos</h1>
<ul>
<?php foreach($vetAtendimento as $atendimento) { ?>
    <li> <?php echo $atendimento->id; ?>  <?php echo $atendimento->data_hora; ?>  </li>
<?php } ?>
</ul>    
<a href="tela_adicionar">Adicionar </a>