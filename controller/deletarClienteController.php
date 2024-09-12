<?php
require_once __DIR__ . '/../model/deletarClienteModel.php';

class DeletarClienteController {
    // Método para consultar um produto
    public function consultaCliente() {
        // Verifica se o codigo foi enviado via POST
        if (isset($_POST['email'])) {
            // Armazena o codigo enviado via POST
            $email = $_POST['email'];
            // Cria uma instância do modelo AtualizarProdutoModel
            $deleta = new DeletarClienteModel();
            // Chama o método buscarProduto do model
            $result = $deleta->buscarEmail($email);

            // Verifica se a consulta retornou algum resultado
            if ($result->num_rows > 0) {
                // Se encontrou, armazena os dados do produto
                $cliente = $result->fetch_assoc();
                // Inicia a sessão
                session_start();
                // Armazena os dados do cliente na sessão
                $_SESSION['cliente'] = $cliente;
                // Redireciona para a página de resultado
                header('Location: ../view/resultadoDeletaCliente.php');
            } else {
                // Se não encontrou, redireciona para a página de erro
                header('Location: ../view/deletarClienteErrado.php');
            }
        }
    }

    public function deletarEmail() {
        // Verifica se todos os dados necessários foram enviados via POST
        if (isset($_POST['email'])) {
            // Armazena os dados enviados via POST
            $email = $_POST['email'];
            // Cria uma instância do modelo AtualizarProdutoModel
            $model = new DeletarClienteModel();
            $success = $model->deletarEmail($email);
            // Verifica se a atualização foi bem-sucedida
            if ($success) {
                // Se sim, redireciona para a página de sucesso
                header('Location: ../view/deletarClienteCerto.php');
            }
            else {
                header('Location: ../view/deletarClienteErrado.php');
            }
        }
    }
}

// Verifica se a requisição POST é para consultar produto
if (isset($_POST['consulta']) && $_POST['consulta'] == 'cliente') {
    $controller = new DeletarClienteController();
    $controller->consultaCliente();

// Verifica se a requisição POST é para atualizar produto
} elseif (isset($_POST['deleta']) && $_POST['deleta'] == 'cliente') {
    $controller = new DeletarClienteController();
    $controller->deletarEmail();
}
