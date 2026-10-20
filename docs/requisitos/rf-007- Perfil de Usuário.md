# RF-007: Perfil de Usuário

## 🎯 1. Identificação

- **ID:** RF-007
- **Título:** Perfil de Usuário
- **Tipo:** Requisito Funcional
- **Prioridade:** ALTA
- **Complexidade:** 8 story points

## 📍 Localização dos Artefatos

### a) URL da Aplicação (Deploy Online)

- **Deploy:** https://librando-frontend.onrender.com/
- **Plataforma:** [Render](https://render.com)
- **Acesso:** [Público]
- **Funcionalidade:** Perfil de Usuário

### b) Link do Banco de Dados Online

- **SGBD:** MySQL (Aiven)
- **Interface de acesso:** phpMyAdmin
- **Link:** https://librando-phpmyadmin.onrender.com
- **Banco de dados:** `defaultdb`
- **Usuário de leitura:** `professor_leitura`
- **Senha:** `123456`
- **Permissões:** consulta dos dados e visualização da estrutura das tabelas, sem permissão para modificá-los.



### c) Link do GitHub (Repositório)

- **Repositório:** [https://github.com/angeldanylo35-ux/librando00](https://github.com/angeldanylo35-ux/librando00.git)
- **Branch principal:** [main]
- **Estrutura:**
```
librando00-main/
├── .gitignore
├── README.md
├── backend/
│   ├── .editorconfig
│   ├── .env.example
│   ├── .gitattributes
│   ├── .gitignore
│   ├── .npmrc
│   ├── AGENTS.md
│   ├── CLAUDE.md
│   ├── Dockerfile
│   ├── README.md
│   ├── artisan
│   ├── composer.json
│   ├── composer.lock
│   ├── phpunit.xml
│   ├── vite.config.js
│   ├── app/
│   │   ├── Http/
│   │   │   ├── Controllers/
│   │   │   │   ├── Controller.php
│   │   │   │   ├── Api/
│   │   │   │   │   ├── AuthController.php
│   │   │   │   │   ├── PasswordResetController.php
│   │   │   │   │   ├── PerfilController.php
│   │   │   │   │   └── PostController.php
│   │   │   │   ├── api/  *(duplicado/legado)*
│   │   │   │   └── auth/ *(legado)*
│   │   │   └── ...
│   │   ├── Mail/
│   │   │   ├── RecuperacaoSenha.php
│   │   │   └── VerificacaoCadastro.php
│   │   ├── Models/
│   │   │   ├── CadastroPendente.php
│   │   │   ├── EnqueteOpcao.php
│   │   │   ├── PasswordResetCode.php
│   │   │   ├── Post.php
│   │   │   ├── RecuperacaoSenha.php
│   │   │   ├── User.php
│   │   │   ├── Usuario.php
│   │   │   ├── VerificacaoEmail.php
│   │   │   └── enqueteopcao.php
│   │   ├── Notifications/
│   │   │   ├── PasswordChangedNotification.php
│   │   │   └── ResetCodeNotification.php
│   │   ├── Providers/
│   │   │   └── AppServiceProvider.php
│   │   └── Services/
│   │       └── ImageService.php
│   ├── bootstrap/
│   │   ├── app.php
│   │   ├── providers.php
│   │   └── cache/
│   ├── config/
│   │   ├── app.php
│   │   ├── auth.php
│   │   ├── cache.php
│   │   ├── cors.php
│   │   ├── database.php
│   │   ├── filesystems.php
│   │   ├── logging.php
│   │   ├── mail.php
│   │   ├── queue.php
│   │   ├── sanctum.php
│   │   ├── services.php
│   │   └── session.php
│   ├── database/
│   │   ├── factories/
│   │   │   └── UserFactory.php
│   │   ├── migrations/
│   │   │   ├── 0001_01_01_000000_create_users_table.php
│   │   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   │   ├── 2025_01_01_000000_create_password_reset_codes_table.php
│   │   │   ├── 2026_09_06_021505_create_usuarios_table.php
│   │   │   ├── 2026_09_06_024645_create_personal_access_tokens_table.php
│   │   │   ├── 2026_09_13_145553_create_verificacoes_email_table.php
│   │   │   ├── 2026_09_13_150557_create_cadastros_pendentes_table.php
│   │   │   ├── 2026_09_13_205428_create_recuperacao_senhas_table.php
│   │   │   ├── 2026_10_12_020211_create_posts_table.php
│   │   │   ├── 2026_10_12_020212_create_enquete_opcoes_table.php
│   │   │   ├── 2026_10_17_185642_add_perfil_to_usuarios_table.php
│   │   │   └── 2026_10_17_193725_ajusta_colunas_perfil_em_usuarios.php
│   │   ├── seeders/
│   │   │   ├── DatabaseSeeder.php
│   │   │   └── UsuarioSeeder.php
│   │   └── .gitignore
│   ├── public/
│   │   ├── .htaccess
│   │   ├── favicon.ico
│   │   ├── index.php
│   │   └── robots.txt
│   ├── resources/
│   │   ├── css/
│   │   │   └── app.css
│   │   ├── js/
│   │   │   └── app.js
│   │   ├── views/
│   │   │   ├── welcome.blade.php
│   │   │   ├── auth/
│   │   │   │   ├── forgot-password.blade.php
│   │   │   │   ├── reset-password.blade.php
│   │   │   │   └── verify-code.blade.php
│   │   │   └── emails/
│   │   │       ├── recuperacao-senha.blade.php
│   │   │       └── verificacao-cadastro.blade.php
│   ├── routes/
│   │   ├── api.php
│   │   ├── console.php
│   │   └── web.php
│   ├── storage/
│   │   ├── app/
│   │   ├── framework/
│   │   └── logs/
│   └── tests/
│   │   ├── TestCase.php
│   │   ├── Feature/
│   │   └── Unit/
├── docs/
│   ├── api/
│   │   └── swagger.json
│   └── requisitos/
│       ├── rf-001-login.md
│       ├── rf-002-cadastrar.md
│       ├── rf-003-Esqueci-minha-senha.md
│       ├── rf-004-Tela-Inicial-Usuário.md
│       ├── rf-006-Posts.md
│       └── rf-007-Perfil de Usuário.md
└── frontend/
    ├── .gitignore
    ├── README.md
    ├── index.html
    ├── package-lock.json
    ├── package.json
    ├── postcss.config.js
    ├── tailwind.config.js
    ├── vite.config.js
    ├── .vscode/
    │   └── extensions.json
    ├── public/
    │   ├── favicon.svg
    │   └── icons.svg
    └── src/
        ├── App.vue
        ├── main.js
        ├── style.css
        ├── assets/
        │   ├── estetico.css
        │   ├── hero.png
        │   ├── vite.svg
        │   └── vue.svg
        ├── components/
        │   └── HelloWorld.vue
        ├── paginas/
        │   ├── Feed.vue
        │   ├── Perfil.vue
        │   ├── cadastro.vue
        │   ├── esqueci-senha.vue
        │   ├── login.vue
        │   ├── redefinir-senha.vue
        │   └── verificar-email.vue
        ├── router/
        │   └── index.js
        └── services/
            └── api.js

```
### d) Serviço Externo de Hospedagem de Imagens

- **Serviço:** ImgBB
- **Documentação da API:** [https://api.imgbb.com/](https://api.imgbb.com/)
- **Funcionalidade:** Hospedagem das imagens de perfil e de capa dos usuários.

## 📋 2. Atores e Descrição

### 📝 2.1 Descrição do Requisito

O requisito funcional **RF-007 — Perfil de Usuário** tem como objetivo permitir que usuários cadastrados no Librando visualizem e editem as informações básicas de seus próprios perfis. Essa funcionalidade busca oferecer autonomia aos usuários para manter seus dados atualizados e personalizar sua identificação dentro da rede social, contribuindo para uma experiência de uso mais acessível, inclusiva e organizada.

A funcionalidade de edição do perfil disponibiliza os campos **Nome**, **Nome de Usuário (@)**, **Localização** **Bio**, **Foto de Perfil** e **Foto de Capa**. O campo Nome é obrigatório e permite que o usuário informe seu nome de identificação. O campo Nome de Usuário (@) também é obrigatório e representa o identificador utilizado na plataforma, devendo ser único para evitar conflitos entre contas. Já o campo Bio é opcional e permite que o usuário apresente informações adicionais sobre si mesmo. O sistema deve validar os dados antes de salvar as alterações, impedindo o envio de informações obrigatórias vazias e a utilização de nomes de usuário já existentes.

Além das informações do perfil, o usuário deverá poder visualizar suas próprias publicações em uma seção específica do perfil. Em cada publicação de sua autoria, deverão ser disponibilizadas as opções de edição e exclusão, quando aplicáveis. Essas opções deverão utilizar as funcionalidades e regras estabelecidas no **RF-006 — Criação e Publicação de Postagens**, sem duplicar a implementação dessas operações no RF-007.

O perfil também deverá apresentar uma seção destinada à visualização das publicações repostadas pelo usuário. Essa seção permitirá consultar conteúdos originalmente publicados por outros usuários. A visualização ou o repost de uma publicação não concede permissão para editar ou excluir o conteúdo original de terceiros. Quando disponível, a opção de desfazer repost deverá remover somente o repost realizado pelo usuário, preservando a publicação original.

Após o envio das alterações do perfil, o sistema deverá verificar os dados informados, aplicar as regras de validação e persistir as informações válidas no banco de dados. ✅ Quando a operação for concluída com sucesso, o perfil deverá apresentar os dados atualizados. Caso alguma informação seja inválida ou ocorra uma falha durante o processamento, o sistema deverá informar o usuário de maneira clara, preservando os dados anteriormente armazenados e permitindo a correção dos campos necessários. ⚠️ As seções de publicações próprias e repostadas também deverão refletir as alterações realizadas com sucesso nas respectivas funcionalidades.

### 🎯 2.2 Benefícios para o Negócio

- 👤 **Personalização da experiência:** permite que os usuários mantenham seus perfis atualizados e expressem sua identidade na plataforma.
- 🔎 **Melhoria na identificação dos usuários:** nomes de usuário únicos facilitam a distinção entre contas e reduzem ambiguidades.
- 🤝 **Maior engajamento:** perfis personalizados podem incentivar a participação e fortalecer as interações entre os membros da comunidade.
- 🛡️ **Integridade das informações:** as validações evitam o armazenamento de dados obrigatórios incompletos ou identificadores duplicados.
- ♿ **Fortalecimento da acessibilidade:** uma interface organizada, com campos claros e mensagens compreensíveis, contribui para uma experiência mais inclusiva.
- 💾 **Confiabilidade dos dados:** a persistência correta das alterações garante que as informações atualizadas permaneçam disponíveis nas consultas posteriores.
- 📝 **Organização das publicações:** permite que o usuário consulte as próprias publicações diretamente no perfil e acesse as opções de gerenciamento correspondentes.
- 🔁 **Consulta de publicações repostadas:** facilita o acesso aos conteúdos de outros usuários que foram repostados.
- 🔐 **Proteção das publicações:** garante que as opções de edição e exclusão sejam utilizadas conforme a autoria e as permissões estabelecidas no RF-006.

### 👥 2.3 Atores

#### 👤 1. Usuário Cadastrado

- **🎭 Papel:** visualizar e atualizar as informações do próprio perfil, consultar suas publicações e visualizar os posts repostados.
- **🔐 Permissões:** consultar e editar os dados permitidos de sua própria conta, além de acessar as opções de edição e exclusão de suas publicações conforme o RF-006.
- **🖥️ Acesso:** página de perfil, formulário de edição, seção de publicações próprias e seção de publicações repostadas.
- **🚫 Restrições:** não poderá modificar perfis de outros usuários, editar ou excluir publicações de terceiros, nem excluir a própria conta por meio deste requisito.

##### 📊 Permissões CRUD — Usuário Cadastrado

| Operação      | Permissão | Descrição                                                                                                                                                                                                                   |
| ------------- | :-------: | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 🟢 **Create** |     ❌     | Não se aplica. A criação da conta pertence ao RF-002 — Cadastro de Usuários. A criação de publicações pertence ao RF-006.                                                                                                   |
| 🔵 **Read**   |     ✅     | Pode visualizar as informações do próprio perfil, suas publicações e os posts repostados.                                                                                                                                   |
| 🟡 **Update** |     ✅     | Pode editar o próprio Nome, Nome de Usuário (@), Bio, Foto de Perfil, Foto da Capa e Localização. Para editar publicações próprias, utiliza a opção correspondente prevista no RF-006.                                      |
| 🔴 **Delete** |     ✅     | O usuário cadastrado tem permissão para fazer a exclusão de sua própria conta, não sendo permitido a exclusão das contas de outros usuários. |

#### ⚙️ 2. Sistema Librando

- **🎭 Papel:** processar as solicitações de consulta e atualização do perfil, validar as informações e garantir que as alterações sejam armazenadas corretamente. Também deverá disponibilizar as publicações próprias e repostadas para visualização.
- **🛡️ Responsabilidade:** verificar a autenticação, aplicar as regras de negócio, identificar a autoria das publicações e impedir operações não autorizadas.
- **💾 Acesso:** serviços internos da aplicação, mecanismos de validação, camada de persistência de dados e funcionalidades de publicações relacionadas ao RF-006.
- **🚫 Restrições:** não deverá permitir alterações que violem as permissões definidas ou as regras de integridade, nem permitir que a visualização ou o repost de uma publicação conceda autorização para modificar o conteúdo original de terceiros.

##### 📊 Permissões CRUD — Sistema Librando

| Operação      | Permissão | Descrição                                                                                                                                                                                                                                  |
| ------------- | :-------: | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| 🟢 **Create** |     ❌     | Não se aplica à edição do perfil; a criação da conta é tratada pelo RF-002 e a criação de publicações pelo RF-006.                                                                                                                         |
| 🔵 **Read**   |     ✅     | Recupera os dados necessários para exibir o perfil autorizado, as publicações próprias e os posts repostados.                                                                                                                              |
| 🟡 **Update** |     ✅     | Processa e persiste as alterações válidas solicitadas pelo usuário autorizado. As solicitações de edição de publicações seguem o mecanismo definido no RF-006.                                                                             |
| 🔴 **Delete** |     ❌     | O usuário cadastrado possui permissão para solicitar a exclusão da própria conta por meio do perfil. A exclusão deverá ocorrer somente mediante solicitação explícita do usuário e após a validação de sua identidade. |

### ✅ 2.4 Validações Necessárias

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
13. 📝 **Consulta de publicações próprias:** o sistema deverá apresentar as publicações de autoria do usuário na seção correspondente do perfil.
14. ✏️ **Opções de gerenciamento:** as opções de edição e exclusão deverão ser disponibilizadas nas publicações próprias conforme as regras e funcionalidades do RF-006.
15. 🔁 **Consulta de reposts:** o sistema deverá apresentar as publicações repostadas pelo usuário em uma seção específica, distinguindo-as das publicações de sua própria autoria.
16. 🚫 **Proteção de publicações de terceiros:** o sistema deverá impedir a edição ou exclusão de publicações de outros usuários por meio das opções disponibilizadas no perfil.
17. ↩️ **Remoção de repost:** quando disponível, a operação deverá remover somente a associação do repost do usuário autenticado, sem excluir ou modificar a publicação original.

## 🔄 3. Casos de Uso e Requisitos Não Funcionais

### 📌 3.1 Identificação do Caso de Uso

| Campo                        | Descrição                                                                                                                                                                                                                                |
| ---------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 🆔 **ID**                    | UC-007                                                                                                                                                                                                                                   |
| 📋 **Requisito relacionado** | RF-007 — Perfil de Usuário                                                                                                                                                                                                               |
| 👤 **Ator principal**        | Usuário Cadastrado                                                                                                                                                                                                                       |
| ⚙️ **Ator secundário**       | Sistema Librando                                                                                                                                                                                                                         |
| 🎯 **Objetivo**              | Permitir que o usuário visualize e atualize as informações do próprio perfil, incluindo nome, nome de usuário, biografia, localização, foto de perfil e foto de capa, além de consultar suas publicações próprias e os posts repostados. |
| 🔗 **Relacionamento**        | Funcionalidade de visualização e edição do perfil da rede social Librando, integrada ao RF-006 — Criação e Publicação de Postagens para as opções de gerenciamento de publicações próprias.                                              |

### 🔐 3.2 Pré-condições

- O usuário deve possuir uma conta cadastrada no Librando.
- O usuário deve estar autenticado na plataforma.
- O sistema deve estar disponível para receber solicitações.
- O perfil do usuário deve existir no banco de dados.
- O usuário deve possuir acesso à página de perfil e à funcionalidade de edição.
- Para visualizar as publicações próprias e repostadas, deverão existir dados associados ao usuário ou o sistema deverá apresentar uma mensagem adequada quando não houver publicações.
- As opções de edição e exclusão de publicações deverão respeitar as funcionalidades e regras estabelecidas no RF-006.

### 🚀 3.3 Fluxo Principal

1. 👤 O usuário acessa sua conta no Librando.
2. 🖥️ O sistema apresenta a interface principal da plataforma.
3. 🔎 O usuário acessa a página do próprio perfil.
4. 📄 O sistema recupera e exibe as informações atuais do perfil, incluindo nome, nome de usuário, biografia, foto de perfil e foto de capa, localização.
5. ✏️ O usuário seleciona a opção de editar perfil.
6. 📝 O sistema apresenta o formulário de edição preenchido com os dados atuais.
7. ⌨️ O usuário altera os campos desejados, podendo modificar o nome, o nome de usuário, a biografia, localização e as imagens do perfil.
8. 💾 O usuário solicita o salvamento das alterações.
9. 🛡️ O sistema verifica a autenticação do usuário e valida os dados informados, incluindo a obrigatoriedade dos campos Nome e Nome de Usuário (@).
10. 🔎 O sistema verifica se o nome de usuário informado está disponível, desconsiderando o próprio registro do usuário.
11. 🖼️ Caso sejam enviadas novas imagens, o sistema valida os arquivos conforme os formatos e limites permitidos.
12. 💾 O sistema persiste as alterações válidas no banco de dados e atualiza as referências das imagens, conforme a arquitetura utilizada.
13. ✅ O sistema confirma que as alterações foram salvas com sucesso.
14. 👁️ O sistema apresenta o perfil atualizado com as novas informações e imagens.
15. 📝 O usuário acessa a seção de publicações próprias em seu perfil.
16. 📄 O sistema recupera e exibe as publicações criadas pelo usuário, apresentando uma mensagem adequada caso não existam publicações.
17. 🔘 O sistema disponibiliza, em cada publicação própria, as opções de edição e exclusão previstas no RF-006.
18. ✏️ Caso deseje editar uma publicação, o usuário seleciona a opção de edição disponibilizada no próprio post.
19. 🛡️ O sistema encaminha a solicitação para a funcionalidade correspondente do RF-006, que deverá validar a autoria e a autorização para editar a publicação.
20. 💾 Após a conclusão da edição pelo mecanismo do RF-006, o sistema atualiza a publicação apresentada no perfil.
21. 🗑️ Caso deseje excluir uma publicação própria, o usuário seleciona a opção de exclusão disponibilizada no próprio post.
22. ⚠️ O sistema responsável pelo RF-006 solicita a confirmação e processa a exclusão conforme as regras estabelecidas para a funcionalidade.
23. 🔄 Após a conclusão da exclusão, o sistema atualiza a seção de publicações próprias.
24. 🔁 O usuário acessa a seção de publicações repostadas.
25. 📄 O sistema recupera e apresenta os posts repostados pelo usuário, distinguindo-os das publicações de sua própria autoria.
26. ↩️ Caso a funcionalidade esteja disponível, o usuário seleciona a opção de desfazer um repost.
27. 🛡️ O sistema verifica se o repost está associado ao usuário autenticado.
28. 💾 O sistema remove a associação do repost, preservando a publicação original de outro usuário.
29. ✅ O sistema atualiza a seção de reposts e apresenta o resultado da operação.

### 🔀 3.4 Fluxos Alternativos

#### ⚠️ FA-01 — Campos Obrigatórios Não Preenchidos

1. O usuário tenta salvar o perfil sem preencher o campo Nome ou Nome de Usuário (@).
2. O sistema identifica o campo obrigatório vazio ou preenchido apenas com espaços em branco.
3. O sistema apresenta uma mensagem informando quais campos precisam ser corrigidos.
4. O usuário preenche os campos obrigatórios.
5. O fluxo retorna à etapa de validação do fluxo principal.

**Resultado:** as alterações não são concluídas até que os campos obrigatórios sejam válidos.

#### 🏷️ FA-02 — Nome de Usuário Já Existente

1. O usuário informa um nome de usuário que já pertence a outra conta.
2. O sistema verifica a existência de outro registro com o mesmo identificador.
3. O sistema informa que o nome de usuário está indisponível.
4. O usuário informa um identificador diferente.
5. O sistema realiza novamente a validação de unicidade.

**Resultado:** o perfil somente poderá ser atualizado quando o nome de usuário atender às regras definidas.

#### 🖼️ FA-03 — Imagem Inválida ou Acima do Limite Permitido

1. O usuário seleciona uma foto de perfil ou de capa.
2. O sistema verifica o formato e o tamanho do arquivo.
3. O sistema identifica que a imagem não atende aos critérios permitidos.
4. O sistema informa o motivo da rejeição e solicita a seleção de outro arquivo.
5. O usuário seleciona uma imagem válida.

**Resultado:** a imagem inválida não deverá substituir a imagem atualmente associada ao perfil.

#### 🌐 FA-04 — Falha ao Salvar as Alterações

1. O usuário solicita o salvamento do perfil.
2. O sistema inicia o processamento das alterações.
3. Ocorre uma falha de comunicação, processamento ou persistência dos dados.
4. O sistema informa que não foi possível concluir a operação.
5. O usuário poderá tentar salvar novamente após a normalização do serviço.

**Resultado:** o sistema não deverá informar sucesso sem confirmar a conclusão da operação. As informações anteriores deverão ser preservadas sempre que possível, evitando atualizações parciais inconsistentes.

#### 🔒 FA-05 — Sessão Expirada ou Acesso Não Autorizado

1. O usuário tenta acessar ou atualizar o perfil.
2. O sistema verifica a validade da sessão e a autorização da solicitação.
3. O sistema identifica que a sessão expirou ou que o usuário não possui autorização para modificar o perfil solicitado.
4. O sistema bloqueia a operação e informa a necessidade de autenticação, quando aplicável.
5. O usuário poderá autenticar-se novamente e acessar o próprio perfil.

**Resultado:** nenhuma alteração não autorizada deverá ser realizada.

#### 📝 FA-06 — Usuário Sem Publicações Próprias

1. O usuário acessa a seção de publicações próprias.
2. O sistema consulta as publicações associadas ao usuário.
3. O sistema identifica que não existem publicações próprias para apresentar.
4. O sistema exibe uma mensagem informando que o usuário ainda não possui publicações.

**Resultado:** o perfil continua acessível e o sistema não apresenta erro apenas pela ausência de publicações.

#### ✏️ FA-07 — Tentativa de Editar Publicação de Outro Usuário

1. O usuário tenta acessar a edição de uma publicação que não criou.
2. O sistema verifica a autoria da publicação.
3. O sistema identifica que o post pertence a outra conta.
4. O sistema bloqueia a operação e informa que a edição não está autorizada.

**Resultado:** a publicação original permanece inalterada. A visualização ou o repost não concede permissão de edição.

#### 🗑️ FA-08 — Exclusão de Publicação Própria

1. O usuário seleciona a opção de excluir uma publicação própria.
2. O sistema responsável pelo RF-006 solicita a confirmação da exclusão.
3. O usuário confirma a operação.
4. O sistema verifica a autoria e processa a solicitação conforme as regras do RF-006.
5. O sistema atualiza a lista de publicações do perfil e apresenta uma confirmação.

**Resultado:** a publicação é excluída conforme as regras implementadas no RF-006.

**Alternativa:** caso o usuário cancele a confirmação, a publicação deverá permanecer disponível.

#### 🔁 FA-09 — Usuário Sem Publicações Repostadas

1. O usuário acessa a seção de publicações repostadas.
2. O sistema consulta os reposts associados à conta.
3. O sistema identifica que não existem publicações repostadas.
4. O sistema exibe uma mensagem informando que não há reposts para apresentar.

**Resultado:** a seção permanece acessível e apresenta corretamente o estado vazio.

#### ↩️ FA-10 — Falha ao Desfazer Repost

1. O usuário solicita a remoção de um repost.
2. O sistema verifica se a associação do repost pertence ao usuário autenticado.
3. Ocorre uma falha durante o processamento da solicitação.
4. O sistema informa que não foi possível concluir a operação.

**Resultado:** o sistema não deverá confirmar a remoção sem concluir a operação. A publicação original deverá permanecer preservada.

### 🏁 3.5 Pós-condições

- ✅ As informações válidas do perfil são atualizadas e persistidas.
- 👤 O perfil permanece associado à conta correta.
- 🏷️ O nome de usuário continua respeitando a regra de unicidade.
- 🖼️ As novas fotos de perfil e de capa ficam associadas ao perfil após o processamento bem-sucedido.
- 🔎 As informações atualizadas ficam disponíveis para consultas posteriores.
- 🛡️ Nenhuma alteração não autorizada é realizada.
- ⚠️ Em caso de falha, o sistema informa o problema e não apresenta a operação como concluída com sucesso.
- 📝 As publicações próprias ficam disponíveis para consulta na seção correspondente do perfil.
- ✏️ As opções de edição e exclusão são disponibilizadas nas publicações próprias conforme o RF-006.
- 🔄 As publicações editadas ou excluídas refletem o resultado da operação após o processamento pelo RF-006.
- 🔁 As publicações repostadas ficam disponíveis para consulta em uma seção específica do perfil.
- ↩️ Ao desfazer um repost, somente a associação do repost é removida, preservando a publicação original de terceiros.
- 🚫 O usuário não consegue editar ou excluir publicações de terceiros por meio das opções do perfil.

---

### ⚙️ 3.6 Requisitos Não Funcionais

| ID | Requisito | Descrição |
|---|---|---|
| ⚡ **RNF-01** | **Desempenho** | O carregamento das informações do perfil e o processamento de atualizações comuns deverão ocorrer em até 2 segundos em condições normais de operação, desconsiderando o tempo necessário para transferir arquivos de imagem grandes ou a ocorrência de problemas externos de rede. |
| 📱 **RNF-02** | **Responsividade** | A interface de perfil e o formulário de edição deverão adaptar-se a dispositivos móveis, tablets e computadores, mantendo os campos e controles acessíveis em diferentes resoluções. |
| 🌐 **RNF-03** | **Compatibilidade** | A funcionalidade deverá ser compatível com versões atuais dos principais navegadores, incluindo Google Chrome, Mozilla Firefox, Microsoft Edge e Safari. |
| ♿ **RNF-04** | **Acessibilidade** | Os campos, botões, mensagens de erro e confirmações deverão possuir identificação clara, contraste adequado e navegação acessível por teclado, considerando as necessidades de acessibilidade do público do Librando. |
| 🔒 **RNF-05** | **Segurança** | As operações de consulta e atualização deverão verificar autenticação e autorização, proteger os dados transmitidos e validar os arquivos enviados para reduzir riscos de acesso indevido e envio de conteúdo malicioso. |
| 💾 **RNF-06** | **Integridade e confiabilidade** | O sistema deverá garantir a consistência das informações do perfil, evitando que falhas durante uma atualização produzam dados incompletos ou inconsistentes. |
| 🖼️ **RNF-07** | **Processamento de imagens** | O sistema deverá processar as imagens de perfil e de capa dentro dos limites de tamanho e formatos estabelecidos, evitando o consumo excessivo de recursos. |
| 📝 **RNF-08** | **Consulta de publicações** | A seção de publicações próprias deverá apresentar os posts associados ao usuário correto, mantendo um tempo de resposta adequado em condições normais de operação. |
| 🔁 **RNF-09** | **Consulta de reposts** | A seção de publicações repostadas deverá distinguir os conteúdos repostados das publicações de autoria do usuário e preservar a identificação do autor original. |
| 🛡️ **RNF-10** | **Autorização de publicações** | As opções de edição e exclusão deverão respeitar a autoria e as permissões definidas no RF-006, com validação realizada no processamento da solicitação. |
| 💾 **RNF-11** | **Integridade dos reposts** | A remoção de um repost deverá preservar a publicação original e os dados associados a outros usuários. |

---

### 📏 3.7 Regras de Negócio

| ID | Regra de Negócio | Descrição |
|---|---|---|
| **RN-01** | Autenticação | Somente usuários autenticados poderão acessar a funcionalidade de edição do perfil. |
| **RN-02** | Propriedade do perfil | Cada usuário poderá editar apenas as informações associadas à própria conta, salvo se existir uma autorização administrativa específica definida em outro requisito. |
| **RN-03** | Nome obrigatório | O campo Nome deverá ser preenchido e não poderá conter apenas espaços em branco. |
| **RN-04** | Nome de Usuário obrigatório | O campo Nome de Usuário (@) deverá ser preenchido antes do salvamento. |
| **RN-05** | Unicidade do identificador | Cada nome de usuário deverá ser único conforme as regras de comparação adotadas pelo sistema. Durante a edição, o usuário poderá manter o próprio identificador atual. |
| **RN-06** | Biografia opcional | O campo Bio poderá permanecer vazio, desde que respeite os limites de tamanho e as regras de conteúdo definidas pela plataforma. |
| **RN-07** | Alteração de imagens | O usuário poderá alterar a foto de perfil e a foto de capa de maneira independente, sem ser obrigado a modificar os demais campos. |
| **RN-08** | Formatos permitidos | As imagens deverão utilizar formatos autorizados pela plataforma, como JPEG, PNG ou WebP, desde que esses formatos sejam efetivamente suportados pela implementação. |
| **RN-09** | Limite de tamanho | Os arquivos de imagem deverão respeitar o limite máximo definido para o envio e armazenamento. |
| **RN-10** | Confirmação de salvamento | O sistema somente deverá confirmar o sucesso da atualização depois que as alterações tiverem sido persistidas corretamente. |
| **RN-11** | Tratamento de falhas | Se uma atualização falhar, o sistema deverá informar o usuário e evitar que imagens ou informações anteriores sejam substituídas por dados inválidos. |
| **RN-12** | Proteção de dados | O usuário não poderá alterar, por meio do formulário de perfil, identificadores internos, permissões, credenciais ou outras informações que não pertençam ao escopo do RF-007. |
| **RN-13** | Atualização independente | A alteração de nome, nome de usuário, biografia, foto de perfil ou foto de capa não deverá exigir a modificação dos demais campos. |
| **RN-14** | Persistência das imagens | Após a confirmação do salvamento, as imagens atualizadas deverão permanecer disponíveis e associadas ao perfil, conforme a solução de armazenamento adotada pelo projeto. |
| **RN-15** | Exibição de publicações próprias | O perfil deverá apresentar as publicações criadas pelo usuário autenticado em uma seção própria. |
| **RN-16** | Integração com o RF-006 | As operações de criação, edição e exclusão de publicações deverão seguir as regras e os mecanismos definidos no RF-006, sem duplicação de sua implementação no RF-007. |
| **RN-17** | Edição por autoria | O usuário poderá editar somente as publicações de sua autoria, respeitando as regras de autorização do RF-006. |
| **RN-18** | Exclusão por autoria | O usuário poderá solicitar a exclusão de suas próprias publicações por meio da opção disponibilizada no post, conforme as regras do RF-006. A exclusão da conta não pertence ao RF-007. |
| **RN-19** | Exibição de reposts | O perfil deverá apresentar em seção específica os posts repostados pelo usuário, distinguindo-os das publicações próprias. |
| **RN-20** | Remoção de repost | Quando a funcionalidade estiver disponível, o usuário poderá desfazer um repost realizado por ele, removendo somente a associação do repost e preservando a publicação original. |
| **RN-21** | Proteção de publicações de terceiros | Visualizar ou repostar uma publicação não concede ao usuário permissão para editar ou excluir o conteúdo original de outro autor. |
| **RN-22** | Atualização das seções | Após a conclusão de uma operação de edição, exclusão ou remoção de repost, o sistema deverá atualizar a seção correspondente para refletir o estado atual dos dados. |
| **RN-23** | Hospedagem de imagens | O sistema deverá utilizar o serviço externo ImgBB para hospedar as imagens de perfil e de capa. Após o envio bem-sucedido, a URL retornada pelo serviço deverá ser associada ao perfil correspondente e utilizada para exibir a imagem na aplicação. |

<!--
ANTES DE ENTREGAR (comentário invisível, apague depois):
1. Trocar «E-MAIL DA CONTA DE TESTE» e «SENHA DA CONTA DE TESTE» (item 4.1 a) por uma conta criada só para o professor.
2. Commitar docs/api/swagger.json e database/rf-007-editar-perfil-ddl.sql no repositório.
3. Enviar a senha do usuário professor_leitura por e-mail ao professor (nunca neste arquivo).
4. Se implementar validação verde/vermelha, mensagem de sucesso, <label for> ou responsividade, acrescentar a linha correspondente no item 4.5.
-->

## 4. Protótipo

Interface funcionando online em: https://librando-frontend.onrender.com/ (menu **Meu perfil** → botão **Editar perfil**).

| Operação | Método | Endpoint | Status esperado |
|---|---|---|---|
| Create | — | — | Não se aplica (a conta é criada no RF-002: `POST /api/cadastro`) |
| Read | GET | /api/perfil | 200 / 401 |
| Update | POST (ou PUT/PATCH) | /api/perfil | 200 / 400 / 401 / 500 |
| Delete | — | — | Não se aplica (a exclusão de conta está fora do escopo do RF-007) |

⛔ Documentação da API (obrigatória): `docs/api/swagger.json`

---

### 4.1 Pré-requisitos dos itens a, b, c e d

**a) Aplicação online e pública**
- **URL:** https://librando-frontend.onrender.com/ (a mesma informada no Tópico 1, item a).
- **Plataforma:** Render (deploy automático a partir do GitHub).
- **Credenciais de teste** (a aplicação exige login): «teste@librando.com» / «Teste123».

**b) Banco de dados online e persistindo dados**
- **BD:** MySQL hospedado no Aiven. **Interface de acesso:** phpMyAdmin — https://librando-phpmyadmin.onrender.com
- **Acesso de leitura ao professor:** usuário `professor_leitura` (somente consulta). A senha foi enviada por e-mail para prof.edilberto.silva@gmail.com.
- **Tabela principal:** `usuarios`. Os dados permanecem após recarregar a página.

**c) Código-fonte completo no GitHub**
- **Repositório:** https://github.com/angeldanylo35-ux/librando00 (público), branch `main`.
- Contém código-fonte (`backend/` e `frontend/`), documentação (`docs/`) e DDL (`database/`). O `.env` não é versionado (`.gitignore`); as credenciais ficam em variáveis de ambiente.

