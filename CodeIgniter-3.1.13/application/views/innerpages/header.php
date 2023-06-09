<!DOCTYPE html>
<html>
<head>
    <title>:: Projeto ::</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <style>
    ul {
        list-style-type: none;
    }
    </style>
</head>
<body>
    <!-- Cabeçalho -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/atendimento/index">Atendimento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pessoa/index">Pessoas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/setor/index">Setores</a>
                    </li>

                    <?php if ($this->session->usuario->eh_admin == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/usuario/index">Usuários</a>
                    </li>
                    <?php }?>
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/perfil/index">Perfis</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/relatorio/index">Relatórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/usuario/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <hr>