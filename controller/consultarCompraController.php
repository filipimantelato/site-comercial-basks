<?php
require_once __DIR__ . '/../model/consultarCompraModel.php';

class ConsultarComprasController {
    public function consultaCompras() {
        // Verifica se os campos 'email' ou 'data' foram enviados via POST
        if (isset($_POST['email']) || isset($_POST['data'])){
            // Armazena os dados enviados via POST, se não estiverem presentes define como string vazia
            $email = $_POST['email'] ?? '';
            $data = $_POST['data'] ?? '';

            // Cria uma instância da classe ConsultarComprasModel
            $consulta = new ConsultarComprasModel();

             // Se ambos email e data foram fornecidos, chama o método consultarComprasEmailData
            if (!empty($email) && !empty($data)) {
                $result = $consulta->consultarComprasEmailData($email, $data);
            } elseif (!empty($email)) {
                // Se apenas o email foi fornecido, chama o método consultarComprasEmail
                $result = $consulta->consultarComprasEmail($email);
            } elseif (!empty($data)) {
                // Se apenas a data foi fornecida, chama o método consultarComprasData
                $result = $consulta->consultarComprasData($data);
            } else {
                // Se nenhum parâmetro foi especificado, redirecione de volta para a página de consulta
                header('Location: ../view/consultarCompraView.php');
                exit(); // Encerra a execução do script
            }
            
        // Inicia a sessão e armazena o resultado na sessão
        session_start();
        $_SESSION['result'] = $result;
        header('Location: ../view/resultadoConsultaCompra.php');
        }
    }
}

// Verifica se a requisição POST contém o campo 'consulta' com valor 'compra'
if (isset($_POST['consulta']) && $_POST['consulta'] == 'compra') {
    $controller = new ConsultarComprasController();
    $controller->consultaCompras();
}
