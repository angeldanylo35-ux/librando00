# 📝 RF-003 — Tela de Cadastro de Usuários

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

## 1.3 Localização dos Artefatos(Alterar ao longo do projeto)

* **LINK_REPOSITORIO_GITHUB:** `(https://github.com/angeldanylo35-ux/librando00/)`
* **BRANCH_PRINCIPAL:** `main`
* **LINK_APLICACAO_DEPLOY:** Aplicação executada localmente por meio do XAMPP.
* **LINK_BANCO_DADOS:** Banco de dados MySQL local.
* **LINK_API_SWAGGER:** Não se aplica nesta etapa do projeto.
* **LINK_DEMONSTRAÇÃO:** Aplicação executada localmente em `[(http://localhost:5173/cadastro)]`

---

# RF-003: Recuperação e Redefinição de Senha

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

O sistema deverá verificar se a nova senha e sua confirmação são iguais antes de concluir a alteração.

Quando o processo for realizado com sucesso, o sistema deverá apresentar uma confirmação visual, como **"Senha redefinida com sucesso!"**, e direcionar o usuário para a tela principal da plataforma.

Caso ocorra algum problema durante o processo, o sistema deverá apresentar mensagens de erro claras ao usuário, como **"Código inexistente"**, **"Senhas não coincidem"** ou mensagens correspondentes à situação encontrada.

---

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

---

## 🔄 3. ESPECIFICAÇÃO DE CASOS DE USO + REQUISITOS NÃO-FUNCIONAIS 

**Objetivo:** Descrever detalhadamente como o requisito de recuperação e redefinição de senha é executado, incluindo pré-condições, pós-condições, fluxo principal, fluxos alternativos, regras de negócio e requisitos não-funcionais.

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

6a.1. Sistema verifica que o e-mail informado não está associado a uma conta.

6a.2. Sistema interrompe o processo de recuperação.

6a.3. Sistema exibe uma mensagem informando que o e-mail não foi localizado.

6a.4. Usuário pode corrigir o e-mail informado.

6a.5. Sistema realiza uma nova validação após a correção.

---

### ⚠️ Fluxo Alternativo A2: Código de recuperação inválido

11a.1. Sistema identifica que o código informado não corresponde ao código enviado.

11a.2. Sistema impede o avanço para a etapa de redefinição da senha.

11a.3. Sistema exibe a mensagem: **"Código inexistente"**.

11a.4. Usuário pode informar novamente o código recebido.

11a.5. Sistema realiza uma nova validação do código.

---

### ⚠️ Fluxo Alternativo A3: Senhas não coincidem

15a.1. Sistema identifica que a nova senha e a confirmação são diferentes.

15a.2. Sistema impede a alteração da senha.

15a.3. Sistema exibe a mensagem: **"Senhas não coincidem"**.

15a.4. Usuário corrige os campos de senha.

15a.5. Sistema realiza uma nova validação.

---

### ⚠️ Fluxo Alternativo A4: E-mail inválido

6b.1. Sistema identifica que o formato do e-mail informado é inválido.

6b.2. Sistema não inicia o envio do código de recuperação.

6b.3. Sistema exibe uma mensagem informando que o e-mail é inválido.

6b.4. Usuário corrige o endereço de e-mail.

6b.5. Sistema realiza uma nova validação.

---

### ⚠️ Fluxo Alternativo A5: Falha no envio do código

8a.1. Sistema tenta encaminhar o código para o e-mail cadastrado.

8a.2. O serviço de e-mail não consegue realizar o envio.

8a.3. Sistema informa visualmente que não foi possível enviar o código.

8a.4. Usuário recebe a opção de tentar realizar o envio novamente.

8a.5. Sistema realiza uma nova tentativa de envio.

---

### 📋 Regras de Negócio (RN)

| ID | Regra | Descrição |
|:---:|:---|:---|
| **RN-01** | Usuário Cadastrado | Somente usuários que possuem uma conta cadastrada podem realizar a recuperação de senha. |
| **RN-02** | E-mail Obrigatório | O usuário deve informar um e-mail para iniciar o processo de recuperação. |
| **RN-03** | E-mail Válido | O e-mail informado deve possuir um formato válido para que a solicitação possa prosseguir. |
| **RN-04** | E-mail Cadastrado | O e-mail informado deve estar associado a uma conta existente no sistema. |
| **RN-05** | Código de Recuperação | O usuário deve informar corretamente o código recebido no e-mail para prosseguir com a redefinição. |
| **RN-06** | Validação do Código | O sistema não deve permitir a redefinição da senha quando o código informado for inválido ou inexistente. |
| **RN-07** | Nova Senha Obrigatória | O usuário deve informar uma nova senha para concluir a recuperação. |
| **RN-08** | Confirmação de Senha | A nova senha e sua confirmação devem ser iguais para permitir a alteração. |
| **RN-09** | Segurança da Senha | A nova senha não deve ser armazenada em texto puro, devendo ser protegida por mecanismo seguro de armazenamento. |
| **RN-10** | Alteração Após Validação | A senha somente deve ser alterada após a validação correta do e-mail, código e confirmação da nova senha. |
| **RN-11** | Feedback do Processo | O sistema deve informar visualmente ao usuário o sucesso ou os erros ocorridos durante o processo de recuperação. |
| **RN-12** | Acessibilidade | As informações essenciais do processo de recuperação não devem depender exclusivamente de áudio para serem compreendidas. |

