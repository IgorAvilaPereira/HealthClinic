<h1>Usuários</h1>
<ul>
<?php foreach($vetUsuario as $usuario) { ?>
    <li> 
    <a href="/usuario/remover/<?=$usuario->id?>">Remover</a>
         <a href="/usuario/tela_editar/<?=$usuario->id?>">Editar</a>    
    <?php echo $usuario->id; ?>  <?php echo $usuario->nome; ?>  </li>
<?php } ?>
</ul>    
<a href="tela_adicionar">Adicionar </a>