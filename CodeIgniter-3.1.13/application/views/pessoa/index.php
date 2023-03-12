<h1>Pessoas</h1>
<ul>
    <?php foreach($vetPessoa as $pessoa) { ?>
    <li>
        <td>
            <a class="btn btn-secondary" href="/documento/index/<?=$pessoa->id?>">Documentos</a>
        </td>
        <a class="btn btn-secondary" href="/pessoa/remover/<?=$pessoa->id?>">Remover</a>
        <a class="btn btn-secondary" href="/pessoa/tela_editar/<?=$pessoa->id?>">Editar</a>
        <?php echo $pessoa->id; ?> <?php echo $pessoa->nome; ?>
    </li>
    <?php } ?>
</ul>
<?=$pagination?> <br>

<a class="btn btn-primary" href="tela_adicionar">Adicionar </a>