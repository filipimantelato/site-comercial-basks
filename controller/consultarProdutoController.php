<?php
require_once __DIR__ . '/../model/consultarProdutoModel.php';

class ConsultarProdutoController {
    public function consultaProduto() {
        // Verifica se o campo 'codigoP' foi enviado via POST
        if (isset($_POST['codigoP'])) {
            // Armazena o código do produto fornecido via POST
            $codigoP = $_POST['codigoP'];
            // Cria uma instância da classe ConsultarProdutoModel
            $consulta = new ConsultarProdutoModel();
            // Chama o método consultarProduto do modelo, passando o código do produto como parâmetro
            $result = $consulta->consultarProduto($codigoP);

            // Inicia a sessão e armazena o resultado da consulta na variável de sessão 'result'
            session_start();
            $_SESSION['result'] = $result->fetch_assoc();
            header('Location: ../view/resultadoConsultaProduto.php');
        }
    }
}

// Verifica se a requisição POST contém o campo 'consulta' com valor 'produto'
if (isset($_POST['consulta']) && $_POST['consulta'] == 'produto') {
    $controller = new ConsultarProdutoController();
    $controller->consultaProduto();
}