**d) Documentação da API**
- `docs/api/swagger.json` (OpenAPI 3.0, JSON válido), com `BearerAuth` declarado e as rotas do perfil marcadas com `security`.

---

### 4.2 CRUD: as operações do RF-007

O RF-007 trata do perfil do **próprio** usuário autenticado. Não há `{id}` nas rotas: a conta editada é sempre a dona do token (RN-02). A conta é criada no RF-002 (`POST /api/cadastro`) e a exclusão de conta não faz parte deste requisito.

| Operação | Ação na interface | Método HTTP | Endpoint | Resposta esperada | Verificação |
|---|---|---|---|---|---|
| **C**reate | Não se aplica: a conta é criada no RF-002 | — | — | — | — |
| **R**ead | Abrir "Meu perfil" | `GET` | `/api/perfil` | `200 OK` / `401` | Dados conferem com a linha do usuário na tabela `usuarios` |
| **U**pdate | Editar perfil → alterar campos e fotos → Salvar | `POST` (ou `PUT`/`PATCH`) | `/api/perfil` | `200 OK` / `400` / `401` / `500` | Alteração aparece no perfil após recarregar e no banco |
| **D**elete | Não se aplica: exclusão de conta fora do escopo | — | — | — | — |

O envio de fotos usa `POST` com `multipart/form-data`, porque o PHP não processa arquivos em requisições `PUT`. Por isso a interface usa `POST /api/perfil`. Como a rota não tem `{id}`, não há resposta `404` documentada para o perfil.

