# 📝 RF-006: CRIAÇÃO E PUBLICAÇÃO DE POSTAGENS

# 📝 RF-006: CRIAÇÃO E PUBLICAÇÃO DE POSTAGENS

---

## 1. METADADOS DO PROJETO E DA EQUIPE

### 1.1 Identificação

- **NOME_DO_PROJETO:** Librando a rede social para surdos
- **DESCRICAO_BREVE:** Sistema web desenvolvido para a plataforma Librando, uma rede social voltada à comunidade surda. Nesta etapa do projeto, foram desenvolvidas as telas de recuperação e redefinição de senha, permitindo que os usuários solicitem a recuperação de acesso e definam uma nova senha de forma segura. Foram utilizadas as tecnologias Laravel, Vue.js, Vite, Axios, PHP e MySQL.

### 1.2 Localização dos Artefatos

- **LINK_REPOSITORIO_GITHUB:** https://github.com/seu-usuario/[seu-repo]
- **BRANCH_PRINCIPAL:** main ou develop
- **LINK_APLICACAO_DEPLOY:** https://[seu-projeto].github.io (GitHub Pages) ou Vercel, Netlify, etc.
- **LINK_BANCO_DADOS:** [Supabase, Firebase, MongoDB Atlas, etc.] (com acesso de leitura para professor)
- **LINK_DEMONSTRAÇÃO:** [URL funcional da aplicação em produção] Comentário

---

## 🎯 1. IDENTIFICAÇÃO DO REQUISITO 

### 🎯 Objetivo

Identificar claramente o requisito responsável pela criação e publicação de postagens na plataforma Librando, apresentando seu tipo, prioridade, complexidade e situação atual.

### 📋 Identificação do Requisito

| 🏷️ Informação | 📄 Descrição |
|---|---|
| 🆔 **ID** | RF-006 |
| 📝 **Título** | Criação e Publicação de Postagens |
| ⚙️ **Tipo** | Requisito Funcional |
| 🚨 **Prioridade** | ALTA |
| 📊 **Complexidade** | MÉDIA/ALTA (estimado 8 Story Points) |
| 🔄 **Status** | EM DESENVOLVIMENTO |
| 📅 **Data de Criação** | 07/10/2026 |
| 🔄 **Última Atualização** | 07/10/2026 |

### 📌 Breve Descrição

O sistema deve permitir que usuários cadastrados criem e publiquem conteúdos na rede social Librando, utilizando diferentes formatos de mídia, como **texto, imagens, GIFs, vídeos e enquetes**. 📝🖼️🎞️🎥📊

A funcionalidade deve priorizar a **comunicação visual** e proporcionar uma experiência simples e acessível para a comunidade surda, de acordo com a proposta da plataforma. 🤟♿

O usuário poderá criar uma publicação, selecionar o tipo de conteúdo, visualizar uma prévia, publicar ou cancelar a operação. 👤📱

---

## 📋 2. DESCRIÇÃO E ATORES

### 🎯 Objetivo

Descrever claramente o requisito de criação e publicação de postagens, apresentando seu objetivo dentro da plataforma Librando, seus benefícios e todos os atores envolvidos na execução da funcionalidade. 👥

### 📝 Descrição Detalhada

O requisito existe para permitir que os usuários cadastrados da plataforma Librando possam criar e compartilhar conteúdos com a comunidade. 🌐

A funcionalidade permitirá a criação de diferentes tipos de publicações, possibilitando que o usuário escolha o formato mais adequado para transmitir sua informação. 📝🖼️🎥

Entre os principais benefícios estão:

1. 🤟 **Facilitar a comunicação visual** entre os usuários da plataforma.
2. 📱 **Permitir o compartilhamento de diferentes formatos de conteúdo**, como textos, imagens, GIFs, vídeos e enquetes.
3. 💬 **Estimular a interação e participação da comunidade** dentro da rede social.
4. 📰 **Centralizar os conteúdos produzidos pelos usuários** no feed da plataforma.
5. ♿ **Contribuir para a proposta de acessibilidade da Librando**, priorizando recursos adequados à comunidade surda.

### 🌐 Contexto do Negócio

A Librando é uma rede social voltada para a **comunidade surda e para a acessibilidade**, tendo como foco a comunicação visual e a interação entre seus usuários. 🤟♿

Nesse contexto, a criação e publicação de postagens é uma funcionalidade essencial para permitir que os usuários compartilhem informações, opiniões, mídias e outros conteúdos com os demais participantes da plataforma. 💬🖼️🎥

