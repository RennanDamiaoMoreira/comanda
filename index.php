<?php
include('./conexao.php');
$sql = 'select * from produto';
$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Compiled and minified CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body class="container">
    <div class="row">
        <?php
        while ($linha = $resultado->fetch_assoc()) {
        ?>
            <div class="card col s4 ">
                <h1><?php echo ($linha['nome']); ?></h1>
                <h2>R$ <?php echo ($linha['valor']); ?></h2>
                <button onclick="select(<?php echo ($linha['id']); ?>)">eu quero</button>
                <p>id <?php echo ($linha['id']); ?></p>
            </div>

        <?php }

        ?>
    </div>




    <?php $resultado = mysqli_query($conexao, $sql); ?>

    <form action="gerarPedido.php" method="POST">
        <div class="row">

            <div>
                <select name="produtos[]" class="browser-default" required multiple id="marcacao">
                    <?php

                    while ($linha = $resultado->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $linha['id'] ?>" name="<?php echo $linha['id'] ?>"><?php echo $linha['nome'] ?></option>
                    <?php
                    }
                    ?>

                </select>

            </div>
        </div>
        <button type="submit" class="center-align">Pronto</button>
    </form>




    <script src="./script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>