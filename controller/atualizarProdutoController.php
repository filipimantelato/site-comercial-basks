<?php
require_once __DIR__ . '/../model/atualizarProdutoModel.php';

class AtualizarProdutoController {
    // Método para consultar um produto
    public function consultaProduto() {
        // Verifica se o codigo foi enviado via POST
        if (isset($_POST['codigo'])) {
            // Armazena o codigo enviado via POST
            $codigo = $_POST['codigo'];
            // Cria uma instância do modelo AtualizarProdutoModel
            $atualiza = new AtualizarProdutoModel();
            // Chama o método buscarProduto do model
            $result = $atualiza->buscarProduto($codigo);

            // Verifica se a consulta retornou algum resultado
            if ($result->num_rows > 0) {
                // Se encontrou, armazena os dados do produto
                $produto = $result->fetch_assoc();
                // Inicia a sessão
                session_start();
                // Armazena os dados do cliente na sessão
                $_SESSION['produto'] = $produto;
                // Redireciona para a página de resultado
                header('Location: ../view/resultadoAtualizaProduto.php');
            } else {
                // Se não encontrou, redireciona para a página de erro
                header('Location: ../view/atualizarProdutoErrado.php');
            }
        }
    }

    public function atualizaProduto() {
        // Verifica se todos os dados necessários foram enviados via POST
        if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['codigo']) && isset($_POST['tamanho']) && isset($_POST['quantidade'])) {
            // Armazena os dados enviados via POST
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $codigo = $_POST['codigo'];
            $tamanho = $_POST['tamanho'];
            $quantidade = $_POST['quantidade'];

            // Cria uma instância do modelo AtualizarProdutoModel
            $atualiza = new AtualizarProdutoModel();
            // Chama o método verificarCodigoExistente do model
            $result = $atualiza->verificarCodigoExistente($codigo, $id);

            // Verifica se o código novo já existe no banco de dados
            if ($result->num_rows > 0) {
                // Se o código já existir, redireciona para a página de erro
                header('Location: ../view/atualizarProdutoDuplicado.php');
            } else {
                // Se o código não existir, chama o método atualizarProduto do model
                $success = $atualiza->atualizarProduto($id, $nome, $codigo, $tamanho, $quantidade);
                // Verifica se a atualização foi bem-sucedida
                if ($success) {
                    // Se sim, redireciona para a página de sucesso
                    header('Location: ../view/atualizarProdutoCerto.php');
                }
            }
        }
    }
}

// Verifica se a requisição POST é para consultar produto
if (isset($_POST['consulta']) && $_POST['consulta'] == 'produto') {
    $controller = new AtualizarProdutoController();
    $controller->consultaProduto();

// Verifica se a requisição POST é para atualizar produto
} elseif (isset($_POST['atualiza']) && $_POST['atualiza'] == 'produto') {
    $controller = new AtualizarProdutoController();
    $controller->atualizaProduto();
}
