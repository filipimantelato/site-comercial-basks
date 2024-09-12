<!-- model/atualizarProdutoModel.php -->
<?php
class DeletarProdutoModel {
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

    public function buscarProduto($codigo) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $codigo = $this->conexao->real_escape_string($codigo);
        //consulta SQL
        $sql = "SELECT * FROM produtos WHERE codigo = '$codigo'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }

    public function deletarProduto($codigo) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $codigo = $this->conexao->real_escape_string($codigo);
        $sql_update_compras = "UPDATE compras SET codigoP = NULL WHERE codigoP = '$codigo'";
        $this->conexao->query($sql_update_compras);
        //consulta SQL
        $sql = "DELETE FROM produtos WHERE codigo = '$codigo'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }

    public function atualizarEstoqueProduto($codigo, $quantidade) {
        $codigo = $this->conexao->real_escape_string($codigo);
        $quantidade = $this->conexao->real_escape_string($quantidade);
        $sql = "UPDATE produtos SET quantidade = '$quantidade' WHERE codigo = '$codigo'";
        return $this->conexao->query($sql);
    }
}
?>
