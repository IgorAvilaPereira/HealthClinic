<h1>Atendimentos</h1>

<table border=1>
    <tr>
        <td> Arquivos </td>
        <td> Remover </td>
        <td> Editar </td>
        <td> Data/hora </td>
        <td> Pessoa </td>
        <td> Atendente </td>
        <td> Observação </td>
    </tr>
    <?php foreach($vetAtendimento as $atendimento) { ?>
    <tr>
        <td>
            <a class="btn btn-secondary" href="/arquivo/index/<?=$atendimento->id?>">Arquivos</a>
        </td>
        <td>
            <a class="btn btn-secondary" href="/atendimento/remover/<?=$atendimento->id?>">Remover</a>
        </td>
        <td>
            <a class="btn btn-secondary" href="/atendimento/tela_editar/<?=$atendimento->id?>">Editar</a>
        </td>
        <td>
            <?php echo $atendimento->data_hora; ?>

        </td>
        <td>
            <!-- <a class="btn btn-secondary" href="/pessoa/tela_editar/<?=$atendimento->id?>"> -->
            <?php echo $atendimento->pessoa_nome; ?>
            </a>
        </td>
        <td>
            <?php echo $atendimento->usuario_nome; ?>
        </td>
        <td>
            <?php echo $atendimento->observacao; ?>
        </td>
    </tr>
    <?php } ?>
</table>
<?=$pagination?> <br>

<a class="btn btn-primary" href="tela_adicionar">Adicionar </a>