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

    <div class="corpoCadastroProdutos corpoConsultaProdutos">
        <h1>Consulta de Clientes</h1>
        <form action="../controller/consultarClienteController.php" class="form-cadastro-produtos" method="post">
            <label for="emailC">E-mail do Cliente: </label>
            <input type="text" name="emailC" size="30" class="email" placeholder="exemplo@gmail.com" required>
            <input type="hidden" name="consulta" value="cliente">
            <input type="submit" value="Consultar" class="botao"><br><br><br>
        </form>

        <?php
            require_once '../model/consultarClienteModel.php';
            $consulta = new ConsultarClienteModel();
            $result = $consulta->consultarTodosClientes();
            
            if ($result->num_rows > 0) {
                echo '<table class="table">';
                echo '<thead style="background-color: #FF7F50">
                <tr><th>E-mail</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>CEP</th>
                </tr></thead>';
                echo '<tbody>';
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row['email']."</td>
                    <td>".$row['nome']."</td>
                    <td>".$row['cpf']."</td>
                    <td>".$row['cep']."</td>
                    </tr>";
                }
                echo '</tbody>
                </table>';
            } else {
                echo '<p>Nenhum cliente encontrado.</p>';
            }

        ?>
    </div>

    <!-- JavaScript para o funcionamento da responsividade do boostrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>