A funcionalidade deve proporcionar uma experiência **simples, acessível e adequada à proposta da rede social**. 💻📱

### 👥 Atores do Sistema

#### 1. 👤 USUÁRIO CADASTRADO — Ator Principal

**🎭 Papel:**  
Utilizar a funcionalidade de criação e publicação de postagens.

**📌 Responsabilidade:**  
Criar o conteúdo, selecionar o formato da publicação, inserir as informações necessárias, visualizar a publicação antes do envio e confirmar ou cancelar sua publicação.

**🔐 Permissões CRUD:**

| 🔧 Operação | Permissão | 📌 Descrição |
|---|:---:|---|
| **CREATE** | ✅ | Criar novas publicações. |
| **READ** | ✅ | Visualizar publicações disponíveis no feed. |
| **UPDATE** | ❌ | Não contemplado neste requisito. |
| **DELETE** | ❌ | Não contemplado neste requisito. |

---

#### 2. ⚙️ SISTEMA — Ator Automático

**🎭 Papel:**  
Processar e controlar automaticamente o fluxo de criação e publicação das postagens.

**📌 Responsabilidade:**

- 🔎 Validar os dados enviados pelo usuário.
- 📁 Processar os arquivos enviados.
- ✔️ Verificar os dados necessários para a publicação.
- 💾 Registrar a publicação.
- 📰 Disponibilizar o conteúdo no feed após a publicação.
- ⚠️ Informar o usuário sobre erros ou problemas durante o processo.

**🔐 Permissões CRUD:**

| 🔧 Operação | Permissão | 📌 Descrição |
|---|:---:|---|
| **CREATE** | ✅ | Registrar a publicação no sistema. |
| **READ** | ✅ | Consultar os dados necessários para validação e publicação. |
| **UPDATE** | ✅ | Atualizar informações relacionadas ao processamento da publicação quando necessário. |
| **DELETE** | ✅ | Cancelar ou remover registros quando necessário para o funcionamento do sistema. |

# 🔄 3. ESPECIFICAÇÃO DE CASOS DE USO + REQUISITOS NÃO-FUNCIONAIS 

### 🎯 Objetivo

Descrever detalhadamente como o requisito de **criação e publicação de postagens** é executado na plataforma Librando, apresentando suas pré-condições, pós-condições, fluxo principal, fluxos alternativos, regras de negócio e requisitos não-funcionais.

---

## 📱 Caso de Uso (UC-006): Criar e Publicar Postagem

### 🔐 Pré-Condições

- ✅ Usuário cadastrado na plataforma.
- ✅ Usuário autenticado no sistema.
- ✅ Usuário possui acesso à funcionalidade de criação de postagem.
- ✅ Sistema disponível para receber e processar a publicação.
- ✅ Serviço de armazenamento disponível para arquivos de mídia, quando necessário.

---

### ✅ Pós-Condições (Sucesso)

- ✅ Publicação registrada no sistema.
- ✅ Conteúdo associado ao usuário responsável pela publicação.
- ✅ Publicação disponibilizada no feed.
- ✅ Arquivos de mídia armazenados corretamente, quando utilizados.
- ✅ Usuário recebe confirmação visual de que a publicação foi realizada.

---

### ❌ Pós-Condições (Falha)

- ❌ Publicação não é registrada no sistema.
- ❌ Conteúdo incompleto não é disponibilizado no feed.
- ⚠️ Usuário recebe uma mensagem informando o erro ocorrido.
- 🔄 Usuário pode corrigir os dados ou tentar realizar a publicação novamente.

---

## 🔄 Fluxo Principal

1. 👤 Usuário acessa a funcionalidade **"Criar Publicação"**.
2. 🖥️ Sistema exibe a interface de criação de postagem.
3. 📝 Usuário seleciona o tipo de conteúdo que deseja publicar.
4. ✍️ Usuário insere o conteúdo da publicação.
5. 📎 Usuário adiciona arquivos de mídia, caso necessário.
6. 🔎 Sistema valida os dados inseridos pelo usuário.
7. 👁️ Sistema apresenta uma prévia da publicação.
8. 👤 Usuário verifica o conteúdo da publicação.
9. 📤 Usuário seleciona a opção **"Publicar"**.
10. 🔎 Sistema realiza novamente a validação dos dados antes de concluir a publicação.
11. 📁 Sistema processa os arquivos de mídia enviados, quando existentes.
12. 💾 Sistema registra a publicação.
13. 📰 Sistema disponibiliza a publicação no feed.
14. ✅ Sistema exibe a mensagem **"Publicação realizada com sucesso!"**.
15. 👤 Usuário visualiza sua publicação no feed.

