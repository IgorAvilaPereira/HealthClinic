<h1>Atendimento - Arquivos </h1>

<table border=1>
    <tr>
        <td> Remover </td>
        <td> Editar </td>
    </tr>
    <?php foreach($vetArquivo as $arquivo) { ?>
    <tr>
        <td>
            <a class="btn btn-secondary" href="/arquivo/remover/<?=$arquivo->id?>/<?=$arquivo->atendimento_id?>">Remover</a>
        </td>
        <td>
            <a class="btn btn-secondary" href="/arquivo/tela_editar/<?=$arquivo->id?>/<?=$arquivo->atendimento_id?>">Editar</a>
        </td>
        <td>
            <?php echo $arquivo->nome; ?>
        </td>
    </tr>
    <?php } ?>
</table>
<a class="btn btn-primary" href="/arquivo/tela_adicionar/<?=$atendimento_id?>">Adicionar </a>