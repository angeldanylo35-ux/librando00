# RF-007: Perfil de Usuário

## 🎯 1. Identificação

- **ID:** RF-007
- **Título:** Perfil de Usuário
- **Tipo:** Requisito Funcional
- **Prioridade:** ALTA
- **Complexidade:** 8 story points

## 📍 Localização dos Artefatos

### a) URL da Aplicação (Deploy Online)

- **Deploy:** [Inserir URL da aplicação online]
- **Plataforma:** [Informar a plataforma utilizada]
- **Acesso:** [Público ou restrito]
- **Funcionalidade:** Perfil de Usuário

### b) Link do Banco de Dados Online 

- **BD:** [Informar o banco de dados utilizado]
- **Link:** [Inserir link de acesso ao banco de dados online]
- **Acesso:** [Informar as permissões de acesso disponibilizadas ao professor]
- **Tabela principal:** [Informar o nome da tabela responsável pelos dados do perfil do usuário]

### c) Link do GitHub (Repositório) 

- **Repositório:** [https://github.com/henriqu3mart1ns/LIBRANDO](https://github.com/angeldanylo35-ux/librando00.git)
- **Branch principal:** [Informar a branch principal do projeto]
- **Estrutura:** Conforme a organização de diretórios do projeto, incluindo documentação, código-fonte e arquivos do banco de dados.

## 📋 2. Atores e Descrição

### 📝 2.1 Descrição do Requisito

O requisito funcional **RF-007 — Perfil de Usuário** tem como objetivo permitir que usuários cadastrados no Librando visualizem e editem as informações básicas de seus próprios perfis. Essa funcionalidade busca oferecer autonomia aos usuários para manter seus dados atualizados e personalizar sua identificação dentro da rede social, contribuindo para uma experiência de uso mais acessível, inclusiva e organizada.

A funcionalidade de edição do perfil disponibiliza os campos **Nome**, **Nome de Usuário (@)** e **Bio**. O campo Nome é obrigatório e permite que o usuário informe seu nome de identificação. O campo Nome de Usuário (@) também é obrigatório e representa o identificador utilizado na plataforma, devendo ser único para evitar conflitos entre contas. Já o campo Bio é opcional e permite que o usuário apresente informações adicionais sobre si mesmo. O sistema deve validar os dados antes de salvar as alterações, impedindo o envio de informações obrigatórias vazias e a utilização de nomes de usuário já existentes.

Após o envio das alterações, o sistema deverá verificar os dados informados, aplicar as regras de validação e persistir as informações válidas no banco de dados. ✅ Quando a operação for concluída com sucesso, o perfil deverá apresentar os dados atualizados. Caso alguma informação seja inválida ou ocorra uma falha durante o processamento, o sistema deverá informar o usuário de maneira clara, preservando os dados anteriormente armazenados e permitindo a correção dos campos necessários. ⚠️

### 🎯 2.2 Benefícios para o Negócio

- 👤 **Personalização da experiência:** permite que os usuários mantenham seus perfis atualizados e expressem sua identidade na plataforma.
- 🔎 **Melhoria na identificação dos usuários:** nomes de usuário únicos facilitam a distinção entre contas e reduzem ambiguidades.
- 🤝 **Maior engajamento:** perfis personalizados podem incentivar a participação e fortalecer as interações entre os membros da comunidade.
- 🛡️ **Integridade das informações:** as validações evitam o armazenamento de dados obrigatórios incompletos ou identificadores duplicados.
- ♿ **Fortalecimento da acessibilidade:** uma interface organizada, com campos claros e mensagens compreensíveis, contribui para uma experiência mais inclusiva.
- 💾 **Confiabilidade dos dados:** a persistência correta das alterações garante que as informações atualizadas permaneçam disponíveis nas consultas posteriores.

### 👥 2.3 Atores

#### 👤 1. Usuário Cadastrado

- **🎭 Papel:** visualizar e atualizar as informações do próprio perfil no Librando.
- **🔐 Permissões:** consultar e editar os dados permitidos de sua própria conta.
- **🖥️ Acesso:** página de perfil e formulário de edição.
- **🚫 Restrições:** não poderá modificar perfis de outros usuários nem excluir a própria conta por meio deste requisito.

##### 📊 Permissões CRUD — Usuário Cadastrado

| Operação | Permissão | Descrição |
|---|:---:|---|
| 🟢 **Create** | ❌ | Não se aplica. A criação da conta pertence ao RF-002 — Cadastro de Usuários. |
| 🔵 **Read** | ✅ | Pode visualizar as informações do próprio perfil. |
| 🟡 **Update** | ✅ | Pode editar o próprio Nome, Nome de Usuário (@) e Bio. |
| 🔴 **Delete** | ❌ | A exclusão da conta não faz parte do escopo deste requisito. |

#### ⚙️ 2. Sistema Librando

- **🎭 Papel:** processar as solicitações de consulta e atualização do perfil, validar as informações e garantir que as alterações sejam armazenadas corretamente.
- **🛡️ Responsabilidade:** verificar a autenticação, aplicar as regras de negócio e impedir operações não autorizadas.
- **💾 Acesso:** serviços internos da aplicação, mecanismos de validação e camada de persistência de dados.
- **🚫 Restrições:** não deverá permitir alterações que violem as permissões definidas ou as regras de integridade.

##### 📊 Permissões CRUD — Sistema Librando

| Operação | Permissão | Descrição |
|---|:---:|---|
| 🟢 **Create** | ❌ | Não se aplica à edição do perfil; a criação da conta é tratada pelo RF-002. |
| 🔵 **Read** | ✅ | Recupera os dados necessários para exibir o perfil autorizado. |
| 🟡 **Update** | ✅ | Processa e persiste as alterações válidas solicitadas pelo usuário autorizado. |
| 🔴 **Delete** | ❌ | A exclusão do perfil não faz parte deste requisito. |

### ✅ 2.5 Validações Necessárias

1. 🔐 **Autenticação obrigatória:** somente usuários autenticados poderão acessar e editar seus próprios perfis.
2. ✍️ **Nome obrigatório:** o campo não poderá estar vazio ou conter apenas espaços em branco.
3. 🏷️ **Nome de Usuário (@) obrigatório:** o identificador deverá ser informado e não poderá conter apenas espaços em branco.
4. 🔎 **Unicidade do nome de usuário:** o sistema deverá impedir que dois usuários diferentes utilizem o mesmo identificador, desconsiderando o próprio registro durante a edição.
5. 🔤 **Formato do nome de usuário:** o identificador deverá respeitar o padrão de caracteres definido para a plataforma.
6. 💬 **Bio opcional:** o campo poderá permanecer vazio sem impedir a atualização do perfil.
7. 📏 **Limite de caracteres:** os campos deverão respeitar os limites definidos na implementação e no modelo do banco de dados.
8. 🛡️ **Proteção contra alterações não autorizadas:** o sistema deverá verificar se o perfil pertence ao usuário autenticado, impedindo a edição de perfis de terceiros sem autorização.
9. 💾 **Persistência dos dados:** as alterações somente deverão ser consideradas concluídas após a confirmação de que foram armazenadas corretamente.
10. ⚠️ **Tratamento de erros:** em caso de dados inválidos, identificador duplicado ou falha na persistência, o sistema deverá apresentar uma mensagem clara e permitir uma nova tentativa.
11. 🔒 **Proteção dos dados:** a atualização do perfil não deverá alterar indevidamente informações internas ou sensíveis da conta que não pertençam ao escopo deste requisito.
12. ♿ **Acessibilidade da interface:** os campos, mensagens de erro e confirmações deverão ser apresentados de maneira clara e compreensível, considerando as necessidades dos usuários do Librando.