---

### 4.3 Documentação da API

Arquivo `https://github.com/angeldanylo35-ux/librando00/blob/main/docs/api/swagger.json](https://github.com/angeldanylo35-ux/librando00/blob/main/docs/api/swagger.json)` (OpenAPI 3.0, JSON válido), com `BearerAuth` (HTTP, `bearer`) e `security` nas rotas do perfil.

| Método | Endpoint | O que documenta | Respostas |
|---|---|---|---|
| GET | `/api/perfil` | Perfil do usuário autenticado | `200`, `401` |
| POST | `/api/perfil` | `multipart/form-data` (ou JSON): `nome`, `nome_usuario`, `localizacao`, `bio`, `foto_perfil`, `foto_capa` | `200`, `400`, `401`, `500` |
| PUT | `/api/perfil` | JSON com os campos de texto | `200`, `400`, `401`, `500` |
| PATCH | `/api/perfil` | JSON com os campos de texto (parcial) | `200`, `400`, `401`, `500` |

- Cada método traz exemplo de resposta e, nos métodos com corpo (POST, PUT e PATCH), exemplo de requisição.
- Os campos do `requestBody` são os mesmos do formulário de edição da interface.
- Os códigos documentados são os que a API retorna (`200` sucesso, `400` dados inválidos, `401` sem token, `500` falha ao salvar).
- O arquivo também documenta `login`, `cadastro`, `verificar-email`, `esqueci-senha` e `redefinir-senha`; o login devolve o token Bearer usado no perfil.
- O arquivo não contém senhas, tokens ou chaves reais (os exemplos usam valores fictícios).

