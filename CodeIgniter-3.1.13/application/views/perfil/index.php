<h1>Perfis</h1>
<ul>
<?php foreach($vetPerfil as $perfil) { ?>
    
    <li> 
    <a href="/perfil/remover/<?=$perfil->id?>">Remover</a>
         <a href="/perfil/tela_editar/<?=$perfil->id?>">Editar</a>
    <?php echo $perfil->id; ?>  <?php echo $perfil->nome; ?>  </li>
<?php } ?>
</ul>    
<a href="tela_adicionar">Adicionar </a>