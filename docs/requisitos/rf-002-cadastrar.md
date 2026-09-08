
# 📝 RF-002 — Tela de Cadastro de Usuários

# 1. METADADOS DO PROJETO E DA EQUIPE

## 1.1 Composição da Equipe

|  ID | Nome Completo                 | Papel Primário          | Papel Secundário | E-mail / Contato                                                                                                                                    |
| :-: | :---------------------------- | :---------------------- | :--------------- | :-------------------------------------------------------------------------------------------------------------------------------------------------- |
|  1  | [André Mendes]                | Scrum Master            | Fullstack        | [[andre53774636@edu.df.senac.br](mailto:andre53774636@edu.df.senac.br)]                                                                             |
|  2  | [Eduardo Amorim]                     | Desenvolvedor Front-End | —                | [[eduardo59381426@edu.df.senac.br](mailto:eduardo59381426@edu.df.senac.br)]                                                                         |
|  3  | [Gabriel Souza / Vitor Silva] | Desenvolvedor Back-End  | —                | [[gabriel49414966@edu.df.senac.br](mailto:gabriel49414966@edu.df.senac.br) / [vitor59422706@edu.df.senac.br](mailto:vitor59422706@edu.df.senac.br)] |
|  4  | [Henrique Alves]              | DBA / Banco de Dados    | —                | [[henrique51782196@edu.df.senac.br](mailto:henrique51782196@edu.df.senac.br)]                                                                       |
|  5  | [Angel Pacheco]               | QA / SecDevOps          | —                | [[angel59381406@edu.df.senac.br](mailto:angel59381406@edu.df.senac.br)]                                                                             |
|  6  | [Angel Pacheco]               | Fullstack (opcional)    | —                | [[angel59381406@edu.df.senac.br](mailto:angel59381406@edu.df.senac.br)]                                                                             |

## 1.2 Identificação

* **NOME_DO_PROJETO:** Librando

* **DESCRICAO_BREVE:**
  Sistema web desenvolvido para a plataforma Librando, uma rede social voltada à comunidade surda. Nesta etapa do projeto, foi desenvolvida a tela de login com autenticação de usuários utilizando HTML, CSS, PHP e MySQL.

## 1.3 Localização dos Artefatos

* **LINK_REPOSITORIO_GITHUB:** `(https://github.com/angeldanylo35-ux/librando00/)`
* **BRANCH_PRINCIPAL:** `main`
* **LINK_APLICACAO_DEPLOY:** Aplicação executada localmente por meio do XAMPP.
* **LINK_BANCO_DADOS:** Banco de dados MySQL local.
* **LINK_API_SWAGGER:** Não se aplica nesta etapa do projeto.
* **LINK_DEMONSTRAÇÃO:** Aplicação executada localmente em `[(http://localhost:5173/login)]`

---

# 2. ESTRUTURA DE DIRETÓRIOS DO PROJETO

O projeto foi migrado para uma arquitetura separada entre **Back-end Laravel** e **Front-end Vue.js**, mantendo a organização dos arquivos de acordo com as convenções do framework Laravel.

```text
librando/
│
├── .claude/
│   ├── agents/
│   ├── settings/
│   └── system-prompts/
│
├── docs/
│   └── requisitos/
│       └── RF-001-login.md
|       └── RF-002-cadastrar.md
│
├── backend/                         # API / Back-end Laravel
│   ├── app/
│   │   ├── Http/
│   │   │   └── Controllers/
│   │   │       ├── Controller.php
│   │   │       └── api/
│   │   │           └── AuthController.php
│   │   │
│   │   ├── Models/
│   │   │   ├── User.php
│   │   │   └── Usuario.php
│   │   │
│   │   └── Providers/
│   │       └── AppServiceProvider.php
│   │
│   ├── bootstrap/
│   │   ├── app.php
│   │   ├── cache/
│   │   └── providers.php
│   │
│   ├── config/
│   │   ├── app.php
│   │   ├── auth.php
│   │   ├── database.php
│   │   ├── cors.php
│   │   ├── sanctum.php
│   │   ├── session.php
│   │   └── ...
│   │
│   ├── database/
│   │   ├── factories/
│   │   │   └── UserFactory.php
│   │   ├── migrations/
│   │   │   ├── 0001_01_01_000000_create_users_table.php
│   │   │   ├── 2026_09_06_021505_create_usuarios_table.php
│   │   │   └── ...
│   │   └── seeders/
│   │       ├── DatabaseSeeder.php
│   │       └── UsuarioSeeder.php
│   │
│   ├── public/
│   │   ├── index.php
│   │   ├── .htaccess
│   │   └── ...
│   │
│   ├── resources/
│   │   ├── css/
│   │   │   └── app.css
│   │   ├── js/
│   │   │   └── app.js
│   │   └── views/
│   │       └── welcome.blade.php
│   │
│   ├── routes/
│   │   ├── api.php
│   │   ├── web.php
│   │   └── console.php
│   │
│   ├── storage/
│   │   ├── app/
│   │   ├── framework/
│   │   └── logs/
│   │
│   ├── tests/
│   │   ├── Feature/
│   │   ├── Unit/
│   │   └── TestCase.php
│   │
│   ├── artisan
│   ├── composer.json
│   ├── composer.lock
│   ├── .env.example
│   ├── phpunit.xml
│   └── vite.config.js
│
├── frontend/                        # Interface / Front-end Vue.js
│   ├── public/
│   │   ├── favicon.svg
│   │   └── icons.svg
│   │
│   ├── src/
│   │   ├── assets/
│   │   │   ├── estetico.css
│   │   │   └── ...
│   │   │
│   │   ├── components/
│   │   │   └── HelloWorld.vue
│   │   │
│   │   ├── paginas/
│   │   │   ├── cadastro.vue
│   │   │   └── login.vue
│   │   │
│   │   ├── router/
│   │   │   └── index.js
│   │   │
│   │   ├── services/
│   │   │   └── api.js
│   │   │
│   │   ├── App.vue
│   │   ├── main.js
│   │   └── style.css
│   │
│   ├── index.html
│   ├── package.json
│   ├── package-lock.json
│   └── vite.config.js
│
├── README.md
│
└── .gitignore
```

