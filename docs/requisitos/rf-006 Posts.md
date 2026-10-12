# 📝 RF-006: CRIAÇÃO E PUBLICAÇÃO DE POSTAGENS

---

## 1. METADADOS DO PROJETO E DA EQUIPE

### 1.1 Composição da Equipe

| ID | Nome Completo | Papel Primário | Papel Secundário | E-mail / Contato |
| --- | --- | --- | --- | --- |
| 1 | [André Mendes] | Scrum Master | Fullstack | [[andre53774636@edu.df.senac.br](mailto:andre53774636@edu.df.senac.br)] |
| 2 | [Eduardo Amorim] | Desenvolvedor Front-End | — | [[eduardo59381426@edu.df.senac.br](mailto:eduardo59381426@edu.df.senac.br)] |
| 3 | [Gabriel Souza / Vitor Silva] | Desenvolvedor Back-End | — | [[gabriel49414966@edu.df.senac.br](mailto:gabriel49414966@edu.df.senac.br) / [vitor59422706@edu.df.senac.br](mailto:vitor59422706@edu.df.senac.br)] |
| 4 | [Henrique Alves] | DBA / Banco de Dados | — | [[henrique51782196@edu.df.senac.br](mailto:henrique51782196@edu.df.senac.br)] |
| 5 | [Angel Pacheco] | QA / SecDevOps | — | [[angel59381406@edu.df.senac.br](mailto:angel59381406@edu.df.senac.br)] |
| 6 | [Angel Pacheco] | Fullstack (opcional) | — | [[angel59381406@edu.df.senac.br](mailto:angel59381406@edu.df.senac.br)] |

### 1.2 Identificação

* **NOME_DO_PROJETO:** Librando
* **DESCRICAO_BREVE:** Sistema web desenvolvido para a plataforma Librando, uma rede social voltada à comunidade surda. Nesta etapa do projeto, foi desenvolvida a funcionalidade de criação e publicação de postagens, permitindo que os usuários compartilhem conteúdos na rede social utilizando diferentes formatos de mídia, como texto, imagens, GIFs e vídeos. Foram utilizadas as tecnologias Laravel, Vue.js, Vite, Axios, PHP e MySQL.

### 1.3 Localização dos Artefatos

* **LINK_REPOSITORIO_GITHUB:** `[https://github.com/angeldanylo35-ux/librando00/](https://github.com/angeldanylo35-ux/librando00/)`
* **BRANCH_PRINCIPAL:** `main`
* **LINK_APLICACAO_DEPLOY:** Aplicação executada localmente por meio do XAMPP.
* **LINK_BANCO_DADOS:** Banco de dados MySQL local.
* **LINK_API_SWAGGER:** `docs/api/swagger.json`
* **LINK_DEMONSTRAÇÃO:** Aplicação executada localmente em `http://localhost:5173/feed`

---

# 2. ESTRUTURA DE DIRETÓRIOS DO PROJETO

O projeto utiliza uma arquitetura separada entre **Back-end Laravel** e **Front-end Vue.js**, mantendo a organização dos arquivos de acordo com as convenções do framework Laravel.

```text
librando00-main/
│
├── README.md
│
├── docs/
│   ├── api/
│   │   └── swagger.json
│   │
│   └── requisitos/
│       ├── rf-001-login.md
│       ├── rf-002-cadastrar.md
│       ├── rf-003-Esqueci-minha-senha.md
│       ├── rf-004-Tela-Inicial-Usuario.md
│       └── rf-006-Posts.md
│
├── backend/
│   │
│   ├── app/
│   │   ├── Http/
│   │   │   └── Controllers/
│   │   │       ├── Controller.php
│   │   │       └── api/
│   │   │           ├── AuthController.php
│   │   │           └── PostController.php
│   │   │
│   │   ├── Models/
│   │   │   ├── User.php
│   │   │   ├── Usuario.php
│   │   │   ├── Post.php
│   │   │   └── enqueteopcao.php
│   │   │
│   │   ├── Notifications/
│   │   └── Providers/
│   │
│   ├── database/
│   │   ├── factories/
│   │   ├── migrations/
│   │   │   ├── 2026_10_12_020211_create_posts_table.php
│   │   │   └── 2026_10_12_020212_create_enquete_opcoes_table.php
│   │   │
│   │   └── seeders/
│   │
│   ├── resources/
│   │   └── views/
│   │
│   ├── routes/
│   │   ├── api.php
│   │   ├── web.php
│   │   └── console.php
│   │
│   ├── config/
│   ├── bootstrap/
│   ├── public/
│   ├── storage/
│   ├── tests/
│   ├── artisan
│   ├── composer.json
│   └── .env
│
└── frontend/
    │
    ├── public/
    │
    ├── src/
    │   │
    │   ├── assets/
    │   │   └── estetico.css
    │   │
    │   ├── components/
    │   │
    │   ├── paginas/
    │   │   ├── Feed.vue
    │   │   ├── login.vue
    │   │   └── cadastro.vue
    │   │
    │   ├── router/
    │   │   └── index.js
    │   │
    │   ├── services/
    │   │   └── api.js
    │   │
    │   ├── App.vue
    │   └── style.css
    │
    ├── index.html
    ├── package.json
    ├── package-lock.json
    └── vite.config.js

```

