<h1>Perfis</h1>
<ul>
    <?php foreach($vetPerfil as $perfil) { ?>

    <li>
        <a class="btn btn-secondary" href="/perfil/remover/<?=$perfil->id?>">Remover</a>
        <a class="btn btn-secondary" href="/perfil/tela_editar/<?=$perfil->id?>">Editar</a>
        <?php echo $perfil->id; ?> <?php echo $perfil->nome; ?>
    </li>
    <?php } ?>
</ul>
<?=$pagination?> <br>

<a class="btn btn-primary" href="tela_adicionar">Adicionar </a>