---

### 4.4 Script DDL do banco de dados

Arquivo `database/rf-007-editar-perfil-ddl.sql` (MySQL 8), equivalente às migrations do Laravel. Contém as tabelas `usuarios` e `personal_access_tokens`.

- `usuarios`: chave primária `id`; `NOT NULL` em nome, e-mail, data de nascimento, nome de usuário e senha; `UNIQUE` em `email` e `nome_usuario` (que também servem como índices de busca); `CHECK` impedindo nome e @ vazios; limites de tamanho iguais aos da validação da API (nome 100, @ 50, bio 300, localização 100). A senha é guardada somente como hash (bcrypt).
- `personal_access_tokens`: tokens Bearer do Sanctum guardados apenas como hash; `UNIQUE` no token e índices por dono do token e por expiração.

---

### 4.5 Interface e integração

| Item | Situação |
|---|---|
| HTML com CSS e JavaScript (Vue 3 + Tailwind CSS), página `Perfil.vue` | ✅ |
| Mensagens de erro claras, em português (a API devolve `mensagem` e `campos`; o formulário exibe a mensagem) | ✅ |
| Tratamento de erros (`try/catch`) nas chamadas à API, com retorno ao login em caso de `401` | ✅ |
| Estado **vazio**: sem foto (iniciais), sem bio ou localização (campos omitidos) | ✅ |
| Estado **preenchido**: perfil com nome, @, bio, localização e fotos | ✅ |
| Estado **erro**: mensagem do servidor exibida no formulário | ✅ |
| Estado **carregando**: botão "Salvando..." durante o envio | ✅ |
| Estado **sucesso**: mensagem "Perfil atualizado com sucesso!" após salvar, com o perfil exibindo os dados atualizados | ✅ |

