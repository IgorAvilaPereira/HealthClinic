<h1>Documentos </h1>

<table border=1>
    <tr>
        <td> Remover </td>
        <td> Editar </td>
    </tr>
    <?php foreach($vetDocumento as $documento) { ?>
    <tr>
        <td>
            <a class="btn btn-secondary"
                href="/documento/remover/<?=$documento->id?>/<?=$documento->pessoa_id?>">Remover</a>
        </td>
        <td>
            <a class="btn btn-secondary"
                href="/documento/tela_editar/<?=$documento->id?>/<?=$documento->pessoa_id?>">Editar</a>
        </td>
        <td>
            <?php echo $documento->nome; ?>
        </td>
        <td>

            <?=((!empty($documento->arquivo)) ? "<a class=\"btn btn-secondary\" href=\"/documento/baixar/".$documento->id."\">Baixar</a>": "")?>
        </td>
    </tr>
    <?php } ?>
</table>
<a class="btn btn-primary" href="/documento/tela_adicionar/<?=$pessoa_id?>">Adicionar </a>