## Localização dos Arquivos

### 📚 Documentação

* **Documentação geral:** `README.md`
* **Documentação dos requisitos:** `docs/requisitos/`
* **RF-006 — Posts:** `docs/requisitos/rf-006 Posts.md`
* **Documentação da API:** `docs/api/swagger.json`

### ⚙️ Back-end

* **Back-end Laravel:** `backend/`
* **Controllers da API:** `backend/app/Http/Controllers/api/`
* **Controller de Posts:** `backend/app/Http/Controllers/api/PostController.php`
* **Models:** `backend/app/Models/`
* **Model de Post:** `backend/app/Models/Post.php`
* **Model de Enquete/Opção:** `backend/app/Models/enqueteopcao.php`
* **Migrations de Posts:** `backend/database/migrations/2026_10_12_020211_create_posts_table.php`
* **Rotas da API:** `backend/routes/api.php`

### 🎨 Front-end

* **Interface Vue.js:** `frontend/`
* **Página de Feed/Postagens:** `frontend/src/paginas/Feed.vue`
* **Configuração das rotas Vue:** `frontend/src/router/index.js`
* **Comunicação com a API:** `frontend/src/services/api.js`

---

## 🔎 1. Identificação do Requisito

| 📌 Campo | 📄 Informação |
| --- | --- |
| **🆔 ID** | RF-006 |
| **📋 Título** | Criação e Publicação de Postagens |
| **📂 Tipo** | Requisito Funcional |
| **🚨 Prioridade** | ALTA |
| **⚙️ Complexidade** | MÉDIA/ALTA |
| **📊 Status** | EM DESENVOLVIMENTO |
| **📅 Data de Criação** | 07/10/2026 |
| **🔄 Última Atualização** | 07/10/2026 |

### 📖 Descrição

O sistema deve permitir que usuários cadastrados criem e publiquem conteúdos na rede social Librando, utilizando diferentes formatos de mídia, como **texto, imagens, GIFs e vídeos**.

A funcionalidade prioriza a **comunicação visual**, proporcionando uma experiência simples e acessível para a comunidade surda. O usuário pode criar uma publicação, selecionar o formato de conteúdo desejado, visualizar uma prévia, e confirmar ou cancelar a operação.

---

## 📋 2. DESCRIÇÃO E ATORES

**Objetivo:** Descrever o requisito com clareza e identificar todos os atores envolvidos.

---

### 📖 Descrição Detalhada

**Por que este requisito existe?**

A funcionalidade existe para permitir que os usuários cadastrados da plataforma Librando possam criar e compartilhar conteúdos informativos e interativos com a comunidade.

Entre os principais benefícios estão:

* 🤟 **Facilitar a comunicação visual** entre os usuários da plataforma.
* 📱 **Permitir o compartilhamento de diferentes formatos de conteúdo** (texto, imagens, GIFs e vídeos).
* 💬 **Estimular a interação e participação da comunidade** dentro da rede social.
* 📰 **Centralizar os conteúdos produzidos** no feed principal da aplicação.

### 🏢 Contexto do Negócio

A Librando é uma rede social voltada para a **comunidade surda e para a acessibilidade**, tendo como foco a comunicação visual. A criação e publicação de postagens é uma funcionalidade essencial para conectar os usuários por meio de publicações dinâmicas e acessíveis.

---

## 👥 Atores do Sistema

### 1. 👤 USUÁRIO CADASTRADO (Ator Principal)

* **Papel:** Criar e publicar conteúdos no feed da plataforma.
* **Responsabilidade:** Inserir o conteúdo, selecionar mídias, visualizar a prévia e confirmar a publicação.

**Permissões:**

| Operação | Permissão | Descrição |
| --- | --- | --- |
| ➕ **CREATE** | ✅ | Criar novas publicações |
| 🔎 **READ** | ✅ | Visualizar publicações no feed |
| ✏️ **UPDATE** | ❌ | Não contemplado neste requisito |
| 🗑️ **DELETE** | ❌ | Não contemplado neste requisito |

---

### 2. ⚙️ SISTEMA (Ator Automático)