**Regras de validação (backend):** nome obrigatório (até 100); @ obrigatório, único, até 50, apenas letras, números, ponto e underline; localização até 100; bio até 300; fotos JPG, PNG ou WebP (perfil até 4 MB, capa até 6 MB). Somente esses campos são aceitos e a gravação é feita em um único `UPDATE`: em caso de falha, nada é alterado.

---
### 4.6 Autoavaliação (Tópico 4)

| Parte | Situação |
|---|---|
| **CREATE** | Não se aplica ao perfil (conta criada no RF-002) |
| **READ** (`GET /api/perfil`) | ✅ funcionando; documentado |
| **UPDATE** (`POST /api/perfil`) | ✅ funcionando; documentado |
| **DELETE** | Não se aplica ao perfil (exclusão de conta fora do escopo) |
| **Qualidade da interface e integração** | Estados preenchido, vazio, carregando e erro; mensagens claras e tratamento de erros (item 4.5) |
| **Pré-requisitos (a, b, c, d)** | ✅ aplicação, banco e repositório online; `swagger.json` no repositório |

---

### 4.7 Roteiro de teste

1. Abrir a URL do item a) em uma janela anônima e entrar com as credenciais de teste.
2. Abrir **Meu perfil** → conferir os dados na tela e a linha correspondente em `usuarios` no phpMyAdmin (**Read**).
3. Clicar em **Editar perfil** → alterar nome, bio e localização → **Salvar** → recarregar a página → conferir a alteração na tela e no banco (**Update**).
4. Trocar a foto de perfil e a capa → **Salvar** → recarregar → conferir que as imagens permanecem.
5. Tentar salvar com nome vazio, com @ de outra conta, com @ contendo espaço e com imagem inválida ou acima do limite → conferir as mensagens de erro.
6. Conferir o repositório: estrutura de pastas, DDL, `.gitignore` e ausência de segredos.
7. Abrir `docs/api/swagger.json` em https://editor.swagger.io → conferir que não há erro e que `GET`, `POST`, `PUT` e `PATCH` de `/perfil` correspondem aos testes realizados.

