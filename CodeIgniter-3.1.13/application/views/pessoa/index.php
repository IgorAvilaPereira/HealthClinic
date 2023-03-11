<h1>Pessoas</h1>
<ul>
<?php foreach($vetPessoa as $pessoa) { ?>
    <li> <?php echo $pessoa->id; ?>  <?php echo $pessoa->nome; ?>  </li>
<?php } ?>
</ul>    
<a href="tela_adicionar">Adicionar </a>