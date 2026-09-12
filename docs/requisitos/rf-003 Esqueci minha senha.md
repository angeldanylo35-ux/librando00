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