## Localização dos Arquivos

* **Documentação:** `docs/requisitos/RF-002-cadastrar.md`
* **Back-end Laravel:** `backend/`
* **Controllers da API:** `backend/app/Http/Controllers/api/`
* **Autenticação:** `backend/app/Http/Controllers/api/AuthController.php`
* **Models:** `backend/app/Models/`
* **Migrations:** `backend/database/migrations/`
* **Seeders:** `backend/database/seeders/`
* **Rotas da API:** `backend/routes/api.php`
* **Rotas web:** `backend/routes/web.php`
* **Configurações do Laravel:** `backend/config/`
* **Testes automatizados:** `backend/tests/`
* **Ponto de entrada público do Laravel:** `backend/public/index.php`
* **Interface Vue.js:** `frontend/`
* **Páginas do front-end:** `frontend/src/paginas/`
* **Componentes Vue:** `frontend/src/components/`
* **Configuração das rotas Vue:** `frontend/src/router/`
* **Comunicação com a API:** `frontend/src/services/api.js`
* **Estilos:** `frontend/src/assets/` e `frontend/src/style.css`
* **Guia geral:** `README.md`

---


## 🔎 1. Identificação do Requisito

| 📌 Campo | 📄 Informação |
|---|---|
| **🆔 ID** | RF-002 |
| **📋 Título** | Tela de Cadastro de Usuários |
| **📂 Tipo** | Requisito Funcional |
| **🚨 Prioridade** | ALTA |
| **⚙️ Complexidade** | MÉDIA |
| **📊 Status** | CONCLUÍDO |
| **📅 Data de Criação** | 02/09/2026 |
| **🔄 Última Atualização** | 02/09/2026 |

### 📖 Descrição

O sistema deve permitir que novos usuários realizem seu cadastro por meio de uma tela específica, preenchendo os dados solicitados.

As informações fornecidas devem ser validadas pelo sistema antes da criação da conta. Após a validação, os dados devem ser armazenados de forma segura no banco de dados MySQL.

Quando o cadastro for concluído com sucesso, o usuário deverá receber uma confirmação visual e poderá utilizar suas credenciais para acessar a plataforma por meio da tela de login.

---

# 👥 2. Descrição e Atores

## 🎯 Objetivo

Descrever de forma clara o funcionamento do requisito de cadastro de usuários, identificando os atores envolvidos, suas responsabilidades e permissões dentro do processo.

## 💼 Benefícios para o Negócio

- 👤 Permitir que novos usuários tenham acesso à plataforma.
- 🔐 Possibilitar a criação de contas de forma segura.
- 📈 Aumentar a quantidade de usuários e interações na plataforma.
- ♿ Oferecer um processo de cadastro acessível e fácil de utilizar.
- 🗄️ Manter os dados dos usuários organizados no banco de dados.
- ✅ Garantir que somente informações válidas sejam utilizadas na criação das contas.

## 🌐 Contexto

O usuário não cadastrado acessa a opção **"Criar uma conta"** disponível na tela de login.

O sistema apresenta a tela de cadastro, na qual o usuário deve preencher os dados solicitados.

Após o preenchimento, o sistema realiza as validações necessárias, verifica as regras de negócio e confirma se já existe uma conta cadastrada com o mesmo e-mail.

Caso todas as validações sejam aprovadas, os dados são armazenados de forma segura no banco de dados e o cadastro é concluído.

Após o cadastro, o usuário recebe uma confirmação visual e é direcionado para a tela de login.

---

# 👥 Atores do Sistema

## 1. 👤 Usuário Não Cadastrado

**🎭 Tipo:** Ator Principal

**📌 Papel:**

É o usuário que ainda não possui uma conta na plataforma e deseja realizar seu cadastro.