---

### ⚙️ Requisitos Não-Funcionais (RNF)

| ID | Atributo | Requisito | Métrica | Justificativa |
|:---:|:---|:---|:---|:---|
| **RNF-01** | 🔐 Segurança | A senha redefinida deve ser armazenada utilizando hash seguro, não sendo permitida sua gravação em texto puro | Senha armazenada sem texto puro | Proteger as credenciais dos usuários |
| **RNF-02** | 🛡️ Segurança | A comunicação entre usuário, sistema e servidor deve utilizar HTTPS | Comunicação realizada via HTTPS | Proteger os dados transmitidos durante a recuperação |
| **RNF-03** | ⚡ Performance | As telas e validações do processo de recuperação devem apresentar resposta em até aproximadamente 2 segundos em condições normais | Tempo de resposta ≤ 2 segundos | Evitar que o usuário fique aguardando desnecessariamente |
| **RNF-04** | ♿ Acessibilidade | As mensagens de erro, validação e sucesso devem ser apresentadas visualmente | Mensagens visuais disponíveis | Garantir que informações importantes não dependam exclusivamente de áudio |
| **RNF-05** | 🤟 Acessibilidade | O processo deve disponibilizar suporte visual compatível com Libras quando necessário | Recursos visuais disponíveis quando aplicáveis | Facilitar o acesso de pessoas surdas às informações |
| **RNF-06** | ⌨️ Acessibilidade | Os elementos das telas de recuperação devem permitir navegação e interação por teclado | Elementos acessíveis via teclado | Facilitar a utilização da funcionalidade |
| **RNF-07** | 📱 Responsividade | As telas de recuperação devem adaptar-se a computadores, notebooks, tablets e smartphones | Interface adaptável a diferentes resoluções | Garantir uma boa experiência em diferentes dispositivos |
| **RNF-08** | 💬 Usabilidade | O sistema deve apresentar feedback visual durante as etapas de validação, envio do código, erros e conclusão da recuperação | Feedback visual nas principais ações | Informar ao usuário o estado atual da operação |
| **RNF-09** | 👁️ Acessibilidade | Textos, campos e botões devem possuir contraste visual adequado | Contraste adequado entre elementos | Facilitar a leitura e identificação dos elementos da interface |



###🎨 4. PROTÓTIPO FUNCIONAL (HTML + CSS + PHP + MySQL + RENDER)

**Mockup - Tela 1: Solicitação de E-mail (Estado Inicial)**
```
┌──────────────────────────┬─────────────────────────────┐
│                          │                             │
│  🤟 Librando             │     Esqueci minha senha     │
│                          │                             │
│  Recupere sua            │  Digite seu e-mail para     │
│  conta                   │  receber o link...          │
│  Librando.               │                             │
│                          │  E-mail                     │
│  Não se preocupe...      │  ┌───────────────────────┐  │
│                          │  │ Digite seu e-mail     │  │
│                          │  └───────────────────────┘  │
│                          │                             │
│                          │  ┌───────────────────────┐  │
│                          │  │     Enviar link       │  │
│                          │  └───────────────────────┘  │
│                          │                             │
│                          │  Lembrou sua senha? Entrar  │
│                          │                             │
└──────────────────────────┴─────────────────────────────┘
```

**Tela 2: Formulário Preenchido / Validação Visual (Com E-mail Válido)**
```
┌──────────────────────────┬─────────────────────────────┐
│                          │                             │
│  🤟 Librando             │     Esqueci minha senha     │
│                          │                             │
│  Recupere sua            │  Digite seu e-mail para     │
│  conta                   │  receber o link...          │
│  Librando.               │                             │
│                          │  E-mail                     │
│  Não se preocupe...      │  ┌───────────────────────┐  │
│                          │  │ usuario@email.com   ✅│  │
│                          │  └───────────────────────┘  │
│                          │                             │
│                          │  ┌───────────────────────┐  │
│                          │  │     Enviar link       │  │
│                          │  └───────────────────────┘  │
│                          │                             │
│                          │  Lembrou sua senha? Entrar  │
│                          │                             │
└──────────────────────────┴─────────────────────────────┘
```

