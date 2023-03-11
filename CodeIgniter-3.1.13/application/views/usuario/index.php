<h1>Usuários</h1>
<ul>
<?php foreach($vetUsuario as $usuario) { ?>
    <li> <?php echo $usuario->id; ?>  <?php echo $usuario->nome; ?>  </li>
<?php } ?>
</ul>    
<a href="tela_adicionar">Adicionar </a>