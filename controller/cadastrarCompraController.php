<?php
require_once __DIR__ . '/../model/cadastrarCompraModel.php';

class CadastrarCompraController {
    public function cadastraCompra() {
        // Verifica se os campos 'codigoP', 'emailC', 'data', e 'qntd' foram enviados via POST
        if (isset($_POST['codigoP'], $_POST['emailC'], $_POST['data'], $_POST['qntd'])) {
            // Armazena os dados enviados via POST
            $codigoP = $_POST['codigoP'];
            $emailC = $_POST['emailC'];
            $data = $_POST['data'];
            $qntd = $_POST['qntd'];

            // Cria uma instância da classe CadastroCompras
            $compra = new CadastroCompras();
            // Verifica a quantidade disponível do produto
            $resultQntd = $compra->verificaQntd($codigoP);
            // Verifica se o produto está cadastrado
            $resultProduto = $compra->verificaProduto($codigoP);
            // Verifica se o email do cliente está cadastrado
            $resultCliente = $compra->verificaEmail($emailC);

            // Verifica se o produto existe
            if ($resultProduto && $resultProduto->num_rows > 0) {
                // Verifica se o cliente existe
                if ($resultCliente && $resultCliente->num_rows > 0) {
                    // Obtem a quantidade do produto em estoque
                    $rowQntd = $resultQntd->fetch_assoc();
                    $quantidadeEmEstoque = $rowQntd['quantidade'];
                    // Verifica se a quantidade solicitada está disponível em estoque
                    if ($quantidadeEmEstoque >= $qntd) {
                        // Cadastra a compra se a quantidade está disponível
                        $compra->cadastraCompra($codigoP, $emailC, $data, $qntd);
                        $mensagem = "COMPRA CADASTRADA";
                    } else {
                        // Define mensagem de erro se a quantidade solicitada não está disponível
                        $mensagem = "QUANTIDADE SOLICITADA NÃO DISPONÍVEL EM ESTOQUE.";
                    }
                } else {
                    // Define mensagem de erro se o cliente não está cadastrado
                    $mensagem = "CLIENTE NÃO CADASTRADO.";
                }
            } else {
                // Define mensagem de erro se o produto não está cadastrado
                $mensagem = "PRODUTO NÃO CADASTRADO.";
            }

            $_SESSION['mensagem'] = $mensagem;
            header('Location: ../view/resultadoCadastroCompra.php');
        } else {
            $mensagem = "DADOS INCOMPLETOS.";
            $_SESSION['mensagem'] = $mensagem;
            header('Location: ../view/resultadoCadastroCompra.php');
        }
    }
}

session_start();
$controller = new CadastrarCompraController();
$controller->cadastraCompra();
