<?php
    require_once __DIR__ . '/../model/cadastrarClienteModel.php';


    class CadastrarClienteController {
        public function cadastraCliente() {
            // Verifica se os campos 'nome', 'email', 'cpf', e 'cep' foram enviados via POST
            if (isset($_POST['nome'], $_POST['email'], $_POST['cpf'], $_POST['cep'])) {
                // Armazena os dados enviados via POST
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $cpf = $_POST['cpf'];
                $cep = $_POST['cep'];

                // Cria uma instância da classe CadastroClientes
                $cliente = new CadastroClientes();
                //utiliza o metodo para verificar cpf
                $resultCpf = $cliente->verificaCpf($cpf);
                //utiliza o metodo para verificar email
                $resultEmail = $cliente->verificaEmail($email);

                // Verifica se o CPF já está cadastrado
                if ($resultCpf->num_rows) {
                    // Se sim, define uma mensagem de erro
                    $mensagem = "ERRO: CPF JÁ ESTÁ CADASTRADO.";
                } else if($resultEmail->num_rows) {
                    // Verifica se o email já está cadastrado e define uma mensagem de erro
                    $mensagem = "ERRO: E-MAIL JÁ ESTÁ CADASTRADO.";
                }
                else{
                    // Se CPF e email não estão cadastrados, cadastra o cliente
                    $cliente->cadastraCliente($nome, $email, $cpf, $cep);
                    // Define uma mensagem de sucesso
                    $mensagem = "CLIENTE CADASTRADO COM SUCESSO.";
                }

                //armazena a mensagem na sessao
                $_SESSION['mensagem'] = $mensagem;
                header('Location: ../view/resultadoCadastroCliente.php');

            } else {
                $mensagem = "DADOS INCOMPLETOS.";
            }
        }
    }

    session_start();
    $controller = new CadastrarClienteController();
    $controller->cadastraCliente();