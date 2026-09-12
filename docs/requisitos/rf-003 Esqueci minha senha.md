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

## 📋 2. DESCRIÇÃO E ATORES (10%)

**Objetivo:** Descrever o requisito de recuperação e redefinição de senha com clareza, identificando todos os atores envolvidos, suas responsabilidades e permissões no processo.

**O que avaliar:**
- ✅ Descrição detalhada do requisito
- ✅ Objetivo do negócio claro (3+ benefícios)
- ✅ Todos os atores identificados
- ✅ Papel de cada ator descrito
- ✅ Permissões mapeadas (CRUD)

---

### 📖 Descrição Detalhada

**Por que este requisito existe?**

O sistema precisa disponibilizar um processo de recuperação e redefinição de senha para permitir que usuários cadastrados recuperem o acesso à plataforma quando não se lembrarem de suas credenciais.

A funcionalidade existe para:

- 🔐 Permitir que o usuário recupere o acesso à sua conta de forma segura;
- 👤 Evitar que o usuário precise criar uma nova conta quando esquecer sua senha;
- ⚡ Tornar o processo de recuperação de acesso simples e rápido;
- 🛡️ Aumentar a segurança da conta por meio da validação de identidade através de código enviado ao e-mail cadastrado;
- ♿ Garantir que o processo seja acessível, com informações importantes apresentadas visualmente e suporte adequado à acessibilidade;
- 💻 Permitir que o usuário volte a utilizar a plataforma após redefinir sua senha.

### 🏢 Contexto do Negócio

A rede social Librando precisa oferecer uma alternativa segura para usuários cadastrados que perderam ou esqueceram sua senha.

Ao selecionar a opção **"Esqueci minha senha"** na tela de login, o usuário deverá informar o e-mail utilizado no cadastro. O sistema deverá validar a informação e, quando o e-mail estiver associado a uma conta, encaminhar um código de recuperação para o endereço informado.

Após receber o código, o usuário deverá inseri-lo no sistema. Se o código estiver correto, será permitido informar uma nova senha e sua confirmação.

O sistema deverá verificar se as duas senhas são iguais e, estando todas as informações corretas, realizar a redefinição da senha. Ao finalizar o processo, deverá apresentar uma confirmação visual, como **"Senha redefinida com sucesso!"**, e direcionar o usuário para a tela principal da plataforma.

Quando ocorrer algum problema durante o processo, o sistema deverá informar visualmente a situação encontrada, utilizando mensagens como **"Código inexistente"** ou **"Senhas não coincidem"**, conforme o erro identificado.

---

## 👥 Atores do Sistema

### 1. 👤 USUÁRIO CADASTRADO (Ator Principal)

- **Papel:** Solicitar a recuperação da senha e cadastrar uma nova senha para sua conta.
- **Responsabilidade:** Informar o e-mail cadastrado, inserir corretamente o código de recuperação recebido e informar uma nova senha e sua confirmação.
- **Permissões:**
  - ❌ **CREATE** (não cria uma nova conta durante a recuperação)
  - ✅ **READ** (informar/consultar os dados necessários para recuperação)
  - ✅ **UPDATE** (alterar a senha da própria conta)
  - ❌ **DELETE** (não pode excluir a conta pelo processo de recuperação)

### 2. 📧 SERVIÇO DE E-MAIL (Ator Secundário)

- **Papel:** Receber e encaminhar o código de recuperação para o e-mail cadastrado do usuário.
- **Responsabilidade:** Processar o envio da mensagem contendo o código de recuperação para o endereço de e-mail informado pelo usuário.
- **Permissões:**
  - ❌ **CREATE** (não cria contas de usuários)
  - ✅ **READ** (utiliza o endereço de e-mail necessário para o envio)
  - ❌ **UPDATE** (não altera dados da conta do usuário)
  - ❌ **DELETE** (não exclui dados da conta)

### 3. ⚙️ SISTEMA (Ator Automático)

- **Papel:** Controlar todo o processo de recuperação e redefinição da senha.
- **Responsabilidade:** Validar o e-mail informado, verificar a existência da conta, gerar e encaminhar o código de recuperação, validar o código informado, validar a nova senha e sua confirmação, atualizar a senha de forma segura e apresentar os retornos ao usuário.
- **Permissões:**
  - ✅ **CREATE** (criar o processo/dados temporários necessários para recuperação)
  - ✅ **READ** (consultar dados necessários para validar a conta e o processo)
  - ✅ **UPDATE** (atualizar a senha do usuário)
  - ❌ **DELETE** (não realiza exclusão da conta durante a recuperação)

---

### 📊 Resumo das Permissões (CRUD)

| 👥 Ator | ➕ CREATE | 🔎 READ | ✏️ UPDATE | 🗑️ DELETE |
|---|:---:|:---:|:---:|:---:|
| 👤 **Usuário Cadastrado** | ❌ | ✅ | ✅ | ❌ |
| 📧 **Serviço de E-mail** | ❌ | ✅ | ❌ | ❌ |
| ⚙️ **Sistema** | ✅ | ✅ | ✅ | ❌ |

---

### 🎯 Benefícios do Requisito

| # | Benefício | Descrição |
|:---:|---|---|
| **1** | 🔐 **Segurança** | Permite redefinir a senha por meio de uma etapa de validação com código enviado ao e-mail cadastrado. |
| **2** | 👤 **Recuperação de Acesso** | Permite que usuários que esqueceram a senha recuperem o acesso à própria conta sem realizar um novo cadastro. |
| **3** | ⚡ **Praticidade** | Disponibiliza um processo estruturado para recuperação de acesso sem depender da intervenção de um administrador. |
| **4** | ♿ **Acessibilidade** | Permite que informações importantes do processo sejam apresentadas visualmente, atendendo às necessidades de acessibilidade da plataforma. |
| **5** | 💻 **Continuidade de Uso** | Após a redefinição da senha, o usuário poderá voltar a utilizar a plataforma. |

---

**CRITÉRIOS DE ACEITE PARA 10/10:**
- ✅ Descrição detalhada do processo de recuperação e redefinição de senha
- ✅ Objetivo do negócio apresentado
- ✅ Mínimo de 3 benefícios de negócio identificados
- ✅ Mínimo de 3 atores descritos
- ✅ Papel de cada ator claramente definido
- ✅ Responsabilidades de cada ator apresentadas
- ✅ Permissões CRUD mapeadas
- ✅ Contexto do negócio relacionado à rede social Librando
- ✅ Fluxo de recuperação baseado em e-mail, código e redefinição de senha

Caso ocorra algum problema durante o processo, o sistema deverá apresentar mensagens de erro claras ao usuário, como **"Código inexistente"**, **"Senhas não coincidem"** ou mensagens correspondentes à situação encontrada.

---
