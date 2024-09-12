<?php
require_once __DIR__ . '/../model/deletarCompraModel.php';

class DeletarCompraController {
    // Método para consultar um produto
    public function consultaCompra() {
        // Verifica se o codigo foi enviado via POST
        if (isset($_POST['idCompra'])) {
            // Armazena o codigo enviado via POST
            $idCompra = $_POST['idCompra'];
            // Cria uma instância do modelo AtualizarProdutoModel
            $deleta = new DeletarCompraModel();
            // Chama o método buscarProduto do model
            $result = $deleta->buscarCompra($idCompra);

            // Verifica se a consulta retornou algum resultado
            if ($result->num_rows > 0) {
                // Se encontrou, armazena os dados do produto
                $compra = $result->fetch_assoc();
                // Inicia a sessão
                session_start();
                // Armazena os dados do cliente na sessão
                $_SESSION['compra'] = $compra;
                // Redireciona para a página de resultado
                header('Location: ../view/resultadoDeletaCompra.php');
            } else {
                // Se não encontrou, redireciona para a página de erro
                header('Location: ../view/deletarCompraErrado.php');
            }
        }
    }

    public function deletarCompra() {
        // Verifica se todos os dados necessários foram enviados via POST
        if (isset($_POST['idCompra'])) {
            // Armazena os dados enviados via POST
            $idCompra = $_POST['idCompra'];
            // Cria uma instância do modelo AtualizarProdutoModel
            $model = new DeletarCompraModel();
            $success = $model->deletarCompra($idCompra);
            // Verifica se a atualização foi bem-sucedida
            if ($success) {
                // Se sim, redireciona para a página de sucesso
                header('Location: ../view/deletarCompraCerto.php');
            }
            else {
                header('Location: ../view/deletarCompraErrado.php');
            }
        }
    }
}

// Verifica se a requisição POST é para consultar produto
if (isset($_POST['consulta']) && $_POST['consulta'] == 'compra') {
    $controller = new DeletarCompraController();
    $controller->consultaCompra();

// Verifica se a requisição POST é para atualizar produto
} elseif (isset($_POST['deleta']) && $_POST['deleta'] == 'compra') {
    $controller = new DeletarCompraController();
    $controller->deletarCompra();
}