**📋 Responsabilidades:**

- 🔗 Acessar a opção de criação de conta.
- ✍️ Preencher os dados solicitados.
- ✅ Fornecer informações válidas.
- 🖱️ Confirmar o cadastro.
- 🔄 Corrigir informações quando houver erros apontados pelo sistema.

### 🔐 Permissões CRUD

| ⚙️ Operação | 🔑 Permissão | 📄 Descrição |
|---|---|---|
| **CREATE** | ✅ | Criar sua própria conta |
| **READ** | ❌ | Não possui acesso aos dados de outros usuários durante o cadastro |
| **UPDATE** | ❌ | Não pode alterar contas de outros usuários |
| **DELETE** | ❌ | Não pode excluir contas de outros usuários |

---

## 2. 👨‍💼 Administrador

**🎭 Tipo:** Ator Secundário

**📌 Papel:**

Responsável pela administração e supervisão dos usuários da plataforma.

**📋 Responsabilidades:**

- 🗂️ Administrar os registros de usuários.
- 🔍 Consultar informações dos usuários.
- ✏️ Atualizar informações quando permitido.
- ⚙️ Executar ações administrativas relacionadas às contas.

### 🔐 Permissões CRUD

| ⚙️ Operação | 🔑 Permissão | 📄 Descrição |
|---|---|---|
| **CREATE** | ✅ | Criar registros de usuários, caso essa funcionalidade seja disponibilizada ao administrador |
| **READ** | ✅ | Consultar informações dos usuários |
| **UPDATE** | ✅ | Atualizar informações das contas |
| **DELETE** | ✅ | Excluir ou desativar contas conforme as permissões administrativas |

---

## 3. ⚙️ Sistema

**🎭 Tipo:** Ator Automático

**📌 Papel:**

Responsável por executar automaticamente as operações necessárias para validar e processar o cadastro.

**📋 Responsabilidades:**

- 🖥️ Apresentar a tela de cadastro.
- 🔎 Validar os campos preenchidos.
- 📋 Verificar campos obrigatórios.
- 🔤 Validar formatos das informações.
- 📧 Verificar se o e-mail já está cadastrado.
- 📏 Aplicar as regras de negócio.
- ⚙️ Processar os dados recebidos.
- 🔐 Proteger a senha utilizando hash seguro.
- 🗄️ Armazenar os dados no banco de dados.
- 💬 Informar o resultado do cadastro ao usuário.
- ⚠️ Apresentar mensagens de erro quando necessário.
- 🔄 Redirecionar o usuário para a tela de login após o cadastro.

### 🔐 Permissões CRUD

| ⚙️ Operação | 🔑 Permissão | 📄 Descrição |
|---|---|---|
| **CREATE** | ✅ | Criar o registro do novo usuário |
| **READ** | ✅ | Consultar informações necessárias para validação |
| **UPDATE** | ✅ | Atualizar informações durante o processamento, quando necessário |
| **DELETE** | ✅ | Impedir ou remover registros inválidos conforme as regras do sistema |

---

# 📋 3. Especificação de Casos de Uso

## 📝 UC-002 — Realizar Cadastro de Usuário

### 🎯 Objetivo

Permitir que um usuário não cadastrado crie uma nova conta na plataforma, desde que todas as informações necessárias sejam preenchidas corretamente e as regras de negócio sejam atendidas.

### 👥 Atores

- 👤 **Usuário Não Cadastrado** — inicia e realiza o cadastro.
- 👨‍💼 **Administrador** — possui responsabilidades administrativas relacionadas aos usuários.
- ⚙️ **Sistema** — realiza automaticamente as validações e o processamento do cadastro.

---

## 🔒 Pré-condições

Para que o caso de uso seja iniciado:

1. 🔑 O usuário deve estar na tela de login ou possuir acesso à opção de criação de conta.
2. 🟢 O sistema deve estar disponível.
3. 🗄️ O banco de dados deve estar disponível.
4. 📧 Não deve existir outra conta cadastrada com o mesmo e-mail.
5. ⚙️ Os serviços necessários para processamento do cadastro devem estar disponíveis.

---

## ✅ Pós-condições de Sucesso

Após a conclusão do cadastro:

1. 👤 Uma nova conta de usuário é criada.
2. ✅ Os dados fornecidos são validados.
3. 🔐 A senha é armazenada de forma segura.
4. 🗄️ O registro do usuário é criado no banco de dados.
5. 💬 O sistema apresenta uma confirmação visual.
6. 🔄 O usuário é direcionado para a tela de login.
7. 🔑 O usuário poderá utilizar suas credenciais para acessar a plataforma.

---

## ❌ Pós-condições de Falha

Caso o cadastro não seja concluído:

