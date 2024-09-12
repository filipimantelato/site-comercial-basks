<?php
require_once __DIR__ . '/../model/atualizarCompraModel.php';

class AtualizarCompraController {
    public function consultaCompra() {
        //verifica se o id foi enviado por metodo post
        if (isset($_POST['idCompra'])) {
            //armazena o id enviado
            $idCompra = $_POST['idCompra'];
            //cria uma instancia do modelo AtualizarCompraModel
            $atualiza = new AtualizarCompraModel();
            //chama o metodo buscarCompra do model
            $result = $atualiza->buscarCompra($idCompra);

            //caso seja encontrado algo na busca
            if ($result->num_rows > 0) {
                //armazena na variavel compra
                $compra = $result->fetch_assoc();
                //inicia a sessao
                session_start();
                //armazena os dados da compra na sessao
                $_SESSION['compra'] = $compra;
                //manda para a pagina de resultado
                header('Location: ../view/resultadoAtualizaCompra.php');
            } else {
                //caso de errado, manda para a pagina de erro
                header('Location: ../view/atualizarCompraErrado.php');
            }
        }
    }

    public function atualizaCompra() {
        //verifica se os dados foram enviados por metodo post
        if (isset($_POST['idCompra']) && isset($_POST['codigoP']) && isset($_POST['emailC']) && isset($_POST['dataCompra']) && isset($_POST['quantidadeComprado'])) {
            //armazena os dados nas variaveis
            $idCompra = $_POST['idCompra'];
            $codigoP = $_POST['codigoP'];
            $emailC = $_POST['emailC'];
            $dataCompra = $_POST['dataCompra'];
            $quantidadeComprado = $_POST['quantidadeComprado'];

            //cria uma instancia do AtualizarCompraModel
            $atualiza = new AtualizarCompraModel();
            //chama o metodo atualizarCompras
            $success = $atualiza->atualizarCompra($idCompra, $codigoP, $emailC, $dataCompra, $quantidadeComprado);
            //verifica se a atualizacao foi bem sucedida
            if ($success) {
                //se sim, manda para a pagina de resultado
                header('Location: ../view/atualizarCompraCerto.php');
            }
        }
    }
}

//verifica se a requisicao post e para consultar o cliente
if (isset($_POST['consulta']) && $_POST['consulta'] == 'compra') {
    $controller = new AtualizarCompraController();
    $controller->consultaCompra();

//verifica se a requisicao post e para atualizar o cliente
} elseif (isset($_POST['atualiza']) && $_POST['atualiza'] == 'compra') {
    $controller = new AtualizarCompraController();
    $controller->atualizaCompra();
}