* **Papel:** Processar, validar e registrar as postagens enviadas.
* **Responsabilidade:** Validar dados e arquivos, registrar a publicação no banco de dados e disponibilizá-la no feed.

**Permissões:**

| Operação | Permissão | Descrição |
| --- | --- | --- |
| ➕ **CREATE** | ✅ | Registrar a postagem no banco de dados |
| 🔎 **READ** | ✅ | Consultar dados para validação e exibição |
| ✏️ **UPDATE** | ✅ | Atualizar dados de processamento se necessário |
| 🗑️ **DELETE** | ✅ | Remover registros corrompidos ou cancelados |

---

## 🔄 3. ESPECIFICAÇÃO DE CASOS DE USO + REQUISITOS NÃO-FUNCIONAIS

**Objetivo:** Descrever detalhadamente como a criação e publicação de postagens é executada.

---

## 📌 Caso de Uso (UC-006): Criar e Publicar Postagem

### Pré-Condições

* ✅ Usuário cadastrado e autenticado na plataforma;
* ✅ Acesso à tela de criação de postagens / feed;
* ✅ Sistema de armazenamento de mídia disponível.

### Pós-Condições (Sucesso)

* ✅ Publicação registrada no banco de dados MySQL;
* ✅ Conteúdo associado ao usuário criador;
* ✅ Publicação exibida corretamente no feed;
* ✅ Mensagem de sucesso exibida ao usuário.

### Pós-Condições (Falha)

* ❌ Publicação não é salva nem exibida no feed;
* ⚠️ Mensagem de erro informando o problema ocorrido;
* 🔄 Usuário pode corrigir os dados e tentar novamente.

---

### 🔄 Fluxo Principal

1. O usuário acessa a funcionalidade de criação de publicação.
2. O sistema exibe a interface de postagem.
3. O usuário seleciona o formato do conteúdo (texto, imagem, GIF ou vídeo).
4. O usuário insere o texto e/ou anexa os arquivos de mídia.
5. O sistema valida os dados inseridos.
6. O sistema exibe uma prévia da publicação.
7. O usuário confirma a ação clicando em **"Publicar"**.
8. O back-end processa os arquivos e registra a postagem no banco de dados.
9. O sistema exibe a mensagem **"Publicação realizada com sucesso!"** e atualiza o feed.

---

### ⚠️ Fluxos Alternativos

* **A1: Conteúdo obrigatório não preenchido** — O sistema impede a publicação, destaca o campo necessário e exibe um aviso.
* **A2: Arquivo de mídia inválido** — O sistema valida o formato do arquivo, bloqueia o envio caso não seja suportado e exibe uma mensagem de erro.
* **A3: Falha durante o processamento** — O sistema interrompe o registro, exibe uma mensagem de erro genérica e permite nova tentativa.

---

### 📋 Regras de Negócio (RN)

| ID | Regra | Descrição |
| --- | --- | --- |
| **RN-01** | Autenticação Obrigatória | Somente usuários autenticados podem publicar. |
| **RN-02** | Conteúdo Válido | A postagem deve conter texto ou mídia válida antes de ser enviada. |
| **RN-03** | Formatos Permitidos | Suporte a texto, imagem, GIF e vídeo. |
| **RN-04** | Validação de Mídia | Arquivos devem ser validados quanto a tipo e tamanho. |
| **RN-05** | Associação de Usuário | Toda publicação deve estar vinculada ao seu autor. |

---

### ⚙️ Requisitos Não-Funcionais (RNF)

| ID | Atributo | Requisito | Métrica | Justificativa |
| --- | --- | --- | --- | --- |
| **RNF-01** | ⚡ Performance | Resposta rápida nas ações de postagem | Resposta em até **2 segundos** | Garantir fluidez no uso |
| **RNF-02** | ♿ Acessibilidade | Interface visual clara e adequada à Librando | Elementos com contraste e identificação visual | Acessibilidade para surdos |
| **RNF-03** | 🔒 Segurança | Restrição de postagem para usuários logados | **100%** de validação de token/sessão | Evitar postagens anônimas não autorizadas |

---

## 🎨 4. PROTÓTIPO FUNCIONAL (HTML + CSS + PHP + MySQL + RENDER)

**Mockup - Tela 1: Bloco de Postagem (Estado Inicial / Caixa Vazia)**

```
┌─────────────────────────────────────────────────────────────┐
│                                                             │
│  (AD)  O que quer compartilhar em Libras ou texto?          │
│                                                             │
│  ─────────────────────────────────────────────────────────  │
│                                                             │
│  [📷 Vídeo / Imagem]    [📊 Enquete]                        │
│                                                             │
│  ┌───────────┐                                              │
│  │ Publicar  │                                              │
│  └───────────┘                                              │
│                                                             │
└─────────────────────────────────────────────────────────────┘

```

