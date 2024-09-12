<?php
class ConsultarProdutoModel {
    //variavel para armazenar a conexao com o banco de dados
    private $conexao;

    public function __construct() {
        //conexao com o banco de dados usando mysqli
        $this->conexao = new mysqli('localhost', 'root', '', 'basks');
        //verificacao de erros na conexao
        if ($this->conexao->connect_error) {
            die("Conexão falhou: " . $this->conexao->connect_error);
        }
    }

    public function consultarTodosProdutos() {
        //variavel para armazenar a consulta em sql
        $sql = "SELECT * FROM produtos";
        //retorna essa variavel de consulta
        return $this->conexao->query($sql);
    }

    public function consultarProduto($codigoP) { 
        //escapa de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $codigoP = $this->conexao->real_escape_string($codigoP);
        //variavel para armazenar a consulta em sql
        $sql = "SELECT * FROM produtos WHERE codigo = '$codigoP'";
        //retorna essa variavel de consulta
        return $this->conexao->query($sql);
    }
}
