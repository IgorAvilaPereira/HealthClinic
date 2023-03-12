<h1>Pessoas</h1>
<ul>
<?php foreach($vetPessoa as $pessoa) { ?>
    <li>
    <a href="/pessoa/remover/<?=$pessoa->id?>">Remover</a>
         <a href="/pessoa/remover/<?=$pessoa->id?>">Editar</a> 
        <?php echo $pessoa->id; ?>  <?php echo $pessoa->nome; ?>  </li>
<?php } ?>
</ul>    
<a href="tela_adicionar">Adicionar </a>