<?php
    require_once __DIR__ . '/../model/cadastrarProdutoModel.php';


    class CadastrarProdutoController {
        public function cadastraProduto() {
            // Verifica se os campos 'nome', 'codigo', 'tamanho', e 'qntd' foram enviados via POST
            if (isset($_POST['nome'], $_POST['codigo'], $_POST['tamanho'], $_POST['qntd'])) {
                // Armazena os dados enviados via POST
                $nome = $_POST['nome'];
                $codigo = $_POST['codigo'];
                $tamanho = $_POST['tamanho'];
                $qntd = $_POST['qntd'];

                // Cria uma instância da classe CadastroProdutos
                $produto = new CadastroProdutos();
                // Verifica se o produto já existe em estoque pelo código
                $result = $produto->verifica($codigo);

                // Se o produto já existe em estoque, define uma mensagem de erro
                if ($result->num_rows > 0) {
                    $mensagem = "O PRODUTO JÁ EXISTE EM ESTOQUE.";
                } else {
                    // Se o produto não existe, cadastra o produto
                    $produto->cadastraProdutos($nome, $codigo, $tamanho, $qntd);
                    $mensagem = "PRODUTO CADASTRADO COM SUCESSO.";
                }

                $_SESSION['mensagem'] = $mensagem;
                // Redireciona para a página de resultado do cadastro
                header('Location: ../view/resultadoCadastroProduto.php');

            } else {
                // Define uma mensagem de erro se os dados estão incompletos
                $mensagem = "DADOS INCOMPLETOS.";
            }
        }
    }

    session_start();
    $controller = new CadastrarProdutoController();
    $controller->cadastraProduto();