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
        <h1>Exclusão de Compras</h1>
        <?php
            session_start();
            if (isset($_SESSION['compra'])) {
                $compra = $_SESSION['compra'];
            }
        ?>
        <form action="../controller/deletarCompraController.php" method="post">
            <table class="table table-hover">
                <tr>
                    <th>Id da Compra</th>
                    <td><input type="number" size="50" name="idCompra" placeholder="ID" value="<?php echo $compra['idCompra']; ?>" readonly /></td>
                </tr>
                <tr>
                    <th>Código do Produto</th>
                    <td><input type="text" name="codigoP" placeholder="Código do Produto" value="<?php echo $compra['codigoP']; ?>" readonly /></td>
                </tr>
                <tr>
                    <th>E-mail do Cliente</th>
                    <td><input type="text" name="emailC" placeholder="Email do Cliente" value="<?php echo $compra['emailC']; ?>" readonly /></td>
                </tr>
                <tr>
                    <th>Data da Compra</th>
                    <td><input type="date" name="dataCompra" placeholder="Data da Compra" value="<?php echo $compra['dataCompra']; ?>" readonly /></td>
                </tr>
                <tr>
                    <th>Quantidade Comprada</th>
                    <td><input type="number" name="quantidadeComprado" placeholder="Quantidade Comprada" value="<?php echo $compra['quantidadeComprado']; ?>" readonly /></td>
                </tr>
                <input type="hidden" name="deleta" value="compra">
            </table>
                <br><br><h2>Tem certeza que deseja excluir os dados?</h2>
                <input type="submit" value="Excluir" class="botao">
                <a href="../index.html"><input type='button' value='Página Inicial' class='botao'></a>
        </form>
    </div>

    <!-- JavaScript para o funcionamento da responsividade do boostrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>