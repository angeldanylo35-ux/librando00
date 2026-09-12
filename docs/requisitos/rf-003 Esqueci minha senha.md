# 📝 RF-003 — Esqueci minha senha

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

## 1.3 Localização dos Artefatos(esse é do modelo anterior, tem que trocar para esse, não esqueçam!)

* **LINK_REPOSITORIO_GITHUB:** `(https://github.com/angeldanylo35-ux/librando00/)`
* **BRANCH_PRINCIPAL:** `main`
* **LINK_APLICACAO_DEPLOY:** Aplicação executada localmente por meio do XAMPP.
* **LINK_BANCO_DADOS:** Banco de dados MySQL local.
* **LINK_API_SWAGGER:** Não se aplica nesta etapa do projeto.
* **LINK_DEMONSTRAÇÃO:** Aplicação executada localmente em `[(http://localhost:5173/cadastro)]`

---

## 🔎 1. Identificação do Requisito

| 📌 Campo | 📄 Informação |
|---|---|
| **🆔 ID** | RF-003 |
| **📋 Título** | Recuperação e Redefinição de Senha |
| **📂 Tipo** | Requisito Funcional |
| **🚨 Prioridade** | ALTA |
| **⚙️ Complexidade** | ALTA |
| **📊 Status** | EM DESENVOLVIMENTO |
| **📅 Data de Criação** | 10/09/2026 |
| **🔄 Última Atualização** | 10/09/2026 |

### 📖 Descrição

O sistema deve permitir que usuários cadastrados recuperem e redefinam sua senha por meio da opção **"Esqueci minha senha"**, disponível na tela de login.

Ao selecionar essa opção, o usuário deverá ser direcionado para uma tela na qual deverá informar o e-mail cadastrado. O sistema deverá validar o e-mail informado e, caso seja válido, encaminhar um código de recuperação para o endereço de e-mail cadastrado.

Após receber o código, o usuário deverá informá-lo em uma segunda tela para que o sistema realize a validação. Caso o código esteja correto, o usuário poderá cadastrar uma nova senha e confirmar a senha informada.

O sistema deverá verificar se as senhas são iguais antes de concluir a alteração. Quando o processo for realizado com sucesso, deverá apresentar uma confirmação visual, como **"Senha redefinida com sucesso!"**, e direcionar o usuário para a tela principal da plataforma.

## 📋 2. DESCRIÇÃO E ATORES 

**Objetivo:** Descrever o requisito com clareza e identificar todos os atores envolvidos.

---

### 📖 Descrição Detalhada

**Por que este requisito existe?**

O sistema precisa disponibilizar uma funcionalidade de recuperação e redefinição de senha para permitir que usuários cadastrados recuperem o acesso à sua conta quando esquecerem suas credenciais.

A funcionalidade existe para:

- 🔐 Permitir a recuperação segura do acesso à conta;
- 👤 Evitar a necessidade de criar uma nova conta quando o usuário esquecer sua senha;
- ⚡ Tornar o processo de recuperação simples e rápido;
- 🛡️ Aumentar a segurança por meio da validação através de código enviado ao e-mail cadastrado;
- ♿ Garantir que o processo apresente informações importantes de forma acessível.

### 🏢 Contexto do Negócio

A rede social Librando precisa oferecer uma alternativa segura para usuários cadastrados que esquecerem sua senha.

Ao selecionar a opção **"Esqueci minha senha"** na tela de login, o usuário deverá informar o e-mail cadastrado. O sistema deverá validar o e-mail e, caso esteja associado a uma conta, encaminhar um código de recuperação para o endereço de e-mail informado.

Após receber o código, o usuário deverá inseri-lo no sistema. Se o código estiver correto, poderá informar uma nova senha e sua confirmação.

O sistema deverá verificar se as duas senhas são iguais antes de concluir a alteração. Em caso de sucesso, deverá apresentar uma confirmação visual, como **"Senha redefinida com sucesso!"**, e direcionar o usuário para a tela principal da plataforma.

Caso ocorra algum problema, o sistema deverá apresentar uma mensagem de erro correspondente, como **"Código inexistente"** ou **"Senhas não coincidem"**.

---

## 👥 Atores do Sistema

### 1. 👤 USUÁRIO CADASTRADO (Ator Principal)

- **Papel:** Solicitar a recuperação da senha e cadastrar uma nova senha para sua própria conta.
- **Responsabilidade:** Informar o e-mail cadastrado, inserir o código de recuperação recebido e informar e confirmar a nova senha.

**Permissões:**

| Operação | Permissão | Descrição |
|---|:---:|---|
| ➕ **CREATE** | ❌ | Não cria uma nova conta durante o processo de recuperação |
| 🔎 **READ** | ✅ | Informa e consulta os dados necessários para realizar a recuperação |
| ✏️ **UPDATE** | ✅ | Altera a senha da própria conta |
| 🗑️ **DELETE** | ❌ | Não exclui a conta durante o processo de recuperação |

---

### 2. 📧 SERVIÇO DE E-MAIL (Ator Secundário)

