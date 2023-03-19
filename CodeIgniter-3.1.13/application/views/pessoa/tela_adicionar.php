<script>
function mascaraCPF(cpf) {
    cpf.value = cpf.value.replace(/\D/g, "").replace(/(\d{3})(\d)/, "$1.$2").replace(/(\d{3})(\d)/, "$1.$2").replace(
        /(\d{3})(\d{1,2})$/, "$1-$2");
}

function validaCPF(cpf) {
}
//     var c = cpf.value.replace(".", "").replace(".", "").replace("-", "");
    
 
//     // alert(c);


//         if (c.lenght > 0 && c.length < 11)
//             alert("cpf incorreto");
//             return false;

        
//         if (c == "00000000000" || c == "11111111111" || c == "22222222222" || c == "333333333333" || c == "44444444444" || c == "555555555555" || c == "66666666666" || c == "77777777777" || c == "88888888888" || c == "99999999999") {            alert("cpf incorreto");
//             return false;
//         } else {
//             alert("pl"+c);
//         }
//         var r;
//         var s = 0;

//         for (i = 1; i <= 9; i++)
//             s = s + parseInt(c[i - 1]) * (11 - i);

//         r = (s * 10) % 11;

//         if ((r == 10) || (r == 11))
//             r = 0;

//         if (r != parseInt(c[9]))
//             alert("cpf incorreto");
//             return false;

//         s = 0;

//         for (i = 1; i <= 10; i++)
//             s = s + parseInt(c[i - 1]) * (12 - i);

//         r = (s * 10) % 11;

//         if ((r == 10) || (r == 11))
//             r = 0;

//         if (r != parseInt(c[10]))
//             alert("cpf incorreto");
//             return false;
   
//     return true;
// }
</script>

<h1>Adicionar - Pessoa</h1>
<?php if (!empty($error)) echo "<h1> Erros </h1>"; echo $error;?>

<?php if (count($upload_data)>0) { ?>
<h1> Upload </h1>
<ul>
    <?php foreach ($upload_data as $item => $value):?>
    <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>
<?php } ?>

<form enctype='multipart/form-data' action="/pessoa/adicionar" method="post">
    <table>
        <tr>
            <td> Nome: </td>
            <td> <input type="text" name="nome"> </td>
        </tr>
        <tr>
            <td> Data Nascimento: </td>
            <td> <input type="date" name="data_nascimento"> </td>
        </tr>
        <tr>
            <td> Cpf: </td>
            <td> <input type="text" maxlength="14" name="cpf" onkeydown="mascaraCPF(this);" onblur="validaCPF(this)">
            </td>
        </tr>
        <tr>
            <td> RG: </td>
            <td> <input type="text" name="rg"> </td>
        </tr>
        <tr>
            <td> Rua: </td>
            <td> <input type="text" name="rua"> </td>
        </tr>
        <tr>
            <td> Bairro: </td>
            <td> <input type="text" name="bairro"> </td>
        </tr>
        <tr>
            <td> Complemento:</td>
            <td> <input type="text" name="complemento"> </td>
        </tr>
        <tr>
            <td> Cep:</td>
            <td> <input type="text" name="cep"> </td>
        </tr>
        <tr>
            <td> Sexo: </td>
            <td> <input type="radio" name="sexo" value="M"> Masculino <input type="radio" name="sexo" value="F">
                Feminino </td>
        </tr>
        <tr>
            <td> Foto:</td>
            <td> <input type="file" name="foto"> </td>
        </tr>
    </table>
    <input class="btn btn-primary" value="Adicionar" type="submit">
</form>