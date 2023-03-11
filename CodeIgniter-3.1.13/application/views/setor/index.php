<h1>Setores</h1>
<ul>
<?php foreach($vetSetor as $setor) { ?>
    <li> <?php echo $setor->id; ?>  <?php echo $setor->nome; ?>  </li>
<?php } ?>
</ul>    
<a href="tela_adicionar">Adicionar </a>