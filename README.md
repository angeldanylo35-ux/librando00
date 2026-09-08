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

* **LINK_REPOSITORIO_GITHUB:** `https://github.com/[seu-usuario]/[seu-repositorio]`
* **BRANCH_PRINCIPAL:** `main`
* **LINK_APLICACAO_DEPLOY:** Aplicação executada localmente por meio do XAMPP.
* **LINK_BANCO_DADOS:** Banco de dados MySQL local.
* **LINK_API_SWAGGER:** Não se aplica nesta etapa do projeto.
* **LINK_DEMONSTRAÇÃO:** Aplicação executada localmente em `(https://librando.onrender.com)`

---

# 2. ESTRUTURA DE DIRETÓRIOS DO PROJETO

```text
librando/
│
├── docs/
│   └── requisitos/
│       └── RF-001-login.md
│
├── src/
│   └── rf-001-login/
│       ├── index.html
│       ├── login.php
│       ├── conexao.php
│       └── README.md
│
├── database/
│   ├── ddl/
│   │   └── rf-001-usuarios-ddl.sql
│   │
│   └── seeds/
│       └── usuarios-seeds.sql
│
├── .github/
│   └── workflows/
│
├── README.md
│
└── .gitignore
```

## Localização dos Arquivos

* **Documentação:** `docs/requisitos/RF-001-login.md`
* **Página de login:** `src/rf-001-login/index.html`
* **Estilos CSS:** `src/rf-001-login/index.html`
* **Processamento do login:** `src/rf-001-login/login.php`
* **Conexão com o banco:** `src/rf-001-login/conexao.php`
* **Script de criação do banco:** `database/ddl/rf-001-usuarios-ddl.sql`
* **Dados de teste:** `database/seeds/usuarios-seeds.sql`
* **Guia geral:** `README.md`

---

# 3. DETALHAMENTO TÉCNICO DE UM REQUISITO FUNCIONAL

## 🎯 1. IDENTIFICAÇÃO DO REQUISITO

* **ID:** RF-001

* **Título:** Tela de Login da Rede Social

* **Tipo:** Requisito Funcional

* **Prioridade:** ALTA

* **Complexidade:** MÉDIA

* **Status:** EM DESENVOLVIMENTO

* **Data de Criação:** [preencher]

* **Última Atualização:** [preencher]

* **Breve Descrição:**
  O sistema deve permitir que usuários previamente cadastrados realizem login na plataforma Librando por meio de e-mail e senha. As credenciais devem ser verificadas pelo backend PHP utilizando o banco de dados MySQL.

---

# 📋 2.  DESCRIÇÃO E ATORES — RF: Tela de Login da Rede Social

## **Descrição Detalhada**

### **Por que este requisito existe?**

A rede social precisa disponibilizar um mecanismo de autenticação que permita aos usuários cadastrados acessar a plataforma de forma **segura, simples e acessível**.

A tela de login existe para:

- 🔐 **Garantir a segurança do acesso**, permitindo que somente usuários autorizados entrem na plataforma;
- 👤 **Identificar e autenticar os usuários cadastrados**, verificando e-mail, senha, situação da conta e permissão de acesso;
- ♿ **Garantir acessibilidade**, disponibilizando recursos visuais e suporte à comunicação em Libras;
- 🔑 **Permitir recuperação de senha**, possibilitando que usuários que esqueceram suas credenciais recuperem o acesso à conta;
- 📝 **Permitir a criação de novas contas**, possibilitando que novos usuários ingressem na rede social;
- 🛡️ **Proteger as contas dos usuários**, utilizando sessão segura, proteção contra tentativas excessivas e armazenamento seguro das senhas.

## **Contexto do Negócio**

A aplicação é uma **rede social acessível voltada para pessoas surdas**, na qual os usuários precisam realizar autenticação para acessar a plataforma.

A tela de login deve permitir que um usuário cadastrado informe seu **e-mail e senha**. O sistema valida os campos, verifica as credenciais, verifica se a conta está ativa e se o usuário possui permissão de acesso.

Quando a autenticação é válida, o sistema cria uma sessão segura e direciona o usuário para a página principal da rede social. Caso as credenciais sejam inválidas, a conta esteja desativada ou ocorram outras situações previstas, o acesso deve ser impedido e o usuário deve receber um feedback visual.

## 👥 Atores do Sistema

### 1. 👤 USUÁRIO CADASTRADO — Ator Principal

