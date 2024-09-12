<?php
require_once __DIR__ . '/../model/consultarClienteModel.php';

class ConsultarClienteController {
    public function consultaCliente() {
        // Verifica se o campo 'emailC' foi enviado via POST
        if (isset($_POST['emailC'])) {
            // Armazena o email fornecido via POST
            $emailC = $_POST['emailC'];
            // Cria uma instância da classe ConsultarClienteModel
            $consulta = new ConsultarClienteModel();
             // Chama o método consultarCliente do modelo, passando o email como parâmetro
            $result = $consulta->consultarCliente($emailC);

            // Inicia a sessão e armazena o resultado da consulta na variável de sessão 'result'
            session_start();
            $_SESSION['result'] = $result->fetch_assoc();
            header('Location: ../view/resultadoConsultaCliente.php');
        }
    }
}

// Verifica se a requisição POST contém o campo 'consulta' com valor 'cliente'
if (isset($_POST['consulta']) && $_POST['consulta'] == 'cliente') {
    $controller = new ConsultarClienteController();
    $controller->consultaCliente();
}