- **Papel:** Realizar o envio do código de recuperação para o e-mail cadastrado do usuário.
- **Responsabilidade:** Receber a solicitação do sistema e encaminhar o código de recuperação ao endereço de e-mail informado.

**Permissões:**

| Operação | Permissão | Descrição |
|---|:---:|---|
| ➕ **CREATE** | ❌ | Não cria contas de usuários |
| 🔎 **READ** | ✅ | Utiliza o endereço de e-mail necessário para realizar o envio |
| ✏️ **UPDATE** | ❌ | Não altera os dados da conta do usuário |
| 🗑️ **DELETE** | ❌ | Não exclui dados da conta do usuário |

---

### 3. ⚙️ SISTEMA (Ator Automático)

- **Papel:** Controlar e processar o processo de recuperação e redefinição de senha.
- **Responsabilidade:** Validar o e-mail, verificar a existência da conta, gerar e enviar o código de recuperação, validar o código informado, verificar a nova senha e sua confirmação, atualizar a senha de forma segura e apresentar as mensagens correspondentes ao usuário.

**Permissões:**

| Operação | Permissão | Descrição |
|---|:---:|---|
| ➕ **CREATE** | ✅ | Cria e registra os dados necessários para o processo de recuperação |
| 🔎 **READ** | ✅ | Consulta os dados necessários para validar a conta e o processo de recuperação |
| ✏️ **UPDATE** | ✅ | Atualiza a senha do usuário após todas as validações |
| 🗑️ **DELETE** | ❌ | Não exclui a conta durante o processo de recuperação |

## 🔄 3. ESPECIFICAÇÃO DE CASOS DE USO + REQUISITOS NÃO-FUNCIONAIS (20%)

**Objetivo:** Descrever detalhadamente como o requisito de recuperação e redefinição de senha é executado, incluindo pré-condições, pós-condições, fluxo principal, fluxos alternativos, regras de negócio e requisitos não-funcionais.

**O que avaliar:**
- ✅ Pré-condições definidas
- ✅ Pós-condições definidas (sucesso e falha)
- ✅ Fluxo principal com 8+ passos
- ✅ Fluxos alternativos (mínimo 3)
- ✅ Regras de negócio (RN-XX)
- ✅ Requisitos Não-Funcionais (mínimo 3)

---

## 📌 Caso de Uso (UC-003): Recuperar e Redefinir Senha

### Pré-Condições

- ✅ Usuário possui uma conta cadastrada na plataforma;
- ✅ Usuário está na tela de login da plataforma;
- ✅ Sistema está disponível para realizar o processo de recuperação;
- ✅ Usuário possui acesso ao e-mail utilizado no cadastro;
- ✅ Serviço de e-mail está disponível para envio do código de recuperação.

### Pós-Condições (Sucesso)

- ✅ Código de recuperação validado com sucesso;
- ✅ Nova senha cadastrada e confirmada pelo usuário;
- ✅ Senha da conta atualizada no sistema de forma segura;
- ✅ Sistema exibe a mensagem **"Senha redefinida com sucesso!"**;
- ✅ Usuário é direcionado para a tela principal da plataforma.

### Pós-Condições (Falha)

- ✅ Senha não é alterada;
- ✅ Dados inválidos não são utilizados para redefinir a senha;
- ✅ Sistema exibe uma mensagem de erro correspondente ao problema encontrado;
- ✅ Usuário permanece no processo de recuperação para corrigir as informações;
- ✅ Campo que apresentar erro recebe indicação visual quando aplicável.

---

### 🔄 Fluxo Principal

1. Usuário acessa a tela de login da plataforma.
2. Usuário clica na opção **"Esqueci minha senha"**.
3. Sistema direciona o usuário para a tela de recuperação de senha.
4. Sistema solicita que o usuário informe o e-mail cadastrado.
5. Usuário informa seu endereço de e-mail.
6. Sistema valida o formato e verifica se o e-mail está associado a uma conta.
7. Sistema gera um código de recuperação.
8. Sistema encaminha o código de recuperação para o e-mail informado.
9. Sistema direciona o usuário para a tela de inserção do código.
10. Usuário informa o código recebido por e-mail.
11. Sistema valida o código informado.
12. Sistema libera a tela para criação de uma nova senha.
13. Usuário informa uma nova senha.
14. Usuário confirma a nova senha no campo de confirmação.
15. Sistema verifica se a nova senha e sua confirmação são iguais.
16. Sistema atualiza a senha da conta de forma segura.
17. Sistema exibe a mensagem **"Senha redefinida com sucesso!"**.
18. Sistema direciona o usuário para a tela principal da plataforma.

---

### ⚠️ Fluxo Alternativo A1: E-mail não cadastrado

```text
6a.1. Sistema verifica que o e-mail informado não está associado a uma conta.
6a.2. Sistema interrompe o processo de recuperação.
6a.3. Sistema exibe uma mensagem informando que o e-mail não foi localizado.
6a.4. Usuário pode corrigir o e-mail informado.
6a.5. Sistema realiza uma nova validação após a correção.
