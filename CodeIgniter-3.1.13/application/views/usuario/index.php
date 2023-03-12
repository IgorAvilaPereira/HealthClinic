<h1>Usuários</h1>
<ul>
    <?php foreach($vetUsuario as $usuario) { ?>
    <li>
        <a class="btn btn-secondary" href="/usuario/remover/<?=$usuario->id?>">Remover</a>
        <a class="btn btn-secondary" href="/usuario/tela_editar/<?=$usuario->id?>">Editar</a>
        <?php echo $usuario->id; ?> <?php echo $usuario->nome; ?>
    </li>
    <?php } ?>
</ul>
<a class="btn btn-primary" href="tela_adicionar">Adicionar </a>