**Tela 3: Erro de Validação (E-mail não cadastrado ou inválido)**
```
┌──────────────────────────┬─────────────────────────────┐
│                          │                             │
│  🤟 Librando             │     Esqueci minha senha     │
│                          │                             │
│  Recupere sua            │  Digite seu e-mail para     │
│  conta                   │  receber o link...          │
│  Librando.               │                             │
│                          │  E-mail                     │
│  Não se preocupe...      │  ┌───────────────────────┐  │
│                          │  │ email.invalido      ❌│  │
│                          │  └───────────────────────┘  │
│                          │  E-mail não cadastrado.     │
│                          │                             │
│                          │  ┌───────────────────────┐  │
│                          │  │     Enviar link       │  │
│                          │  └───────────────────────┘  │
│                          │                             │
│                          │  Lembrou sua senha? Entrar  │
│                          │                             │
└──────────────────────────┴─────────────────────────────┘
```




**Descrição de Estados:**
- **Estado Normal:** Campo de e-mail em branco, botão de envio habilitado.
- **Estado Preenchido:** Validação visual do formato do e-mail com checkmark verde.
- **Estado Erro:** Campo de e-mail destacado em vermelho acompanhado da mensagem de erro correspondente ("E-mail não cadastrado" ou "E-mail inválido").

## Fluxo de Navegação

O fluxo funciona da seguinte maneira:

1. O usuário acessa a **Tela de Login** da plataforma e clica na opção "Esqueci minha senha".
  
2. O sistema direciona o usuário para a Tela de Recuperação de Senha.

3. O usuário informa seu endereço de e-mail cadastrado no campo correspondente e clica no botão **ENVIAR LINK**.

4. O sistema realiza as validações iniciais: verifica se o campo foi preenchido e se o formato do e-mail é válido. Caso haja erro, o usuário permanece na tela e recebe um alerta visual.

5. Se as validações iniciais forem bem-sucedidas, o **frontend Vue** envia os dados para o **back-end Laravel** por meio de uma requisição `POST` para a rota de recuperação.

6. O **back-end Laravel** recebe os dados e realiza as validações necessárias, verificando:

  * Se o campo obrigatório foi preenchido;
  * Se o e-mail possui formato válido;
  * Se o e-mail está associado a uma conta existente no banco de dados MySQL.

7. Caso o e-mail seja inválido ou não esteja cadastrado, o back-end retorna uma mensagem de erro como "E-mail não cadastrado". O usuário permanece na **Tela Esqueci Minha Senha** para corrigir a informação.

8. Caso o e-mail seja válido e cadastrado, o sistema gera um código ou link temporário de recuperação, armazena no banco de dados com tempo de expiração e aciona o Serviço de E-mail para enviar as instruções.

9. O sistema exibe uma mensagem visual de confirmação do envio das instruções para o e-mail informado.

10. Caso o usuário selecione a opção "Lembrou sua senha? Entrar", ele será direcionado diretamente para a Tela de Login, sem submeter o formulário de recuperação.


**Responsividade:**
- **Mobile (até 980px):** Layout single-column, campos full-width
- **Tablet (até 980px):** Layout single-column com padding maior
- **Desktop (980px+):** Layout potencialmente two-column se apropriado

## 🏗️ 5. ARQUITETURA E ADR
#### Exemplo Prático — RF-003: Arquitetura Completa

### Diagrama de Componentes
```text
┌─────────────────────────┐
│         FRONTEND        │
│ Vue.js 3 + Vite         │
│ Vue Router + Axios      │
└────────────┬────────────┘
             │ HTTP/JSON (POST /api/auth/forgot-password)
             ▼
┌─────────────────────────┐
│         BACKEND         │
│ PHP + Laravel 12        │
│ AuthController          │
│ Serviço de E-mail       │
└────────────┬────────────┘
             │ Eloquent ORM
             ▼
┌─────────────────────────┤
│     BANCO DE DADOS      │
│          MySQL          │
│  Tabela `usuarios`      │
│  (reset_token, expires) │
└─────────────────────────┘
```

ADR-001 — Escolha do banco de dados

Status: Aceito

Contexto:
A funcionalidade de recuperação de senha exige o armazenamento seguro e temporário de tokens de redefinição e seus respectivos tempos de expiração associados a um usuário cadastrado.