1. 🚫 A conta não deve ser criada.
2. 🛑 Dados inválidos não devem ser armazenados.
3. ⚠️ O sistema deve apresentar uma mensagem de erro.
4. 🔴 O campo que apresentar erro deve ser identificado visualmente quando aplicável.
5. 🔄 O usuário permanece na tela de cadastro para realizar as correções.
6. 🖥️ Em caso de falha no servidor ou banco de dados, o sistema deve informar que o cadastro não pôde ser concluído.

---

# 🔄 Fluxo Principal

| Nº | 👤 Ator | ⚙️ Ação |
|---|---|---|
| **1** | 👤 Usuário Não Cadastrado | Acessa a opção **"Criar uma conta"** na tela de login. |
| **2** | ⚙️ Sistema | Direciona o usuário para a tela de cadastro. |
| **3** | ⚙️ Sistema | Exibe o formulário com os campos necessários para o cadastro. |
| **4** | 👤 Usuário Não Cadastrado | Preenche os campos solicitados. |
| **5** | ⚙️ Sistema | Realiza a validação inicial dos campos preenchidos. |
| **6** | ⚙️ Sistema | Verifica se os campos obrigatórios foram preenchidos. |
| **7** | ⚙️ Sistema | Verifica se os dados possuem formatos válidos. |
| **8** | 👤 Usuário Não Cadastrado | Seleciona a opção **"Cadastrar"**. |
| **9** | ⚙️ Sistema | Realiza novamente as validações no servidor. |
| **10** | ⚙️ Sistema | Verifica se o e-mail informado já está cadastrado. |
| **11** | ⚙️ Sistema | Verifica as regras de negócio relacionadas ao cadastro. |
| **12** | ⚙️ Sistema | Processa os dados informados. |
| **13** | ⚙️ Sistema | Aplica hash seguro à senha antes do armazenamento. |
| **14** | ⚙️ Sistema | Armazena os dados do usuário no banco de dados. |
| **15** | ⚙️ Sistema | Confirma que o cadastro foi realizado com sucesso. |
| **16** | ⚙️ Sistema | Exibe a mensagem **"Cadastro realizado com sucesso!"**. |
| **17** | ⚙️ Sistema | Redireciona o usuário para a tela de login. |
| **18** | 👤 Usuário Não Cadastrado | Utiliza as credenciais cadastradas para realizar o login. |

---

# 🔀 Fluxos Alternativos

## A1 — ⚠️ Campos Obrigatórios Não Preenchidos

**Quando ocorre:**  
O usuário tenta realizar o cadastro sem preencher um ou mais campos obrigatórios.

**Fluxo:**

1. 🖱️ O usuário seleciona **"Cadastrar"**.
2. 🔎 O sistema identifica os campos obrigatórios não preenchidos.
3. 💬 O sistema informa visualmente quais campos precisam ser preenchidos.
4. 🚫 O cadastro não é realizado.
5. ✍️ O usuário preenche os campos necessários.
6. 🔄 O fluxo retorna para a validação do cadastro.

---

## A2 — 📧 E-mail Já Cadastrado

**Quando ocorre:**  
O usuário informa um e-mail que já possui uma conta cadastrada.

**Fluxo:**

1. 📤 O usuário envia o formulário.
2. 🔎 O sistema consulta o banco de dados.
3. ⚠️ O sistema identifica que o e-mail já está cadastrado.
4. 💬 O sistema apresenta uma mensagem informando que o e-mail já está em uso.
5. 🚫 O cadastro não é realizado.
6. 🔄 O usuário deve informar outro e-mail ou utilizar a opção de login.

---

## A3 — ❌ Dados Inválidos

**Quando ocorre:**  
Um ou mais dados fornecidos não atendem aos formatos ou critérios definidos pelo sistema.

**Fluxo:**

1. 🖱️ O usuário seleciona **"Cadastrar"**.
2. 🔎 O sistema realiza a validação.
3. ⚠️ O sistema identifica um ou mais dados inválidos.
4. 💬 O sistema apresenta uma mensagem de erro.
5. 🔴 O campo correspondente é identificado visualmente.
6. 🚫 O cadastro não é realizado.
7. ✏️ O usuário corrige os dados.
8. 🔄 O fluxo retorna para a validação.

---

## A4 — 🔐 Confirmação de Senha Diferente

**Quando ocorre:**  
A senha informada e a confirmação da senha não são iguais.

**Fluxo:**

1. 🔑 O usuário preenche a senha.
2. 🔁 O usuário preenche a confirmação da senha.
3. ⚙️ O sistema compara os dois valores.
4. ⚠️ O sistema identifica a divergência.
5. 💬 O sistema apresenta uma mensagem de erro.
6. 🚫 O cadastro não é realizado.
7. ✏️ O usuário corrige a confirmação da senha.

---

## A5 — 🌐 Falha de Conexão ou Servidor

**Quando ocorre:**  
O sistema não consegue acessar o servidor ou o banco de dados durante o processo de cadastro.

**Fluxo:**