**Papel:**  
Realizar a autenticação para acessar a rede social.

**Responsabilidade:**

O usuário cadastrado é responsável por informar suas próprias credenciais de acesso e utilizar os recursos disponibilizados pela tela de login.

Pode:

- Informar o e-mail cadastrado;
- Informar a senha;
- Solicitar o login;
- Visualizar ou ocultar a senha;
- Solicitar recuperação de senha;
- Encerrar sua sessão por meio do logout.

**Permissões:**

| Operação | Permissão | Justificativa |
|---|:---:|---|
| **CREATE** | ⚠️ | Não especificado para o usuário cadastrado na tela de login. |
| **READ** | ✅ | Pode utilizar as informações e recursos necessários para sua autenticação. |
| **UPDATE** | ⚠️ | Pode redefinir a senha durante o processo de recuperação. |
| **DELETE** | ❌ | Não existe requisito para exclusão de conta na tela de login. |

---

### 2. 👤 USUÁRIO NÃO CADASTRADO — Ator Secundário

**Papel:**  
Iniciar o processo de criação de uma conta para obter acesso à rede social.

**Responsabilidade:**

O usuário não cadastrado ainda não possui uma conta na plataforma. Portanto, **não pode realizar login nem recuperar uma senha de uma conta inexistente**.

A partir da tela de login, pode selecionar a opção **"Criar uma conta"** e ser direcionado para o formulário de cadastro.

**Permissões:**

| Operação | Permissão | Justificativa |
|---|:---:|---|
| **CREATE** | ✅ | Pode iniciar o processo de criação de uma nova conta. |
| **READ** | ⚠️ | Pode acessar informações e orientações disponíveis na tela de login. |
| **UPDATE** | ❌ | Ainda não possui uma conta para alterar. |
| **DELETE** | ❌ | Não possui uma conta cadastrada para excluir. |


### 3. ⚙️ SISTEMA — Ator Automático

**Papel:**  
Executar automaticamente as operações necessárias para realizar a autenticação, garantir a segurança do acesso e controlar a sessão dos usuários da rede social.

**Responsabilidade:**

O sistema é responsável por processar as informações fornecidas pelo usuário durante o login e aplicar as regras definidas para permitir ou impedir o acesso à rede social.

Durante o processo de autenticação, o sistema deve:

- Validar os campos de e-mail e senha;
- Verificar se os campos obrigatórios foram preenchidos;
- Validar o formato do e-mail;
- Verificar se o e-mail informado está cadastrado;
- Verificar se a senha corresponde à conta;
- Verificar se a conta está ativa;
- Verificar se o usuário possui permissão de acesso;
- Impedir o acesso com credenciais inválidas;
- Impedir o acesso quando a conta estiver desativada;
- Controlar tentativas excessivas de login;
- Apresentar mensagens de feedback ao usuário em caso de erro;
- Criar uma sessão segura após uma autenticação válida;
- Redirecionar o usuário autenticado para a página principal da rede social;
- Permitir o encerramento da sessão por meio do logout;
- Participar do processo de recuperação e redefinição de senha;
- Armazenar as senhas utilizando mecanismo de hash seguro;
- Utilizar comunicação segura por meio de HTTPS.

**Permissões:**

| Operação | Permissão | Justificativa |
|---|:---:|---|
| **CREATE** | ✅ | Cria uma sessão segura após a autenticação válida do usuário. |
| **READ** | ✅ | Consulta as informações necessárias para validar e autenticar o usuário. |
| **UPDATE** | ✅ | Participa do processo de redefinição da senha durante a recuperação. |
| **DELETE** | ✅ | Encerra a sessão do usuário durante o logout. |

**Regras de Segurança:**

O sistema deve garantir que:

- As senhas não sejam armazenadas em texto puro;
- As senhas sejam protegidas por mecanismo de hash seguro;
- A comunicação entre usuário e sistema seja protegida por HTTPS;
- Tentativas excessivas de login sejam controladas;
- Usuários com contas desativadas não consigam acessar a rede social;
- Credenciais inválidas não permitam o acesso à plataforma.


### 4. 👨‍💼 ADMINISTRADOR — Ator Secundário

**Papel:**  
Realizar o login e acessar as funcionalidades administrativas da rede social.

**Responsabilidade:**

O administrador possui uma conta cadastrada na plataforma e utiliza o mesmo processo de autenticação dos demais usuários. A diferença está nas permissões concedidas após a autenticação.

