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

<h2> Quantidade de Atendimentos </h2>
<?=$qtde_atendimento->qtde?> 
<!-- 
<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script> -->
 