1. 📤 O usuário envia o formulário.
2. ⚙️ O sistema tenta processar o cadastro.
3. ❌ Ocorre uma falha de conexão ou processamento.
4. 🚫 O sistema não cria a conta.
5. 💬 O sistema apresenta uma mensagem informando que não foi possível concluir o cadastro.
6. 🔄 O usuário permanece na tela de cadastro.
7. 🔁 O usuário poderá tentar novamente posteriormente.

---

### 📋 Regras de Negócio (RN)

| ID | Regra | Descrição |
|:---:|:---|:---|
| **RN-01** | E-mail Único | O e-mail deve ser único no sistema; não permitir o cadastro de contas duplicadas |
| **RN-02** | Campos Obrigatórios | Todos os campos definidos como obrigatórios devem ser preenchidos antes da conclusão do cadastro |
| **RN-03** | E-mail Válido | O e-mail informado deve possuir um formato válido |
| **RN-04** | Senha Obrigatória | O usuário deve informar uma senha para concluir o cadastro |
| **RN-05** | Confirmação de Senha | A senha e sua confirmação devem ser iguais para permitir a criação da conta |
| **RN-06** | Segurança da Senha | A senha não deve ser armazenada em texto puro; deve ser protegida utilizando hash seguro |
| **RN-07** | Validação dos Dados | Todos os dados fornecidos devem ser validados antes da criação da conta |
| **RN-08** | Cadastro Após Validação | A conta somente deve ser criada quando todas as validações obrigatórias forem concluídas com sucesso |
| **RN-09** | Feedback do Cadastro | O sistema deve informar visualmente ao usuário se o cadastro foi realizado com sucesso ou se ocorreu algum erro |
| **RN-10** | Acessibilidade | As informações essenciais do cadastro não devem depender exclusivamente de áudio para serem compreendidas |
| **RN-11** | Acesso à Plataforma | Após o cadastro realizado com sucesso, o usuário deve poder utilizar suas credenciais para acessar a plataforma |
| **RN-12** | Integridade dos Dados | O sistema deve impedir que informações inválidas sejam armazenadas como dados válidos de uma conta |

### ⚙️ Requisitos Não-Funcionais (RNF)

| ID | Atributo | Requisito | Métrica | Justificativa |
|:---:|:---|:---|:---|:---|
| **RNF-01** | Segurança | Senhas devem ser armazenadas utilizando hash seguro, não sendo permitida sua gravação em texto puro | Senhas armazenadas sem texto puro | 🔐 Proteger as credenciais dos usuários |
| **RNF-02** | Segurança | A comunicação entre cliente e servidor deve utilizar HTTPS | Comunicação realizada via HTTPS | 🛡️ Proteger os dados transmitidos |
| **RNF-03** | Performance | O processo de cadastro deve apresentar resposta em até aproximadamente 2 segundos em condições normais | Tempo de resposta ≤ 2 segundos | ⚡ Evitar que o usuário fique esperando |
| **RNF-04** | Acessibilidade | Mensagens de sucesso, erro e validação devem ser apresentadas visualmente | Mensagens visuais disponíveis | ♿ Garantir que informações importantes não dependam exclusivamente de áudio |
| **RNF-05** | Acessibilidade | Orientações importantes devem possuir suporte visual compatível com Libras, quando aplicável | Recursos visuais disponíveis quando necessários | 🤟 Facilitar o acesso de pessoas surdas às informações |
| **RNF-06** | Acessibilidade | Os elementos da tela de cadastro devem permitir navegação e interação por teclado | Elementos acessíveis via teclado | ⌨️ Facilitar a utilização por diferentes usuários |
| **RNF-07** | Usabilidade | Os campos do formulário devem possuir identificação clara e persistente | Campos identificados corretamente | 🏷️ Facilitar a compreensão e o preenchimento do formulário |
| **RNF-08** | Usabilidade | O sistema deve apresentar feedback visual durante validações, erros, processamento e conclusão do cadastro | Feedback visual nas principais ações | 💬 Informar ao usuário o estado da operação |
| **RNF-09** | Responsividade | A tela de cadastro deve adaptar-se a computadores, notebooks, tablets e smartphones | Interface adaptável a diferentes resoluções | 📱 Garantir uma boa experiência em diferentes dispositivos |
| **RNF-10** | Acessibilidade | Textos, campos, botões e elementos importantes devem possuir contraste visual adequado | Contraste adequado entre elementos | 👁️ Facilitar a leitura e identificação dos elementos da interface |
## 🎨 4. PROTÓTIPO FUNCIONAL (HTML + CSS + PHP + MySQL + RENDER)
**Mockup - Tela 1: Formulário Vazio (Estado Inicial)**
```
┌─────────────────────────────────────────────────────────────┐
│                                                             │
│  🤟 Librando                                               │
│                                                             │
│  Faça parte da                                              │
│  comunidade                                                 │
│  Librando.                                                  │
│                                                             │
│  Crie sua conta e comece a contribuir com conteúdo em       │
│  Libras e aprendizado compartilhado.                        │
│                                                             │
│                         ┌──────────────────────────────┐    │
│                         │ Criar conta                  │    │
│                         │ Preencha os dados abaixo...  │    │
│                         │                              │    │
│                         │ Nome completo                │    │
│                         │ [ Digite seu nome         ]  │    │
│                         │                              │    │
│                         │ E-mail                       │    │
│                         │ [ Digite seu e-mail       ]  │    │
│                         │                              │    │
│                         │ Nome de usuário              │    │
│                         │ [ Escolha um nome...      ]  │    │
│                         │                              │    │
│                         │ Data de nascimento           │    │
│                         │ [ __/__/____              ]  │    │
│                         │                              │    │
│                         │ Senha                        │    │
│                         │ [ Crie uma senha          ]  │    │
│                         │ A senha precisa ter ao       │    │
│                         │ menos 6 caracteres.          │    │
│                         │                              │    │
│                         │ Confirmar senha              │    │
│                         │ [ Repita a senha          ]  │    │
│                         │ [ ] Mostrar                  │    │
│                         │                              │    │
│                         │ [       Cadastrar        ]  │     │
│                         │                              │    │
│                         │ Já possui uma conta? Entrar  │    │
│                         └──────────────────────────────┘    │
│                                                             │
└─────────────────────────────────────────────────────────────┘
```