Durante o login, o administrador deve:

- Informar o e-mail cadastrado;
- Informar a senha;
- Solicitar o login;
- Ter suas credenciais validadas pelo sistema;
- Ter o status da conta verificado;
- Ter seu perfil de administrador identificado pelo sistema;
- Acessar a área administrativa após uma autenticação válida.

Após o login, o administrador poderá realizar atividades específicas de gerenciamento da plataforma, de acordo com suas permissões, como:

- Gerenciar usuários;
- Visualizar informações dos usuários;
- Gerenciar ou desativar contas;
- Moderar conteúdos publicados na rede social;
- Analisar denúncias;
- Aplicar medidas administrativas previstas pelo sistema.

**Permissões — CRUD:**

| Operação | Permissão | Justificativa |
|---|:---:|---|
| **CREATE** | ✅ | Pode realizar operações administrativas que envolvam a criação de registros, quando previstas pelo sistema. |
| **READ** | ✅ | Pode consultar informações necessárias para administração e moderação da plataforma. |
| **UPDATE** | ✅ | Pode alterar informações ou status de usuários e conteúdos conforme suas permissões administrativas. |
| **DELETE** | ✅ | Pode excluir ou remover registros e conteúdos quando essa ação estiver prevista para a administração da plataforma. |
Não aplicável nesta etapa |


# 🔄 3. ESPECIFICAÇÃO DE CASOS DE USO + REQUISITOS NÃO-FUNCIONAIS

## 📌 Objetivo

Descrever detalhadamente como o requisito **RF — Tela de Login da Rede Social** será executado, especificando o caso de uso, pré-condições, pós-condições, fluxo principal, fluxos alternativos, regras de negócio e requisitos não-funcionais.

A especificação foi elaborada com base nos requisitos definidos para a tela de login, considerando autenticação, acessibilidade, segurança e usabilidade.

## 📋 Caso de Uso

### UC-001 — Realizar Login

**Requisito Funcional:** RF — Tela de Login da Rede Social

### Atores Envolvidos

- 👤 **Usuário Cadastrado** — Ator Principal
- 👨‍💼 **Administrador** — Ator Secundário
- ⚙️ **Sistema** — Ator Automático

## 🔹 Pré-Condições

- O usuário deve possuir uma conta cadastrada;
- O usuário deve possuir e-mail e senha cadastrados;
- A conta deve estar ativa;
- O sistema deve estar disponível;
- O banco de dados deve estar acessível;
- O usuário deve estar na tela de login.

## 🔹 Pós-Condições

### ✅ Sucesso

- Credenciais são validadas;
- Conta do usuário é identificada;
- Status da conta é verificado;
- Permissão de acesso é verificada;
- Perfil do usuário é identificado;
- Usuário é autenticado;
- Uma sessão segura é criada;
- O acesso pode ser registrado;
- Usuário é direcionado para a página principal da rede social.

### ❌ Falha

- Usuário não é autenticado;
- Sessão não é criada;
- Acesso à plataforma é impedido;
- Sistema apresenta feedback visual;
- Usuário permanece na tela de login;
- Quando aplicável, a tentativa pode ser registrada.

## 🔄 Fluxo Principal

1. Usuário cadastrado acessa a tela de login.
2. Sistema apresenta o campo de **E-mail**.
3. Sistema apresenta o campo de **Senha**.
4. Usuário informa seu e-mail cadastrado.
5. Sistema valida o preenchimento e o formato do e-mail.
6. Usuário informa sua senha.
7. Sistema mantém a senha oculta por padrão.
8. Usuário seleciona o botão **"Entrar"**.
9. Sistema valida os campos obrigatórios.
10. Sistema envia as credenciais ao servidor.
11. Sistema verifica se o e-mail está cadastrado.
12. Sistema verifica se a senha corresponde à conta.
13. Sistema verifica se a conta está ativa.
14. Sistema verifica se o usuário possui permissão de acesso.
15. Sistema autentica o usuário.
16. Sistema cria uma sessão segura.
17. Sistema registra o acesso quando aplicável.
18. Sistema redireciona o usuário para a página principal da rede social.
19. Usuário acessa a plataforma de acordo com suas permissões.
20. Caso o usuário seja Administrador, o sistema disponibiliza as funcionalidades permitidas para seu perfil.

# 🔀 Fluxos Alternativos

## A1 — Credenciais inválidas

