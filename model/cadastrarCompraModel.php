<?php       
    require_once '../view/cadastrarCompraView.php';

    class CadastroCompras{
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

        public function cadastraCompra($codigoP, $emailC, $data, $qntd) {
            //insercao de dados na tabela SQL
            $sql = "INSERT INTO compras (codigoP, emailC, dataCompra, quantidadeComprado) VALUES ('$codigoP', '$emailC', '$data', '$qntd')";
            //tratamento de erros/excecoes
            if ($this->conexao->query($sql) === true) {
                //caso a compra seja bem sucedida ira atualizar a quantidade em estoque
                $sqlEstoque = "UPDATE produtos SET quantidade = quantidade - $qntd WHERE codigo = '$codigoP'";

                if($this->conexao->query($sqlEstoque) === true){
                    $mensagem = "COMPRA CADASTRADA";
                }
                else {
                    $mensagem = "ERRO AO ATUALIZAR O ESTOQUE." . $this->conexao->error;
                }
            } else {
                $mensagem = "ERRO AO CADASTRAR A COMPRA: " . $sql . " " . $this->conexao->error;
            }
        }

        //funcao para verificar se existe a quantidade do produto no bd
        public function verificaQntd($codigoP) {
            //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
            $sql = "SELECT quantidade FROM produtos WHERE codigo = '$codigoP'";
            $result = $this->conexao->query($sql);
            //retorna o resultado da consulta
            return $result;
        }

        //funcao para verificar se existe um produto no bd
        public function verificaProduto($codigoP) {
            //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
            $sql = "SELECT * FROM produtos WHERE codigo = '$codigoP'";
            $result = $this->conexao->query($sql);
            //retorna o resultado da consulta
            return $result;
        }

        //funcao para verificar se existe um email no bd
        public function verificaEmail($emailC) {
            //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
            $sql = "SELECT * FROM clientes WHERE email = '$emailC'";
            $result = $this->conexao->query($sql);
            //retorna o resultado da consulta
            return $result;
        }
    }
    