---

## ⚠️ Fluxos Alternativos

### 🔴 Fluxo Alternativo A1: Conteúdo obrigatório não preenchido

**4a.1.** Sistema identifica que o conteúdo obrigatório não foi preenchido.  
**4a.2.** Sistema impede a publicação.  
**4a.3.** Sistema exibe uma mensagem informando que o conteúdo é obrigatório.  
**4a.4.** Campo necessário é destacado para o usuário.  
**4a.5.** Usuário preenche o conteúdo necessário.  
**4a.6.** Sistema realiza novamente a validação.

---

### 📁 Fluxo Alternativo A2: Arquivo de mídia inválido

**5a.1.** Usuário seleciona um arquivo para adicionar à publicação.  
**5a.2.** Sistema verifica o arquivo enviado.  
**5a.3.** Sistema identifica que o arquivo não atende aos requisitos permitidos.  
**5a.4.** Sistema impede a utilização do arquivo na publicação.  
**5a.5.** Sistema exibe uma mensagem informando que o arquivo é inválido.  
**5a.6.** Usuário pode selecionar outro arquivo ou continuar sem a mídia.

---

### 🌐 Fluxo Alternativo A3: Falha durante a publicação

**9a.1.** Usuário confirma a publicação.  
**9a.2.** Sistema tenta processar e registrar a publicação.  
**9a.3.** Sistema identifica uma falha durante o processamento.  
**9a.4.** Sistema impede que a publicação incompleta seja disponibilizada no feed.  
**9a.5.** Sistema exibe a mensagem **"Não foi possível realizar a publicação. Tente novamente."**  
**9a.6.** Usuário pode tentar realizar a publicação novamente.

---

## 📋 Regras de Negócio (RN)

| 🆔 ID | 📌 Regra | 📝 Descrição |
|---|---|---|
| **RN-01** | Usuário Autenticado | Somente usuários cadastrados e autenticados podem criar e publicar postagens. |
| **RN-02** | Conteúdo Obrigatório | A publicação deve possuir conteúdo válido antes de ser publicada. |
| **RN-03** | Tipos de Conteúdo | O sistema deve permitir publicações nos formatos definidos pela plataforma: texto, imagem, GIF, vídeo e enquete. |
| **RN-04** | Validação de Mídia | Arquivos enviados devem ser validados antes de serem associados à publicação. |
| **RN-05** | Publicação no Feed | A publicação somente deve ser disponibilizada no feed após a conclusão do processo de publicação. |
| **RN-06** | Cancelamento | O usuário pode cancelar a criação da publicação antes de confirmá-la. |
| **RN-07** | Dados da Publicação | A publicação deve ser associada ao usuário responsável por sua criação. |
| **RN-08** | Conteúdo Incompleto | O sistema não deve disponibilizar no feed uma publicação que não tenha sido concluída corretamente. |

---

## ⚙️ Requisitos Não-Funcionais (RNF)

| 🆔 ID | 🏷️ Atributo | 📋 Requisito | 📏 Métrica | 💡 Justificativa |
|---|---|---|---|---|
| **RNF-01** | ⚡ Performance | A interface de criação de postagem deve apresentar as ações do usuário de forma rápida e responsiva. | Resposta das ações principais em até **2 segundos**, em condições normais de uso. | 🧑‍💻 Proporcionar uma experiência fluida durante a criação da publicação. |
| **RNF-02** | ♿ Acessibilidade | A funcionalidade deve possuir uma interface acessível e adequada à proposta da Librando. | Elementos da interface devem possuir identificação visual clara e permitir a utilização dos recursos de criação. | 🤟 Facilitar a utilização da plataforma pela comunidade surda. |
| **RNF-03** | 🔒 Segurança | O sistema deve permitir a criação de publicações somente por usuários autenticados. | **100%** das tentativas de publicação devem passar por validação de autenticação. | 🛡️ Impedir que usuários não autorizados publiquem conteúdos. |
| **RNF-04** | 📱 Usabilidade | A interface de criação deve apresentar os tipos de publicação e ações disponíveis de forma clara. | Usuário deve conseguir identificar as principais ações sem necessidade de conhecimento técnico. | 👍 Facilitar o uso da funcionalidade. |
| **RNF-05** | 🌐 Disponibilidade | A funcionalidade deve estar disponível enquanto o sistema estiver em funcionamento. | Disponibilidade mínima de **99%** em produção. | 🔄 Garantir que os usuários possam criar e publicar conteúdos de forma consistente. |