**Tela 2: Formulário Preenchido (Validação Visual)**

```
┌─────────────────────────────────────────────────────────────┐
│                                                             │
│  🤟 Librando                                               │
│                                                             │
│  Faça parte da                                              │
│  comunidade                                                 │
│  Librando.                                                  │
│                                                             │
│  Crie sua conta e comece a contribuir com conteúdo em       │
│  Libras e aprendizado compartilhado.                        │
│                                                             │
│                         ┌──────────────────────────────┐    │
│                         │ Criar conta                  │    │
│                         │ Preencha os dados abaixo...  │    │
│                         │                              │    │
│                         │ Nome completo                │    │
│                         │ [ João da Silva         ] ✅ │    │
│                         │                              │    │
│                         │ E-mail                       │    │
│                         │ [ usuario@email.com     ] ✅ │    │
│                         │                              │    │
│                         │ Nome de usuário              │    │
│                         │ [ cachorro_ovudo      ]   ✅ │    │
│                         │                              │    │
│                         │ Data de nascimento           │    │
│                         │ [ 16__/11__/__2005__      ✅ │    │
│                         │                              │    │
│                         │ Senha                        │    │
│                         │ [ ••••••••••••          ] ✅ │    │
│                         │ A senha precisa ter ao       │    │
│                         │ menos 6 caracteres.          │    │
│                         │                              │    │
│                         │ Confirmar senha              │    │
│                         │ [ ••••••••••••          ] ✅ │    │
│                         │ [ ] Mostrar                  │    │
│                         │                              │    │
│                         │ [       Cadastrar        ]   │    │
│                         │                              │    │
│                         │ Já possui uma conta? Entrar  │    │
│                         └──────────────────────────────┘    │
│                                                             │
└─────────────────────────────────────────────────────────────┘
```


**Tela 3: Erro de Validação (Senha Inválida / Não Coincide)**
```
┌─────────────────────────────────────────────────────────────┐
│                                                             │
│  🤟 Librando                                               │
│                                                             │
│  Faça parte da                                              │
│  comunidade                                                 │
│  Librando.                                                  │
│                                                             │
│  Crie sua conta e comece a contribuir com conteúdo em       │
│  Libras e aprendizado compartilhado.                        │
│                                                             │
│                         ┌──────────────────────────────┐    │
│                         │ Criar conta                  │    │
│                         │ Preencha os dados abaixo...  │    │
│                         │                              │    │
│                         │ Nome completo                │    │
│                         │ [ João da Silva         ] ✅ │    │
│                         │                              │    │
│                         │ E-mail                       │    │
│                         │ [ usuario@email.com     ] ✅ │    │
│                         │                              │    │
│                         │ Nome de usuário              │    │
│                         │ [ cachorro_ovudo      ]   ✅ │    │
│                         │                              │    │
│                         │ Data de nascimento           │    │
│                         │ [ 16__/11__/__2005__      ✅ │    │
│                         │                              │    │
│                         │ Senha                        │    │
│                         │ [ ••••••••••••          ] ❌ │    │
│                         │ A senha precisa ter ao       │    │
│                         │ menos 6 caracteres.          │    │
│                         │                              │    │
│                         │ Confirmar senha              │    │
│                         │ [ ••••••••••••          ] ❌ │    │
│                         │ [ ] Mostrar                  │    │
│                         │                              │    │
│                         │ [       Cadastrar        ]   │    │
│                         │                              │    │
│                         │ Já possui uma conta? Entrar  │    │
│                         └──────────────────────────────┘    │
│                                                             │
└─────────────────────────────────────────────────────────────┘
```


**Descrição de Estados:**
- **Estado Normal:** Todos campos em branco, botões habilitados
- **Estado Preenchido:** Validação visual com checkmark verde
- **Estado Erro:** Campo inválido destacado em vermelho com mensagem

