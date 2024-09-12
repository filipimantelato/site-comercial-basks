<?php       
    require_once '../view/cadastrarProdutoView.php';

    class CadastroProdutos{
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

        public function cadastraProdutos($nome, $codigo, $tamanho, $qntd) {
            //insercao de dados na tabela SQL
            $sql = "INSERT INTO produtos (nome, codigo, tamanho, quantidade) VALUES ('$nome', '$codigo', '$tamanho', '$qntd')";
            //tratamento de erros/excecoes
            if ($this->conexao->query($sql) === true) {
                echo "PRODUTO CADASTRADO";
            } else {
                echo "Erro: " . $sql . " " . $this->conexao->error;
            }
        }

        public function verifica($codigo) {
            //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
            $sql = "SELECT * FROM produtos WHERE codigo = '$codigo'";
            $result = $this->conexao->query($sql);
            //retorna o resultado da consulta
            return $result;
        }
    }
    