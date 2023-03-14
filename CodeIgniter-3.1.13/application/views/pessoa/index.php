<h1>Pessoas</h1>
<ul>
    <?php foreach($vetPessoa as $pessoa) { ?>
    <li>
        <?php echo $pessoa->id; ?> <?php echo $pessoa->nome; ?>
        <a class="btn btn-secondary" href="/documento/index/<?=$pessoa->id?>">Documentos</a>      
        <a class="btn btn-secondary" href="/pessoa/tela_editar/<?=$pessoa->id?>">Editar</a>
        <a class="btn btn-warning" href="/pessoa/remover/<?=$pessoa->id?>">Remover</a>
            <!-- <?php echo $pessoa->id; ?> <?php echo $pessoa->nome; ?> -->
        <?=((!empty($pessoa->foto)) ? "<a class=\"btn btn-primary\" href=\"/pessoa/foto/".$pessoa->id."\">Visualizar Foto</a> <a class=\"btn btn-danger\" href=\"/pessoa/remover_foto/".$pessoa->id."\">Remover Foto</a>": "<a class=\"btn btn-primary\" href=\"/pessoa/tela_adicionar_foto/".$pessoa->id."\">Adicionar Foto</a>")?>
    </li>
    <?php } ?>
</ul>
<?=$pagination?> <br>
<a class="btn btn-primary" href="tela_adicionar">Adicionar </a>