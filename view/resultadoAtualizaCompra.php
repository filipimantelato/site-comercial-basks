<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basks Store</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="../images/logofav.png" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF7F50; border: 3px solid #E9967A; border-radius: 0 0 5px 5px; font-size: 18px; font-weight: bold">
        <a class="navbar-brand" href="#">
            <img src="../images/logo.png" width="50" height="50" alt="">
        </a>
        <a class="navbar-brand" style="color: rgb(248, 222, 199);" href="index.html">BasksStore</a>
        <button class="navbar-toggler" style="color: rgb(248, 222, 199);"  type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon" style="color: rgb(248, 222, 199);"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" style="margin-left: -200px" id="navbarNavAltMarkup" >
            <div class="navbar-nav" >
                <a class="nav-item nav-link active" style="color: rgb(248, 222, 199);" href="../index.html">Home</a>
                <a class="nav-item nav-link" style="color: rgb(248, 222, 199);" href="../cadastrar.html">Cadastrar</a>
                <a class="nav-item nav-link" style="color: rgb(248, 222, 199);" href="../consultar.html">Consultar</a>
                <a class="nav-item nav-link" style="color: rgb(248, 222, 199);" href="../atualizar.html">Atualizar</a>
                <a class="nav-item nav-link" style="color: rgb(248, 222, 199);" href="../deletar.html">Deletar</a>
            </div>
        </div>
    </nav>

    <div class="corpoCadastroProdutos">
        <h1>Atualização de Compra</h1>
        <?php
            session_start();
            if (isset($_SESSION['compra'])) {
                $compra = $_SESSION['compra'];
            }
        ?>
        <a href="../atualizar.html"><button class="botao"> < Voltar </button></a>

        <form action="../controller/atualizarCompraController.php" method="post">
            <br><br><label for="idCompra">Id da Compra: </label>
            <input type="number" name="idCompra" size="30" class="idCompra" value="<?php echo $compra['idCompra']; ?>" required><br><br>
            <label for="codigoP">Código do Produto: </label>
            <input type="text" name="codigoP" size="30" class="codigoP" value="<?php echo $compra['codigoP']; ?>" required><br><br>
            <label for="emailC">E-mail do Cliente: </label>
            <input type="text" name="emailC" size="30" class="emailC" value="<?php echo $compra['emailC']; ?>" required><br><br>
            <label for="dataCompra">Data da Compra: </label>
            <input type="date" name="dataCompra" class="dataCompra" value="<?php echo $compra['dataCompra']; ?>" required><br><br>
            <label for="quantidadeComprado">Quantidade Comprada: </label>
            <input type="number" name="quantidadeComprado" class="quantidadeComprado" value="<?php echo $compra['quantidadeComprado']; ?>" required><br><br><br>
            <input type="hidden" name="atualiza" value="compra">
            <input type="submit" value=" Atualizar " class="botao">
        </form>
    </div>

    <!-- JavaScript para o funcionamento da responsividade do boostrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>