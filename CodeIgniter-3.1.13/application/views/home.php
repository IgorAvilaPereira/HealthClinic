
Olá, <?=$this->session->usuario->nome?> <br>

<a href="/atendimento/index">Atendimentos </a> <br>
<a href="/setor/index">Setores </a> <br> 
<!-- <a href="/perfil/index">Perfil </a> <br>-->
     <?php if ($this->session->usuario->eh_admin == 1) { ?> 

<a href="/usuario/index">Usuários </a> <br>
        <?php } ?>
<a href="/pessoa/index">Pessoas </a> <br>
<a href="/atendimento/index">Relatórios </a> <br> 