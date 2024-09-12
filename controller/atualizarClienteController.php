<?php
//inclui o arquivo atualizarClienteModel
require_once __DIR__ . '/../model/atualizarClienteModel.php';

class AtualizarClienteController {
    //metodo de consultar cliente
    public function consultaCliente() {
        //verifica se um email foi enviado pelo metodo post
        if (isset($_POST['email'])) {
            //variavel de armazenamento de email por metodo post
            $email = $_POST['email'];
            //cria uma instancia do modelo AtualizarClienteModel
            $atualiza = new AtualizarClienteModel();
            //chama o metodo buscarCliente do model
            $result = $atualiza->buscarCliente($email);

            //verifica se a consulta encontrou algum resultado
            if ($result->num_rows > 0) {
                //caso tenha encontrado, armazena os dados do cliente
                $cliente = $result->fetch_assoc();
                //inicia uma sessao
                session_start();
                //armazena os dados do cliente na sessao
                $_SESSION['cliente'] = $cliente;
                //envia para a pagina de resultado
                header('Location: ../view/resultadoAtualizaCliente.php');
            } else {
                //caso nao tenha encontrado, envia para a pagina de erro
                header('Location: ../view/atualizarClienteErrado.php');
            }
        }
    }

    public function atualizaCliente() {
        //verifica se todos os dados foram enviados por metodo post
        if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cpf']) && isset($_POST['cep'])) {
            //armazena os dados enviados pelo metodo post
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $cep = $_POST['cep'];

            //cria uma instancia do metodo AtualizarClienteModel
            $atualiza = new AtualizarClienteModel();
            //metodo para verificarClienteExistente
            $resultE = $atualiza->verificarClienteExistente($email, $id);
            $resultC = $atualiza->verificarClienteExistenteC($cpf, $id);

            if ($resultE->num_rows > 0){
                // Se o código já existir, redireciona para a página de erro
                header('Location: ../view/atualizarClienteDuplicadoE.php');
            } elseif ($resultC->num_rows > 0){
                // Se o código já existir, redireciona para a página de erro
                header('Location: ../view/atualizarClienteDuplicadoC.php');
            } else {
                //Chama o metodo atualizarCliente do model
                $success = $atualiza->atualizarCliente($id, $nome, $email, $cpf, $cep);
                //Verifica se a atualizacao foi bem sucedida
                if ($success) {
                    // Se sim, redireciona para a página de sucesso
                    header('Location: ../view/atualizarClienteCerto.php');
                }
            }         
        }
    }
}

//verifica se a requisicao post e para consultar o cliente
if (isset($_POST['consulta']) && $_POST['consulta'] == 'cliente') {
    $controller = new AtualizarClienteController();
    $controller->consultaCliente();

//verifica se a requisicao post e para atualizar o cliente
} elseif (isset($_POST['atualiza']) && $_POST['atualiza'] == 'cliente') {
    $controller = new AtualizarClienteController();
    $controller->atualizaCliente();
}
