<h1>Perfis</h1>
<ul>
<?php foreach($vetPerfil as $perfil) { ?>
    <li> <?php echo $perfil->id; ?>  <?php echo $perfil->nome; ?>  </li>
<?php } ?>
</ul>    
<a href="tela_adicionar">Adicionar </a>