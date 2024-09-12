<?php       
    require_once '../view/cadastrarClienteView.php';

    class CadastroClientes{
        //variavel para armazenar a conexao com o banco de dados
        private $conexao;

        //metodo construtor
        public function __construct() {
            //conexao com o banco de dados usando mysqli
            $this->conexao = new mysqli('localhost', 'root', '', 'basks');
            //verificacao de erros na conexao
            if ($this->conexao->connect_error) {
                die("Conexão falhou: " . $this->conexao->connect_error);
            }
        }

        public function cadastraCliente($nome, $email, $cpf, $cep) {
            //insercao de dados na tabela SQL
            $sql = "INSERT INTO clientes (nome, email, cpf, cep) VALUES ('$nome', '$email', '$cpf', '$cep')";
            //tratamento de erros/excecoes
            if ($this->conexao->query($sql) === true) {
                echo "CLIENTE CADASTRADO";
            } else {
                echo "Erro: " . $sql . " " . $this->conexao->error;
            }
        }

        public function verificaCpf($cpf) {
            //variavel para armazenar a consulta em SQL.
            $sql = "SELECT * FROM clientes WHERE cpf = '$cpf'";
            $result = $this->conexao->query($sql);
            //retorna o resultado da consulta
            return $result;
        }

        public function verificaEmail($email) {
            //variavel para armazenar a consulta em SQL.
            $sql = "SELECT * FROM clientes WHERE email = '$email'";
            $result = $this->conexao->query($sql);
            //retorna o resultado da consulta
            return $result;
        }
    }
    