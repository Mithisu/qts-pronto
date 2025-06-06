Documentação do Projeto – gestão de exercícios  

1. Visão Geral 

Este projeto tem como objetivo criar um sistema web para controle e visualização de exercícios de academia. A aplicação permitirá gerenciar os exercícios disponíveis para serem realizados, incluindo a adição, e exclusão de exercícios por meio de um usuário(administrador), e a visualização do por meio de um usuário(cliente ou administrador). Os exercicios serão categorizados por grupo muscular, facilitando a gestão e a organização dos exercícios. 

Objetivos Principais: 

Permitir o cadastro de exercicios com informações de gtupo muscular e repetições. 

Exibir os exercicios cadastrados, possibilitando a visualização e filtragem. 

Oferecer a funcionalidade de excluir exercicios do estoque. 

Oferecer a possibilidade de editar as informações de exercicios já cadastrados. 

2. Funcionalidades 

2.1 Adicionar Exercícios  

A funcionalidade permite ao usuário(administrador) cadastrar um novo exercício no sistema e sua quantidade. Para isso, o usuário deve preencher os seguintes campos: 

Marca: Nome da marca do exercício. 

Descrição à qual Grupo muscular ele pertence. 

2.2 Visualizar Estoque 

O sistema deve exibir todos os exercícios cadastrados, com as seguintes informações visíveis: 

Nome do exercício. 

Descrição à qual Grupo muscular ele pertence. 

Além disso, o usuário(cliente ou administrador) deve poder visualizar uma lista completa ou filtrar os exercícios por marca, coleção cor ou palavra chave específica. 

2.3 Excluir Exercicio 

O usuário(administrador) pode excluir exercícios do sistema. Após a exclusão, o exercício será removido permanentemente do banco de dados e não aparecerá mais na visualização de estoque. 

2.4 Editar exercício  

A funcionalidade de edição permite ao usuário(administrador) alterar as informações de um exercício já cadastrado e sua quantidade. O administrador poderá atualizar qualquer uma das seguintes informações: 

Nome 

Descrição  

2.5 Filtragem 

O sistema permitirá que os usuários filtrem os exercícios cadastrados por: 

Nome 

3. Estrutura do Banco de Dados 

Coleção de exercícios  

Cada exercício será registrado com as seguintes informações: 

ID (Identificador único): Identificador único gerado automaticamente. 

Nome de exercícios: Nome do exercício. 

    •Descrição: Descrição do exercício. 

 

 

Autenticação de Usuário 

Cada usuário será registrado com as seguintes informações: 

ID (Identificador único): Identificador único gerado automaticamente. 

Tipo_de_usuário: Usuário administrador ou cliente. 

Email: Email que o usuário vai usar. 

Senha: Senha que o usuário vai usar. 

 

4. Requisitos Técnicos 

Frontend: Interface web responsiva e validado, desenvolvida com HTML, CSS e JavaScript. 

Backend: Desenvolvida em PHP version 8.2.0. 

Banco de Dados: MySql para armazenar informações dos exercícios. 

5. Arquitetura do Sistema 

5.1 Frontend 

O frontend será responsável pela interação dos usuários com o sistema. A interface permitirá: 

Cadastrar novos exercícios. 

Editar e excluir exercícios. 

Exibir a lista de exercícios cadastrados. 

Filtrar exercícios por categorias. 

5.2 Backend 

O backend gerenciará a lógica de negócios e a persistência de dados: 

O PHP para comunicação entre o frontend e o banco de dados. 

Conexão com o MySql para armazenar, atualizar, excluir e consultar os dados dos exercícios. 

5.3 Banco de Dados 

O banco de dados MySql armazenará as informações dos exercícios e dos usuários, logins precisos, e consultas rápidas e eficientes. As coleções de dados estarão estruturadas para armazenar as informações de cada usuário e esmaltes de forma organizada e separada. 

6. Fluxo de Uso 

6.1 Cadastro de Usuários 

O usuário precisará fornecer informações de email e senha, e selecionar o seu tipo de usuário, sendo administrador e cliente para concluir seu cadastro. 

6.1 Login de Usuários 

O usuário precisará inserir suas informações de e-mail e senha já cadastrados, e selecionar o seu tipo de usuário, sendo administrador ou cliente para efetuar seu login corretamente. 

 

6.3 Cadastro de exercícios  

O administrador acessa a caixa de cadastro e insere as informações do exercício. Após a confirmação do cadastro, o exercício é adicionado ao banco de dados e aparece na lista de estoque. 

6.4 Visualização de Estoque 

A página inicial mostra todos os exercícios cadastrados, com a opção de visualizá-los e buscá-los por marca, coleção ou cor. Os usuários podem buscar esmaltes específicos usando filtros ou palavras chaves. 

6.5 Edição de Exercícios  

Ao visualizar um exercício, o administrador pode editar seus detalhes e salvar as alterações. A atualização é refletida na lista de estoque de exercícios. 

6.6 Exclusão de exercícios  

O administrador pode excluir um exercicio da lista. Após a exibição de uma mensagem, e a confirmação da exclusão, o exercício é  removido do banco de dados. 

 

 

 

7. Considerações Finais 

Este sistema visa otimizar o processo de gerenciamento de exercíciosde academia, oferecendo uma interface simples e intuitiva, permitindo que os usuários controlem suas atividades de forma eficiente. Além disso, a implementação de funções como filtragem, edição e exclusão garante uma experiência de uso mais completa e prática. 

 