1. Sistema identifica que o e-mail ou senha informados estão incorretos.
2. Sistema impede o acesso.
3. Sistema não cria uma sessão.
4. Sistema apresenta uma mensagem visual de erro.
5. Usuário permanece na tela de login.
6. Usuário pode corrigir os dados e realizar uma nova tentativa.

## A2 — Conta inexistente

1. Sistema verifica que não existe uma conta associada ao e-mail informado.
2. Sistema impede a realização do login.
3. Sistema não cria uma sessão.
4. Sistema apresenta uma mensagem informando que o login não pôde ser realizado.
5. Sistema disponibiliza um caminho para **"Criar uma conta"**.
6. Usuário pode iniciar o processo de cadastro.

## A3 — Conta desativada

1. Sistema identifica que a conta associada ao e-mail está desativada.
2. Sistema impede o acesso.
3. Sistema não cria uma sessão.
4. Sistema apresenta uma orientação visual sobre a situação da conta.
5. Sistema orienta o usuário a solicitar suporte, quando aplicável.

## A4 — Campos obrigatórios inválidos ou vazios

1. Usuário tenta realizar o login.
2. Sistema verifica os campos obrigatórios.
3. Sistema identifica que o e-mail ou senha está vazio ou inválido.
4. Sistema destaca visualmente o campo que apresenta erro.
5. Sistema apresenta uma mensagem de orientação.
6. Usuário corrige os dados.
7. Sistema realiza novamente a validação.

## A5 — Recuperação de senha

1. Usuário cadastrado seleciona **"Esqueci minha senha"**.
2. Sistema direciona para a tela de recuperação de senha.
3. Usuário informa o e-mail associado à conta.
4. Sistema verifica o e-mail informado.
5. Sistema inicia o processo de recuperação.
6. Usuário recebe as instruções para redefinição.
7. Usuário define uma nova senha.
8. Sistema confirma a alteração.
9. Usuário retorna à tela de login.

## A6 — Falha de conexão

1. Sistema tenta enviar as credenciais ao servidor.
2. Sistema identifica uma falha de comunicação.
3. Sistema não consegue concluir a autenticação.
4. Sistema não cria uma sessão.
5. Sistema apresenta feedback visual informando a indisponibilidade temporária.
6. Usuário pode tentar novamente posteriormente.

# 📋 Regras de Negócio (RN)

| ID | Regra | Descrição |
|:---:|:---|:---|
| **RN-001** | Usuário Cadastrado | Somente usuários cadastrados podem realizar login. |
| **RN-002** | Credenciais | O usuário deve informar e-mail e senha válidos. |
| **RN-003** | Conta Ativa | Usuários com conta desativada não podem acessar a plataforma. |
| **RN-004** | Redirecionamento | Após uma autenticação válida, o usuário deve ser direcionado à área principal. |
| **RN-005** | Credenciais Inválidas | Credenciais inválidas não devem permitir o acesso. |
| **RN-006** | Senha | A senha nunca deve ser armazenada em texto puro. |
| **RN-007** | Feedback Visual | O sistema deve fornecer feedback visual para erros e operações realizadas. |
| **RN-008** | Recuperação de Senha | O usuário deve poder recuperar sua senha. |
| **RN-009** | Criação de Conta | O usuário deve poder iniciar o processo de criação de uma nova conta. |
| **RN-010** | Acessibilidade | Recursos essenciais devem ser acessíveis sem depender exclusivamente de áudio. |

# ⚙️ Requisitos Não-Funcionais (RNF)

## 🔐 Segurança

| ID | Requisito | Descrição |
|:---:|:---|:---|
| **RS-LOGIN-001** | Proteção das Senhas | As senhas não devem ser armazenadas em texto puro e devem utilizar mecanismo seguro de hash. |
| **RS-LOGIN-002** | Comunicação Segura | As credenciais devem ser transmitidas utilizando uma conexão segura, como HTTPS. |
| **RS-LOGIN-003** | Proteção contra Tentativas Excessivas | O sistema deve possuir mecanismos contra tentativas automatizadas ou excessivas de login. |
| **RS-LOGIN-004** | Sessão Segura | A sessão autenticada deve possuir mecanismos para reduzir riscos de sequestro ou reutilização indevida. |
| **RS-LOGIN-005** | Logout | O sistema deve permitir que o usuário encerre sua sessão autenticada. |



## 🎨 4. PROTÓTIPO FUNCIONAL (HTML + CSS + PHP + MySQL + RENDER)

