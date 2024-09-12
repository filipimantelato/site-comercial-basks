<!-- model/atualizarProdutoModel.php -->
<?php
class DeletarCompraModel {
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

    public function buscarCompra($idCompra) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $idCompra = $this->conexao->real_escape_string($idCompra);
        //consulta SQL
        $sql = "SELECT * FROM compras WHERE idCompra = '$idCompra'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }

    public function deletarCompra($idCompra) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $idCompra = $this->conexao->real_escape_string($idCompra);
        //consulta SQL
        $sql = "DELETE FROM compras WHERE idCompra = '$idCompra'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }
}
?>
