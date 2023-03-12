<!DOCTYPE html>
<html>

<head>
    <title>Projeto</title>
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

<h1>Login</h1>

<?php if (!empty($error)) echo "<h1 class='btn btn-danger'>".$error."</h1>";?>


<form action="/usuario/login" method="post">
    <table>
        <tr>
            <td>Email: </td>
            <td> <input type="text" name="email" required value="joao@joao.com"> </td>
        </tr>
        <tr>
            <td>Senha: </td>
            <td> <input type="password" name="senha" value="123"> </td>
        </tr>
    </table>
    <input class="btn btn-primary" value="Login" type="submit">
</form>
</body>
</html>