---

## 5. Arquitetura e Decisões

### 5.1 Diagrama de Arquitetura

```text
┌──────────────────────────┐      HTTPS / JSON (multipart p/ imagens)      ┌─────────────────────────────┐
│  NAVEGADOR DO USUÁRIO    │ ───────────────────────────────────────────▶  │  BACKEND (Render)           │
│                          │      Authorization: Bearer <token>            │  Laravel (API REST)         │
│  FRONTEND (Render)       │                                               │                             │
│  Vue 3 + Vite + Tailwind │ ◀───────────────────────────────────────────  │  routes/api.php             │
│  Vue Router (SPA)        │      JSON { sucesso, mensagem, perfil }       │    └─ auth:sanctum          │
│  Perfil.vue              │                                               │  PerfilController           │
│  services/api.js (HTTP)  │                                               │    └─ Validator             │
└──────────────────────────┘                                               │  Model Usuario (Eloquent)   │
                                                                           │  ImageService               │
                                                                           └────────┬───────────┬────────┘
                                                                                    │ SQL       │ HTTPS
                                                                                    ▼           ▼
                                                                           ┌──────────────┐  ┌──────────────────┐
                                                                           │ MySQL        │  │ ImgBB            │
                                                                           │ Aiven        │  │ Hospedagem de    │
                                                                           │ tb: usuarios│  │ imagens          │
                                                                           │ + tokens     │  │ (fotos de perfil │
                                                                           │ + URLs       │  │ e de capa)       │
                                                                           └──────────────┘  └──────────────────┘
```

