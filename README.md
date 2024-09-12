# Sistema de Gerenciamento de Estoque

## Introdução
Este projeto é um sistema de gerenciamento de estoque desenvolvido com **HTML/CSS**, **PHP**, e **MySQL**. Ele oferece um site de fácil uso para cadastrar, consultar, atualizar e excluir produtos, clientes e compras. O projeto foi criado por **Filipi Mantelato** sob a orientação da professora **Carla Calixto**.

## Objetivo
O objetivo é proporcionar ao usuário uma ferramenta prática e intuitiva para gerenciar o estoque de uma loja. O sistema permite o cadastro, consulta, atualização e exclusão de dados de produtos, clientes e compras, facilitando a administração de um estabelecimento comercial.

## Tecnologias Utilizadas
- **HTML**
- **CSS**
- **PHP**
- **MySQL**

## Estrutura do Projeto
O projeto segue o padrão **MVC** (Model-View-Controller), organizado nas seguintes pastas:

- **`view/`**: contém os arquivos de visualização que o usuário interage.
- **`controller/`**: lida com o controle de entrada e saída de dados.
- **`model/`**: faz a ligação entre a interface (view) e a lógica (controller), executando as funções e métodos.
- **`images/`**: armazena as imagens usadas no site, como logotipos e gráficos.
- **`style/`**: contém os arquivos **CSS** que estilizam a página (cores, botões, etc.).
- **Arquivos `.html`**: responsáveis por ações específicas como cadastro, consulta, atualização e exclusão.

## Funcionalidades Principais

1. **Cadastro de Dados**:  
   - Produtos (nome, código, tamanho, quantidade)
   - Clientes (nome, e-mail, CPF, CEP)
   - Compras (produto, cliente, data, quantidade)

2. **Consulta de Dados**:  
   - Busca de produtos, clientes ou compras cadastradas com uma barra de pesquisa.

3. **Atualização de Dados**:  
   - Edição de produtos e clientes previamente cadastrados.

4. **Exclusão de Dados**:  
   - Exclusão de produtos, clientes e compras com confirmação.

## Fluxo de Funcionamento

1. **Navegação**: O usuário acessa a página principal, onde pode escolher cadastrar, consultar, atualizar ou deletar dados.
2. **Cadastro**: Ao escolher "Cadastrar", três opções são exibidas: **Produtos**, **Clientes**, **Compras**. O usuário preenche os formulários correspondentes para cada um.
3. **Consulta**: Na página de consulta, é possível buscar por itens específicos ou visualizar todos os dados em uma tabela.
4. **Atualização**: O usuário pode selecionar produtos ou clientes para editar inserindo um código ou e-mail correspondente.
5. **Exclusão**: O usuário busca o item a ser excluído, visualiza seus dados, e confirma a exclusão.

Todos os formulários possuem tratamento de erros, impedindo cadastro ou operações inválidas (ex: código duplicado, quantidade fora de estoque).

## Conclusão
Este projeto foi desenvolvido para simplificar o gerenciamento de estoque em uma loja, oferecendo uma interface amigável e eficiente para o lojista. Utilizando PHP e MySQL, ele cumpre os requisitos do curso e proporciona uma solução útil para o dia a dia.