## Fluxo de Navegação

O fluxo funciona da seguinte maneira:

1. O usuário acessa a **Tela de Cadastro**.

2. O usuário preenche os seguintes dados:

   * **Nome**;
   * **E-mail**;
   * **Nome de usuário**;
   * **Data de nascimento**;
   * **Senha**;
   * **Confirmação de senha**.

3. O usuário seleciona o botão **CADASTRAR**.

4. O sistema realiza as validações iniciais dos dados preenchidos. Caso existam campos obrigatórios não preenchidos ou as senhas não coincidam, o usuário permanece na tela e recebe uma mensagem de erro.

5. Se as validações iniciais forem bem-sucedidas, o **frontend Vue** envia os dados para o **back-end Laravel** por meio de uma requisição `POST` para a rota `/api/cadastro`.

6. O **back-end Laravel** recebe os dados e realiza as validações necessárias, verificando:

   * Se os campos obrigatórios foram preenchidos;
   * Se o e-mail possui formato válido;
   * Se a senha possui no mínimo 6 caracteres;
   * Se a confirmação de senha corresponde à senha informada;
   * Se o e-mail ainda não está cadastrado;
   * Se o nome de usuário ainda não está cadastrado.

7. Caso algum dado seja inválido ou o e-mail/nome de usuário já esteja cadastrado, o back-end retorna uma mensagem de erro. O usuário permanece na **Tela de Cadastro** para corrigir as informações.

8. Caso todos os dados sejam válidos, o back-end aplica o **hash na senha** utilizando o mecanismo de hash do Laravel.

9. O sistema insere os dados do novo usuário na tabela `usuarios` do banco de dados **MySQL**.

10. Após o cadastro ser realizado com sucesso, o back-end retorna uma resposta de confirmação para o frontend.

11. O sistema exibe a mensagem **"Cadastro realizado com sucesso!"** e redireciona o usuário para a **Tela de Login**.

12. Na Tela de Login, o usuário poderá informar seu **e-mail e senha** para realizar a autenticação.

13. Caso o usuário selecione a opção **FAÇA LOGIN** na Tela de Cadastro, ele será direcionado diretamente para a Tela de Login, sem submeter o formulário de cadastro.


**Responsividade:**
- **Mobile (até 980px):** Layout single-column, campos full-width
- **Tablet (até 980px):** Layout single-column com padding maior
- **Desktop (980px+):** Layout potencialmente two-column se apropriado

## 🏗️ 5. ARQUITETURA E ADR
#### Exemplo Prático — RF-001: Arquitetura Completa

### Diagrama de Componentes
```text
┌─────────────────────────┐
│       FRONTEND          │
│ Vue.js 3 + Vite         │
│ Vue Router + Axios      │
└────────────┬────────────┘
             │ HTTP/JSON
             ▼
┌─────────────────────────┐
│        BACKEND          │
│ PHP + Laravel 12        │
│ AuthController          │
│ Sanctum                 │
└────────────┬────────────┘
             │ Eloquent ORM
             ▼
┌─────────────────────────┐
│      BANCO DE DADOS     │
│         MySQL           │
│     Tabela `usuarios`   │
└─────────────────────────┘
```

ADR-001 — Escolha do banco de dados

Status: Aceito

Contexto:
A aplicação necessita armazenar dados estruturados de usuários com garantia de integridade relacional, suporte transacional ACID e unicidade de e-mail.

Decisão:
Adotar o MySQL gerenciado por meio de migrations nativas do Laravel

Motivo:
O projeto exige um sistema de gerenciamento de banco de dados confiável, com alto desempenho para operações de leitura e escrita simples, além de ampla compatibilidade com o ecossistema PHP/Laravel. O MySQL foi escolhido por ser o padrão de mercado para aplicações Web relacionais, oferecendo excelente suporte a restrições de unicidade (como e-mails únicos) e suporte nativo completo pelo Eloquent ORM sem a necessidade de drivers adicionais complexos.

Consequências:
+ Integração simples e eficiente com o Eloquent ORM.
+ Aplicação de integridade de dados e índice único diretamente na tabela de usuarios ($table->string('email')->unique()).  
- Exige um servidor de banco de dados relacional MySQL configurado no ambiente.

ADR-002: Escolha do Back-end

Status: Aceito

Contexto:
Necessidade de construir uma API RESTful para cadastro e autenticação de usuários, capaz de aplicar validação server-side rígida e hashing seguro de senhas.

Decisão:
Adotar o Laravel 12 (PHP 8.2+) utilizando controladores de API.

Motivo:
O Laravel 12 foi escolhido por ser um framework maduro que simplifica a criação de APIs RESTful estruturadas. Ele oferece ferramentas nativas para validação robusta de dados no servidor (`Validator::make`), integração transparente com ORM (Eloquent) e recursos de criptografia segura (`Hash::make`) sem a necessidade de dependências de terceiros, garantindo alta produtividade, manutenibilidade e segurança[cite: 2].
* **Decisão:** Adotar o **Laravel 12 (PHP 8.2+)** utilizando controladores de API .