**Mockup - Tela 2: Bloco de Postagem (Estado Preenchido / Validação Visual)**

```
┌─────────────────────────────────────────────────────────────┐
│                                                             │
│  (AD)  Olá a todos! Vejam esse novo sinal em Libras!  ✅   │
│                                                             │
│  ─────────────────────────────────────────────────────────  │
│                                                             │
│  [📷 video_exemplo.mp4  ✅]    [📊 Enquete]                │
│                                                             │
│  ┌───────────┐                                              │
│  │ Publicar  │                                              │
│  └───────────┘                                              │
│                                                             │
└─────────────────────────────────────────────────────────────┘
```

**Mockup - Tela 3: Bloco de Postagem (Estado de Erro de Validação)**

```
┌─────────────────────────────────────────────────────────────┐
│                                                             │
│  (AD)  O que quer compartilhar em Libras ou texto?          │
│        O conteúdo da postagem não pode estar vazio.       ❌│
│                                                             │
│  ─────────────────────────────────────────────────────────  │
│                                                             │
│  [📷 arquivo_invalido.exe ❌]    [📊 Enquete]               │
│  Formato de arquivo não suportado.                          │
│                                                             │
│  ┌───────────┐                                              │
│  │ Publicar  │                                              │
│  └───────────┘                                              │
│                                                             │
└─────────────────────────────────────────────────────────────┘

```

**Descrição de Estados:**

* **Estado Normal:** Caixa de texto vazia, opções de inserção de mídia habilitadas e botão de publicação pronto.
* **Estado Preenchido:** Texto inserido corretamente e arquivo de mídia compatível anexado, ambos sinalizados com checkmark verde.
* **Estado Erro (Conteúdo Vazio):** Alerta visual indicando que a postagem não pode ser enviada sem texto ou mídia válida.
* **Estado Erro (Arquivo Inválido):** Destaque em vermelho informando que o formato do arquivo anexado não é permitido pela plataforma.

## Fluxo de Navegação

O fluxo funciona da seguinte maneira:

1. O usuário autenticado acessa a **Tela de Feed** da plataforma através do componente `Feed.vue`.
2. O sistema exibe o painel de criação de postagem no topo da página.
3. O usuário digita o conteúdo desejado e/ou seleciona arquivos de mídia (imagens, GIFs ou vídeos voltados à comunicação visual da comunidade surda).
4. O sistema realiza as validações iniciais no front-end: verifica se há conteúdo preenchido e se o arquivo de mídia possui extensão e tamanho permitidos. Caso haja erro, alertas visuais são exibidos.
5. Estando os dados corretos, o **front-end Vue** envia os dados via requisição `POST` através do Axios (`api.js`) para o endpoint protegido no back-end.
6. O **back-end Laravel** recebe a requisição por meio do `PostController.php` e executa as validações de segurança (verificando a sessão/token do usuário autenticado).
7. Caso o usuário não esteja autenticado ou os dados falhem nas regras de negócio, o back-end retorna uma resposta de erro e o sistema mantém o usuário na tela atual com o feedback visual.
8. Caso tudo esteja correto, o back-end processa o armazenamento dos arquivos de mídia e registra o novo post na tabela `posts` do banco de dados MySQL utilizando o Eloquent ORM.
9. O sistema exibe uma mensagem visual de sucesso (**"Publicação realizada com sucesso!"**), limpa o formulário de criação e atualiza dinamicamente o feed exibindo a nova postagem no topo.
10. Se o usuário decidir sair da página ou navegar para outra rota (como Perfil), ele é redirecionado sem submeter dados incompletos.

**Responsividade:**

* **Mobile (até 980px):** Layout em coluna única, redimensionando o feed e a caixa de postagem para ocupar toda a largura da tela.
* **Tablet (até 980px):** Layout otimizado em coluna única com espaçamento proporcional.
* **Desktop (980px+):** Layout em duas colunas (barra lateral de navegação/informações à esquerda e feed interativo com painel de postagens à direita).

---

## 🏗️ 5. ARQUITETURA E ADR

### Diagrama de Componentes

```text
┌─────────────────────────┐
│         FRONTEND        │
│ Vue.js 3 + Vite         │
│ Feed.vue + Axios        │
└────────────┬────────────┘
             │ HTTP/JSON (POST /api/posts)
             ▼
┌─────────────────────────┐
│         BACKEND         │
│ PHP + Laravel 12        │
│ PostController          │
└────────────┬────────────┘
             │ Eloquent ORM
             ▼
┌─────────────────────────┤
│      BANCO DE DADOS     │
│         MySQL           │
│    Tabela `posts`       │
└─────────────────────────┘

```
