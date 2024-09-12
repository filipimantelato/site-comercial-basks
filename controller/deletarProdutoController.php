<?php
require_once __DIR__ . '/../model/deletarProdutoModel.php';

class DeletarProdutoController {
    // Método para consultar um produto
    public function consultaProduto() {
        // Verifica se o codigo foi enviado via POST
        if (isset($_POST['codigo'])) {
            // Armazena o codigo enviado via POST
            $codigo = $_POST['codigo'];
            // Cria uma instância do modelo AtualizarProdutoModel
            $deleta = new DeletarProdutoModel();
            // Chama o método buscarProduto do model
            $result = $deleta->buscarProduto($codigo);

            // Verifica se a consulta retornou algum resultado
            if ($result->num_rows > 0) {
                // Se encontrou, armazena os dados do produto
                $produto = $result->fetch_assoc();
                // Inicia a sessão
                session_start();
                // Armazena os dados do cliente na sessão
                $_SESSION['produto'] = $produto;
                // Redireciona para a página de resultado
                header('Location: ../view/resultadoDeletaProduto.php');
            } else {
                // Se não encontrou, redireciona para a página de erro
                header('Location: ../view/deletarProdutoErrado.php');
            }
        }
    }

    public function deletarProduto() {
        // Verifica se todos os dados necessários foram enviados via POST
        if (isset($_POST['codigo'])) {
            // Armazena os dados enviados via POST
            $codigo = $_POST['codigo'];
            // Cria uma instância do modelo AtualizarProdutoModel
            $model = new DeletarProdutoModel();
            $success = $model->deletarProduto($codigo);
            // Verifica se a atualização foi bem-sucedida
            if ($success) {
                // Se sim, redireciona para a página de sucesso
                header('Location: ../view/deletarProdutoCerto.php');
            }
            else {
                header('Location: ../view/deletarProdutoErrado.php');
            }
        }
    }
}

// Verifica se a requisição POST é para consultar produto
if (isset($_POST['consulta']) && $_POST['consulta'] == 'produto') {
    $controller = new DeletarProdutoController();
    $controller->consultaProduto();

// Verifica se a requisição POST é para atualizar produto
} elseif (isset($_POST['deleta']) && $_POST['deleta'] == 'produto') {
    $controller = new DeletarProdutoController();
    $controller->deletarProduto();
}