Consequências:
+ Validação declarativa com o uso de `Validator::make()`[cite: 2].
+ Criptografia segura nativa com `Hash::make()` para o armazenamento de senhas[cite: 2].
+ Requer ambiente PHP configurado na máquina/servidor.

### Tecnologias Escolhidas

| Camada | Tecnologia | Versão | Justificativa |
|--------|-----------|--------|---------------|
| Frontend | Vue.js 3 | 3.x | 3.x	Construção da interface reativa e gerenciamento dos estados do formulário |
| Roteamento | Vue Router | 4.x | Navegação entre as telas da SPA (ex: cadastro e login) sem recarregar a página |
| Cliente HTTP | Axios | 1.x | Realização de requisições assíncronas (POST) para a API backend |
| Build Tool | Vite | 5.x | Ferramenta de build rápida e servidor de desenvolvimento para o frontend Vue |
| Backend | Laravel | 12.x | Framework PHP para a criação da API RESTful, gerenciamento de rotas e validações |
| Linguagem Backend | PHP | 8.2+ | Linguagem base para execução do framework Laravel e processamento da API |
| ORM / Conexão BD | Eloquent ORM (PDO) | Laravel 12 | Abstração do banco de dados e prevenção nativa contra SQL Injection via Prepared Statements |
| Banco de Dados | MySQL | 8.x | Armazenamento relacional dos usuários, garantindo integridade e e-mails únicos |
| Hash / Segurança | Bcrypt (Hash::make)| PHP / Laravel | Criptografia irreversível e segura para o armazenamento das senhas no banco |

## 🔒 6. VALIDAÇÃO DE SEGURANÇA OWASP

VALIDAÇÂO DE SEGURANÇA OWASP

Foram analisadas as principais vulnerabilidades aplicáveis ao sistema, tomando como referência as recomendações da OWASP.

- SQL Injection: Utilização do Eloquent ORM com consultas preparadas (*Prepared Statements* via PDO) na persistência de dados.
- Armazenamento de senhas: Utilização de `Hash::make()` (Bcrypt) para criptografia irreversível das senhas antes do salvamento no banco.
- XSS (Cross-Site Scripting): Tratamento e interpolação segura de dados exibidos pelo Vue.js, além de validação e sanitização das entradas no back-end.
- Autenticação: Validação rígida de credenciais e campos obrigatórios realizada no back-end pelo `Validator` do Laravel.
- Controle de acesso: Validação de permissões e rotas de API no servidor antes de disponibilizar ou alterar recursos protegidos.
- Gerenciamento de sessão: Utilização de mecanismos seguros de autenticação gerenciados pelo back-end Laravel.
- Validação de entrada: Todos os dados recebidos do usuário (nome, e-mail, senha) são validados no back-end com regras declarativas de formato e unicidade.

## 📚 7. DOCUMENTAÇÃO API (SWAGGER/OPENAPI)

**Objetivo:** Documentar endpoints REST da API usando Swagger/OpenAPI.

#### Exemplo Prático — RF-002: Documentação Swagger

**Arquivo:** `docs/api/swagger.json`

```json
{
  "openapi": "3.0.0",
  "info": {
    "title": "Sistema Web API",
    "version": "1.0.0"
  },
  "paths": {
    "/api/cadastrar": {
      "post": {
        "summary": "Realizar cadastro",
        "requestBody": {
          "required": true,
          "content": {
            "application/json": {
              "schema": {
                "type": "object",
                "required": ["nome", "email", "senha"],
                "properties": {
                  "nome": {
                    "type": "string",
                    "example": "João da Silva"
                  },
                  "email": {
                    "type": "string",
                    "example": "joao.silva@email.com"
                  },
                  "senha": {
                    "type": "string",
                    "example": "123456"
                  }
                }
              }
            }
          }
        },
        "responses": {
          "201": {
            "description": "Usuário cadastrado com sucesso"
          },
          "400": {
            "description": "Dados inválidos"
          },
          "422": {
            "description": "E-mail já cadastrado ou validação falhou"
          },
          "500": {
            "description": "Erro interno do servidor"
          }
        }
      }
    }
  }
}
```

**Para visualizar a documentação:**
O arquivo `swagger.json` pode ser aberto em uma ferramenta compatível com **Swagger UI**, permitindo visualizar os endpoints, parâmetros, respostas e códigos HTTP da API.

**Endpoints documentados:**

* `POST /api/cadastrar` — Realizar Cadastro de novo usuário.

**Autenticação:**

* O usuário envia nome, e-mail e senha.
* O backend Laravel valida a unicidade do e-mail no banco de dados.
* A senha é criptografada de forma segura utilizando Hash::make() (Bcrypt).
* Em caso de sucesso, o registro do usuário é criado com o retorno do status HTTP 201.
