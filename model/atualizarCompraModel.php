<!-- model/atualizarProdutoModel.php -->
<?php
class AtualizarCompraModel {
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

    public function atualizarCompra($idCompra, $codigoP, $emailC, $dataCompra, $quantidadeComprado) {
        //variavel para armazenar a consulta em SQL, usando o metodo para escapar de caracteres especiais que possam manipular a consulta SQL, '' "" \.
        $idCompra = $this->conexao->real_escape_string($idCompra);
        $codigoP = $this->conexao->real_escape_string($codigoP);
        $emailC = $this->conexao->real_escape_string($emailC);
        $dataCompra = $this->conexao->real_escape_string($dataCompra);
        $quantidadeComprado = $this->conexao->real_escape_string($quantidadeComprado);
        //consulta SQL
        $sql = "UPDATE compras SET codigoP='$codigoP', emailC='$emailC', dataCompra='$dataCompra', quantidadeComprado='$quantidadeComprado' WHERE idCompra='$idCompra'";
        //retorna o resultado da consultaSQL
        return $this->conexao->query($sql);
    }
}
?>