**Componentes**

| Camada | Tecnologia | Responsabilidade no RF-007 |
|---|---|---|
| Frontend | Vue 3, Vite, Tailwind, Vue Router | Tela de perfil e formulário de edição, exibição de erros, envio do token |
| Cliente HTTP | `services/api.js` | Centraliza as chamadas à API e anexa o token Bearer |
| Backend | Laravel (API REST) | Autenticar, validar, processar a edição e devolver o perfil |
| Autenticação | Laravel Sanctum | Emite e valida o token pessoal de cada usuário |
| Banco de dados | MySQL (Aiven) | Persistir os dados do perfil e as URLs das imagens na tabela `usuarios` |
| Hospedagem de imagens | ImgBB | Armazenar as imagens enviadas e fornecer as URLs utilizadas pelo sistema |
| Serviço de imagens | `ImageService` | Centralizar a integração com o ImgBB e o processamento do envio das imagens |
| Hospedagem | Render (deploy a partir do GitHub) | Publicar frontend e backend |

### 5.2 Decisões Arquiteturais (ADRs)

**ADR-001: Frontend e backend separados (SPA + API REST)**
- *Decisão:* Vue 3 como SPA e Laravel apenas como API JSON.
- *Razão:* permite publicar cada parte de forma independente, reaproveitar a mesma API em outros clientes no futuro e manter o código organizado, sem PHP misturado com HTML.
- *Consequência:* exige configurar CORS e enviar o token em toda requisição protegida.

**ADR-002: Autenticação com Laravel Sanctum (token Bearer)**
- *Decisão:* o login devolve um token pessoal; o frontend o envia no cabeçalho `Authorization` e as rotas protegidas usam `auth:sanctum`.
- *Razão:* é a solução oficial do Laravel para APIs, permite autenticação por token e simplifica a comunicação entre frontend e backend separados.
- *Consequência:* o token precisa ser guardado com cuidado no cliente e é invalidado no logout, conforme a implementação da aplicação.

**ADR-003: Rota `/perfil` sem `{id}` e uso de `POST` com multipart**
- *Decisão:* o perfil editado é sempre o do usuário autenticado (a rota não recebe id), e a edição com imagens usa `POST /perfil`; `PUT`/`PATCH /perfil` ficam disponíveis para envio só de texto.
- *Razão:* sem `{id}` na URL, um usuário não consegue editar o perfil de outro por troca de identificador. O `POST` com `multipart/form-data` permite enviar os campos e arquivos de imagem na mesma requisição.
- *Consequência:* a documentação Swagger precisa listar os métodos disponibilizados pela rota.

**ADR-004: MySQL com Eloquent ORM**
- *Decisão:* dados do perfil na tabela `usuarios` do MySQL, hospedado online no Aiven, acessados via Eloquent.
- *Razão:* o banco relacional é adequado a dados estruturados com restrições de unicidade (`nome_usuario`, `email`). O Eloquent utiliza consultas parametrizadas, reduzindo o risco de SQL Injection, e os índices `UNIQUE` do banco ajudam a impedir valores duplicados.
- *Consequência:* o banco precisa estar acessível pelo backend publicado, e as credenciais devem ser configuradas nas variáveis de ambiente do Render.

**ADR-005: Hospedagem externa de imagens com ImgBB e armazenamento das URLs no banco**
- *Decisão:* as fotos de perfil e de capa são enviadas pelo backend ao ImgBB por meio do serviço de integração `ImageService`. Após o envio bem-sucedido, a aplicação utiliza as URLs retornadas pelo serviço e armazena essas referências nos campos `foto_perfil_url` e `foto_capa_url` da tabela `usuarios`.
- *Razão:* a hospedagem externa evita depender do disco local do Laravel para manter os arquivos. Isso é especialmente importante no Render, cujo sistema de arquivos pode ser temporário. O banco armazena somente as referências das imagens, mantendo os arquivos fora do banco de dados.
- *Consequência:* a exibição das fotos depende da disponibilidade do ImgBB e da validade das URLs armazenadas. A chave de API do ImgBB deve permanecer em uma variável de ambiente do backend, sem ser exposta no frontend ou no repositório. Caso o envio da imagem ou a atualização do banco falhe, o tratamento de erros deve evitar atualizar o perfil com uma URL inválida e informar a falha ao usuário.

**ADR-006: Deploy no Render a partir do GitHub**
- *Decisão:* frontend e backend publicados separadamente no Render, com deploy automático a cada push na branch principal; o backend roda em contêiner Docker.
- *Razão:* permite disponibilizar o sistema por URLs públicas e automatizar a publicação a partir do repositório.
- *Consequência:* segredos e credenciais ficam nas variáveis de ambiente do Render, nunca no repositório.

### 5.3 Fluxo de Dados (Editar Perfil)

1. O usuário abre a tela de perfil; o Vue chama `GET /api/perfil` com o token.
2. O Sanctum valida o token e identifica o usuário; o `PerfilController` devolve nome, @usuário, localização, bio e URLs das fotos.
3. O formulário é preenchido com esses dados; o usuário altera os campos e/ou escolhe novas imagens.
4. O Vue envia `POST /api/perfil` (`multipart/form-data`) com o token de autenticação.
5. O Laravel valida os campos, incluindo tamanho, formato do nome de usuário, unicidade e tipo e tamanho dos arquivos de imagem.
6. Se houver erro de validação, a API responde com uma mensagem e os campos inválidos; o Vue exibe o erro no formulário, sem fechá-lo.
7. Se estiver válido, o backend utiliza o `ImageService` para enviar as novas imagens ao ImgBB. Após o envio bem-sucedido, recebe as URLs correspondentes e atualiza os campos `foto_perfil_url` e/ou `foto_capa_url`, juntamente com os demais dados, na tabela `usuarios` do MySQL. Se nenhuma imagem nova for enviada, as URLs existentes são mantidas.
8. A API responde com o perfil atualizado; o Vue fecha o formulário, exibe a mensagem de sucesso e apresenta os dados atualizados na tela. Se ocorrer uma falha no envio da imagem ou na gravação dos dados, o sistema deve informar o erro e evitar apresentar uma atualização como concluída quando ela não foi persistida.