#### Exemplo Prático — RF-001: Mockup das Telas

**Mockup - Tela 1: Formulário Vazio (Estado Inicial)**
```
┌────────────────────────────────────────────────┐
│                                                │
│                  LIBRANDO                       │
│        Rede social acessível em Libras         │
│                                                │
│              ┌──────────────────┐              │
│              │ E-mail           │              │
│              └──────────────────┘              │
│                                                │
│              ┌──────────────────┐              │
│              │ Senha         👁 │              │
│              └──────────────────┘              │
│                                                │
│              [     ENTRAR     ]                │
│                                                │
│              Esqueceu a senha?                 │
│                                                │
│          Ainda não possui conta?               │
│              [ CADASTRE-SE ]                   │
│                                                │
└────────────────────────────────────────────────┘
```

**Mockup - Tela 2: Formulário Preenchido (Validação Visual)**
```
┌────────────────────────────────────────────────┐
│                                                │
│                  LIBRANDO                       │
│        Rede social acessível em Libras         │
│                                                │
│              ┌──────────────────┐              │
│              │ usuario@email.com │ ✅           │
│              └──────────────────┘              │
│                                                │
│              ┌──────────────────┐              │
│              │ •••••••••••••• 👁│ ✅           │
│              └──────────────────┘              │
│                                                │
│              [     ENTRAR     ]                │
│                                                │
│              Esqueceu a senha?                 │
│                                                │
└────────────────────────────────────────────────┘
```

**Mockup - Tela 3: Erro de Validação ($enha inválida)**
```
┌────────────────────────────────────────────────┐
│                                                │
│                  LIBRANDO                       │
│                                                │
│        ⚠️ Não foi possível realizar o login    │
│                                                │
│        E-mail ou senha incorretos.             │
│        Verifique seus dados e tente novamente. │
│                                                │
│              ┌──────────────────┐              │
│              │ usuario@email.com │              │
│              └──────────────────┘              │
│                                                │
│              ┌──────────────────┐              │
│              │ •••••••••••••• 👁│ ❌           │
│              └──────────────────┘              │
│                                                │
│              [     ENTRAR     ]                │
│                                                │
└────────────────────────────────────────────────┘
```

**Mockup - Tela 4: Sucesso (Confirmação)**
```
┌────────────────────────────────────────────────┐
│                                                │
│                  LIBRANDO                       │
│                                                │
│          ✅ Login realizado com sucesso!       │
│                                                │
│             Bem-vindo ao Librando!             │
│                                                │
│          Redirecionando para o início...       │
│                                                │
│                   ⟳                            │
│                                                │
└────────────────────────────────────────────────┘
```

**Descrição de Estados:**
- **Estado Normal:** Todos campos em branco, botões habilitados
- **Estado Preenchido:** Validação visual com checkmark verde
- **Estado Erro:** Campo inválido destacado em vermelho com mensagem
- **Estado Sucesso:** Mensagem de confirmação com dados salvos

**Fluxo de Navegação:**
O fluxo funciona da seguinte maneira:

1. O usuário acessa a Tela de Login.
2. Informa seu e-mail e senha.
3. Seleciona ENTRAR.
4. O sistema envia os dados para o back-end PHP.
5. O back-end consulta o usuário no banco de dados.
6. A senha informada é comparada com o hash armazenado.
7. Se as credenciais forem inválidas, o usuário permanece na tela de login e recebe uma mensagem de erro.
8. Se as credenciais forem válidas, o sistema cria a sessão do usuário e o encaminha para a Página Inicial do Librando.
9. Caso selecione CADASTRE-SE, o usuário é direcionado para a tela de cadastro.
10. Caso selecione Esqueceu a senha?, é direcionado para o fluxo de recuperação de senha.

**Responsividade:**
- **Mobile (até 980px):** Layout single-column, campos full-width
- **Tablet (até 980px):** Layout single-column com padding maior
- **Desktop (980px+):** Layout potencialmente two-column se apropriado



## 🏗️ 5. ARQUITETURA E ADR

#### Exemplo Prático — RF-001: Arquitetura Completa

### Diagrama de Componentes