Decisão:
Adotar colunas específicas (reset_token e token_expires_at) na tabela existente usuarios do MySQL gerenciado pelas migrations do Laravel.

Motivo:
O MySQL garante consistência relacional e integridade para as contas dos usuários. Adicionar campos de controle de token na mesma tabela evita a criação desnecessária de tabelas adicionais para um fluxo linear de recuperação, aproveitando a infraestrutura relacional já validada no projeto.

Consequências:
+ Armazenamento direto e vinculado à entidade do usuário.
+ Facilidade de consulta e limpeza via Eloquent ORM.
- Requer tratamento de expiração e invalidação do token após o uso.

ADR-002: Escolha do Back-end

Status: Aceito

Contexto:
Necessidade de processar requisições de recuperação de senha de forma segura, validando a existência do e-mail, gerando tokens criptográficos e disparando o serviço de envio de e-mails.

Decisão:
Adotar o Laravel 12 (PHP 8.2+) utilizando controladores dedicados a autenticação e recuperação de credenciais.

Motivo:
O Laravel fornece recursos robustos para manipulação de strings criptografadas e integração com envio de e-mails, garantindo que o fluxo ocorra de forma isolada e segura no servidor.

Consequências:
+ Validação server-side rigorosa e segura do e-mail informado antes de disparar qualquer processo de redefinição.
+ Integração nativa com o sistema de envio de e-mails e manipulação de strings criptografadas do framework.
- Obrigatoriedade de configurar corretamente o serviço de disparo de correio eletrônico (SMTP/Mail) nos ambientes de desenvolvimento e produção.

ADR-003 — Escolha do Front-end

Status: Aceito

Contexto:
A interface de recuperação de senha precisa guiar o usuário em etapas claras (informar e-mail, verificar mensagens e redefinir a senha) com boa usabilidade e feedback visual imediato.

Decisão:
Adotar o Vue.js com Vite para renderizar a tela de recuperação em layout de duas colunas, utilizando o Axios para comunicação assíncrona com os endpoints da API.

Motivo:
O Vue.js permite o controle dinâmico de estados visuais, proporcionando uma experiência fluida e alinhada ao restante da aplicação.

Consequências:
+ Reutilização eficiente dos componentes visuais e de layout já consolidados no ecossistema da aplicação frontend.
+ Feedback visual dinâmico e imediato para guiar o usuário durante as etapas de recuperação de acesso.

ADR-004 — Comunicação e Segurança no Processo de Recuperação

Status: Aceito

Contexto:
O envio de solicitações de recuperação de senha expõe pontos sensíveis da aplicação, exigindo comunicação padronizada via API e proteção contra exposição de dados de usuários.

Decisão:
Utilizar endpoints REST específicos no Laravel consumidos via Axios, garantindo que o sistema retorne mensagens genéricas de sucesso no envio de e-mail para evitar a enumeração de contas cadastradas.

Motivo:
Seguir as boas práticas de segurança recomendadas pela OWASP evita que atacantes descubram quais e-mails estão cadastrados na base de dados.

Consequências:
+ Maior blindagem de segurança da aplicação contra técnicas de enumeração de contas (protegendo dados cadastrados contra ataques maliciosos).
+ Separação estruturada e limpa entre as responsabilidades de validação da interface web e da API de serviços.
- Necessidade de projetar mensagens de erro genéricas na interface para proteger a privacidade dos usuários sem prejudicar a usabilidade de quem possui conta legítima.


### Tecnologias Escolhidas

| Camada | Tecnologia | Versão | Justificativa |
|--------|-----------|--------|---------------|
| Frontend | Vue.js 3 | 3.x | Construção da interface reativa e gerenciamento dos estados do formulário |
| Roteamento | Vue Router | 4.x | Navegação entre a tela de login e o fluxo de recuperação de senha |
| Cliente HTTP | Axios | 1.x | Realização de requisições assíncronas (POST) para a API de recuperação |
| Build Tool | Vite | 5.x | Ferramenta de build rápida e servidor de desenvolvimento para o frontend Vue |
| Backend | Laravel | 12.x | Framework PHP para a criação da API RESTful e controle dos tokens |
| Linguagem Backend | PHP | 8.2+ | Linguagem base para execução do framework Laravel e lógica de negócio |
| Serviço de E-mail | Laravel Mail / SMTP | 12.x | Envio automatizado do código ou link de recuperação para o e-mail do usuário |
| Banco de Dados | MySQL | 8.x | Armazenamento relacional dos dados de usuário e campos de controle de token |
| Hash / Segurança | Bcrypt (Hash::make)| PHP / Laravel | Criptografia irreversível e segura para o armazenamento da nova senha |
