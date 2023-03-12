<h1>Setores</h1>
<ul>
<?php foreach($vetSetor as $setor) { ?>
    <li> 
    <a href="/setor/remover/<?=$setor->id?>">Remover</a>
         <a href="/setor/tela_editar/<?=$setor->id?>">Editar</a>    
    <?php echo $setor->id; ?>  <?php echo $setor->nome; ?>  </li>
<?php } ?>
</ul>    
<a href="tela_adicionar">Adicionar </a>