```text
┌──────────────────────────────────────────────┐
│             Frontend — Librando              │
│       HTML5 + CSS3 + JavaScript              │
│                                              │
│  • index.html (Tela de Login)                │      
│  • Interface acessível                       |
|  • Hospedado em GitHub Pages                 │      
└──────────────────────┬───────────────────────┘
                       │
                       │ HTTPS + HTTP
                       ▼
┌──────────────────────────────────────────────┐
│             Backend — PHP                    │
│                                              │
│  • login.php (Autenticação)                  │       
│  • conexao.php (Conexão com Banco)           │
│  • Validação dos dados                       │                 
│  • password_hash() / password_verify()       |
|   • Hospedado em Render                      │
└──────────────────────┬───────────────────────┘
                       │
                       │ PDO / SQL
                       ▼
┌──────────────────────────────────────────────┐
│              Banco de Dados                  │
│                  SQLite                      │
│                                              │
│  • Tabela: usuarios                          │
│  • ID do usuário                             │                                                                         
│  • Senha (hash)                              │
│  • Dados de cadastro                         │
│  • Restrições e validações                   │
└──────────────────────────────────────────────┘
```

ADR-001 — Escolha do banco de dados

Status: Aceito

Contexto:
O sistema precisa de um banco de dados para armazenar
os usuários e validar o login.

Decisão:
Será utilizado SQLite.

Motivo:
O projeto possui pequeno volume de dados e o SQLite
é simples de configurar e não exige um servidor de banco
de dados separado.

Consequências:
+ Fácil configuração
+ Baixo custo
+ Simples para desenvolvimento
- Menos adequado para grandes volumes de usuários

ADR-002 — Escolha do back-end

Contexto:
Precisamos implementar a autenticação dos usuários.

Decisão:
Utilizar PHP no back-end.

Motivo:
PHP é compatível com a hospedagem escolhida e atende
às necessidades do projeto.

Status: Aceito

### Tecnologias Escolhidas

| Camada | Tecnologia | Versão | Justificativa |
|--------|-----------|--------|---------------|
| Frontend | HTML5 + CSS3 | HTML5 / CSS3 | Estrutura e estilização da tela de login |
| Backend | PHP | 8.x | Processamento da autenticação e comunicação com o banco |
| Banco de Dados | MySQL | 8.x | Armazenamento dos usuários e credenciais |
| Banco de Dados | Aiven Cloud | — | Hospedagem online gratuita do banco de dados MySQL |
| Conexão BD | MySQLi | PHP 8.x | Conexão do backend PHP com o banco MySQL |
| Hash | password_hash() / password_verify() | PHP 8.x | Armazenamento e verificação segura das senhas |
| Servidor | Render | — | Hospedagem online do backend PHP |


## 🔒 6. VALIDAÇÃO DE SEGURANÇA OWASP

VALIDAÇÃO DE SEGURANÇA OWASP

Foram analisadas as principais vulnerabilidades aplicáveis ao
sistema, tomando como referência as recomendações da OWASP.

- SQL Injection: utilização de consultas preparadas.
- Armazenamento de senhas: utilização de password_hash().
- XSS: tratamento dos dados recebidos e exibidos pelo sistema.
- Autenticação: validação das credenciais no back-end.
- Controle de acesso: validação das permissões antes de acessar
  recursos protegidos.
- Gerenciamento de sessão: utilização de sessões PHP e logout.
- Validação de entrada: dados recebidos pelo usuário são
  validados no back-end.

## 📚 7. DOCUMENTAÇÃO API (SWAGGER/OPENAPI) (3%)

**Objetivo:** Documentar endpoints REST da API usando Swagger/OpenAPI.

#### Exemplo Prático — RF-001: Documentação Swagger

**Arquivo:** `docs/api/swagger.json`

```json
{
  "openapi": "3.0.0",
  "info": {
    "title": "Librando API",
    "version": "1.0.0"
  },
  "paths": {
    "/login.php": {
      "post": {
        "summary": "Realizar login",
        "requestBody": {
          "required": true,
          "content": {
            "application/json": {
              "schema": {
                "type": "object",
                "required": ["email", "senha"],
                "properties": {
                  "email": {
                    "type": "string",
                    "example": "usuario@email.com"
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
          "200": {
            "description": "Login realizado com sucesso"
          },
          "400": {
            "description": "Dados inválidos"
          },
          "401": {
            "description": "E-mail ou senha incorretos"
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

* `POST /login.php` — Realizar login do usuário.

**Autenticação:**

* O usuário envia e-mail e senha.
* O backend PHP consulta o usuário no banco de dados.
* A senha é validada utilizando `password_verify()`.
* Em caso de sucesso, uma sessão PHP é criada.