### 5.4 Padrão de Design

**API REST em camadas (MVC sem camada de visão no servidor).** O fluxo é: Rota → Middleware de autenticação → Controller → Serviço de imagens, quando necessário → Model (Eloquent) → Banco de dados. Quando há imagens, o serviço de imagens também se comunica com o ImgBB para hospedá-las e obter suas URLs. A “View” do MVC é a SPA em Vue, que consome apenas JSON.

*Justificativa:* separa responsabilidades (a tela não conhece o banco, e o banco não conhece a tela), permite evoluir frontend e backend de forma independente e centraliza a integração com o serviço externo de imagens. O uso do Eloquent e de um serviço dedicado facilita a manutenção e reduz a duplicação de código.
---

## 6. Segurança OWASP

### Controle 1: Controle de acesso e autenticação nas rotas do perfil

**Vulnerabilidade OWASP (Risco):** A01 – Broken Access Control. Um usuário não autenticado, ou um usuário comum tentando mudar o `id` na requisição, poderia ler ou alterar o perfil de outra pessoa (IDOR).

**Implementação (Como você protege?):** As rotas de perfil ficam dentro do grupo protegido pelo Sanctum, então exigem token válido. A rota não recebe identificador: o sistema sempre edita a conta dona do token, e qualquer `id` enviado no corpo da requisição é ignorado.

**Teste (Como provou que funciona?):** Chamei `GET` e `POST /api/perfil` sem token e a API respondeu `401` (não autenticado). Depois, com o token do usuário A, enviei no corpo um `id` do usuário B junto com um novo nome: a alteração foi aplicada apenas ao usuário A e o perfil de B permaneceu intacto no banco.

### Controle 2: Lista de campos permitidos (proteção contra Mass Assignment)

**Vulnerabilidade OWASP (Risco):** A01 – Broken Access Control / A04 – Insecure Design. Se a API gravasse tudo o que chega na requisição, um usuário poderia alterar campos que não deveria (e-mail, senha, id) apenas incluindo-os no envio.

**Implementação (Como você protege?):** A edição aceita somente uma lista fechada de campos: nome, nome de usuário, localização, bio e as duas imagens. Todo o resto é descartado antes de gravar. E-mail e senha não passam por esta rota. Campo não enviado mantém o valor atual.

**Teste (Como provou que funciona?):** Enviei `POST /api/perfil` com um novo nome e, junto, `email`, `senha` e `id` diferentes. A API respondeu `200` e somente o nome mudou: o e-mail continuou o mesmo no banco e o login com a senha antiga seguiu funcionando.

### Controle 3: Validação de entrada e upload seguro de imagens

**Vulnerabilidade OWASP (Risco):** A04 – Insecure Design (e A05 – Security Misconfiguration). Upload sem restrição permite enviar arquivos executáveis ou arquivos muito grandes, além de dados malformados que podem comprometer a aplicação.

**Implementação (Como você protege?):** O servidor valida os dados no backend, independentemente das validações do navegador. São aplicados limites para os textos, regras para o formato do nome de usuário e verificação de unicidade. Nas imagens, a aplicação valida os formatos permitidos (jpg, png ou webp) e os tamanhos máximos definidos para cada campo (4 MB para foto de perfil e 6 MB para foto de capa). Formatos como SVG e PHP não devem ser aceitos. Após a validação, o backend utiliza o `ImageService` para enviar as imagens ao ImgBB e obter as URLs correspondentes. Assim, os arquivos são hospedados no serviço externo, e não salvos diretamente no disco público do Laravel. A chave da API do ImgBB deve permanecer protegida nas variáveis de ambiente do backend.

**Teste (Como provou que funciona?):** Os testes de upload devem verificar a rejeição de arquivos com formatos não permitidos, arquivos acima do limite e arquivos inválidos, além da aceitação de imagens válidas. Também deve ser verificado se o backend encaminha corretamente as imagens aceitas ao ImgBB e armazena as URLs retornadas no banco. Os resultados devem ser registrados conforme os testes realmente executados.

### Controle 4: Proteção contra SQL Injection

**Vulnerabilidade OWASP (Risco):** A03 – Injection. Entrada maliciosa nos campos poderia alterar a consulta SQL e permitir ler, alterar ou apagar dados do banco.

**Implementação (Como você protege?):** Todo acesso ao banco passa pelo Eloquent e pelas regras de validação do Laravel, que utilizam consultas parametrizadas. Os valores são enviados separados do comando SQL, sem montar consultas por concatenação de texto fornecido pelo usuário. Além disso, o nome de usuário só aceita um conjunto restrito de caracteres.

**Teste (Como provou que funciona?):** Digitei `x'); DROP TABLE usuarios; --` no campo de nome de usuário e a API recusou com `400` (caracteres inválidos). No campo bio, que aceita texto livre, enviei `'); DROP TABLE usuarios; --`: o texto foi salvo literalmente, como texto comum, sem executar nada. A tabela `usuarios` permaneceu intacta.

### Controle 5: Proteção contra XSS (Cross-Site Scripting)

**Vulnerabilidade OWASP (Risco):** A03 – Injection (XSS). Um usuário mal-intencionado poderia cadastrar, no nome, na bio ou na localização, um trecho de JavaScript que seria executado no navegador de quem visualizar o perfil, podendo tentar acessar informações da sessão.

**Implementação (Como você protege?):** Os dados digitados pelo usuário, como nome, nome de usuário, bio, localização e texto das publicações, devem ser exibidos com a interpolação padrão do Vue, que trata o conteúdo como texto e escapa os caracteres especiais. A tela de perfil não deve usar `v-html` para exibir conteúdo não confiável. Como reforço, o backend valida o formato do nome de usuário e restringe os formatos de imagem aceitos. As imagens são enviadas ao ImgBB pelo backend por meio do `ImageService`, e as URLs retornadas pelo serviço são armazenadas no banco. Portanto, as URLs das imagens não são necessariamente geradas pelo próprio backend. A aplicação deve validar e tratar essas URLs antes de utilizá-las, evitando destinos inesperados.

**Teste (Como provou que funciona?):** Os testes devem verificar se conteúdos como `<script>alert('XSS')</script>` e `<img src=x onerror=alert(1)>` são exibidos como texto, sem executar código, inclusive após recarregar a página. Também deve ser verificado se as URLs de imagens são tratadas de forma segura. Os resultados devem ser registrados conforme os testes realmente executados.
