<h1>Relatórios</h1>

<h2> Quantidade Por Sexo </h2>
<?php if (count($dados)>0) { ?>
    <?php if (isset($dados[0])) { ?>
        <?=($dados[0]->sexo == "M")? "Masculino" : "Feminino" ?>  <?=$dados[0]->qtde?> <br>
    <?php }?>
    <?php if (isset($dados[1])) { ?>    
        <?=($dados[1]->sexo == "M")? "Masculino" : "Feminino" ?>  <?=$dados[1]->qtde?>
    <?php }?>
<?php } ?>