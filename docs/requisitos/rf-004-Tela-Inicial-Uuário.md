## 🔎 1. Identificação do Requisito

| 📌 Campo📄 Informação     |                     |
| ------------------------- | ------------------- |
| **🆔 ID**                 | RF-004              |
| **📋 Título**             | Tela Inicial / Feed |
| **📂 Tipo**               | Requisito Funcional |
| **🚨 Prioridade**         | ALTA                |
| **⚙️ Complexidade**       | ALTA                |
| **📊 Status**             | EM DESENVOLVIMENTO  |
| **📅 Data de Criação**    | 18/09/2026          |
| **🔄 Última Atualização** | 18/09/2026          |

### 📖 Descrição

O sistema deve disponibilizar uma **tela inicial após o login**, funcionando como o feed principal da rede social Librando.

Após realizar a autenticação com sucesso, o usuário deverá ser direcionado automaticamente para essa tela, onde poderá visualizar as publicações disponíveis na plataforma.

O feed deverá apresentar informações básicas de cada publicação, como **nome e foto do autor, conteúdo publicado e data ou horário da publicação**.

Considerando a proposta do Librando como uma rede social visual voltada à comunidade surda, o feed deverá possuir suporte para conteúdos em diferentes formatos, incluindo **texto, imagens, GIFs e vídeos**, com destaque para conteúdos visuais e vídeos em Libras.

Os vídeos apresentados nas publicações deverão poder ser reproduzidos diretamente na tela inicial, sem necessidade de o usuário sair do feed.

A tela deverá possuir os elementos de navegação necessários para que o usuário possa acessar outras funcionalidades da plataforma, como seu próprio perfil, perfis de outros usuários e criação de novas publicações.

A estrutura das publicações também deverá reservar espaço para funcionalidades de interação, como **reações e comentários**, que serão desenvolvidas em seus respectivos requisitos funcionais.

Caso não existam publicações disponíveis, o sistema deverá apresentar uma mensagem visual informando ao usuário que ainda não existem conteúdos para serem exibidos.

Caso ocorra algum problema durante o carregamento do feed, o sistema deverá apresentar uma mensagem de erro clara e permitir uma nova tentativa de carregamento.

---

## 📋 2. DESCRIÇÃO E ATORES

**Objetivo:** Descrever o requisito com clareza e identificar todos os atores envolvidos.

---

### 📖 Descrição Detalhada

**Por que este requisito existe?**

O sistema precisa disponibilizar uma tela inicial para centralizar os principais conteúdos e permitir que o usuário tenha acesso às funcionalidades da rede social após realizar o login.

A funcionalidade existe para:

* 🏠 Disponibilizar uma página principal após a autenticação do usuário;
* 📱 Centralizar as publicações disponíveis na plataforma;
* 🤟 Dar destaque a conteúdos visuais e vídeos em Libras;
* 🖼️ Permitir a visualização de textos, imagens, GIFs e vídeos;
* ▶️ Permitir a reprodução de vídeos diretamente no feed;
* 👤 Facilitar o acesso aos perfis dos autores das publicações;
* 🧭 Facilitar a navegação para outras funcionalidades da plataforma;
* 💬 Preparar a interface para futuras interações com publicações;
* ♿ Garantir que as informações importantes sejam apresentadas de forma visual e acessível.

### 🏢 Contexto do Negócio

A rede social Librando possui como proposta oferecer um ambiente de comunicação e interação voltado à comunidade surda, utilizando principalmente recursos visuais como vídeos em Libras, GIFs, imagens e interações por vídeo.

Após realizar o login com sucesso, o usuário deverá ser direcionado para a tela inicial da plataforma.

Essa tela funcionará como o **feed principal do Librando**, permitindo que o usuário visualize conteúdos publicados pelos usuários da rede e, futuramente, conteúdos provenientes das comunidades das quais participa.

Cada publicação deverá apresentar as informações necessárias para identificar seu autor e visualizar o conteúdo compartilhado.

Os conteúdos poderão incluir texto, imagens, GIFs e vídeos. Os vídeos deverão possuir reprodução integrada ao próprio feed para facilitar o consumo de conteúdos em Libras.

A tela inicial também deverá permitir que o usuário navegue para outras áreas da plataforma, como seu perfil, perfis de outros usuários e criação de publicações.

Funcionalidades específicas de interação, como seguir usuários, reagir, comentar ou responder utilizando vídeo, serão implementadas em seus respectivos requisitos funcionais, porém a estrutura visual do feed deverá estar preparada para receber essas funcionalidades.

---

## 👥 Atores do Sistema

### 1. 👤 USUÁRIO CADASTRADO (Ator Principal)

* **Papel:** Acessar a tela inicial da plataforma e visualizar as publicações disponíveis no feed.
* **Responsabilidade:** Estar autenticado na plataforma, navegar pelo feed, visualizar os conteúdos disponíveis e utilizar os elementos de navegação para acessar outras funcionalidades.

**Permissões:**

| OperaçãoPermissãoDescrição |   |                                                                      |
| -------------------------- | - | -------------------------------------------------------------------- |
| ➕ **CREATE**               | ❌ | A criação de publicações será tratada em requisito funcional próprio |
| 🔎 **READ**                | ✅ | Visualiza publicações e informações disponíveis no feed              |
| ✏️ **UPDATE**              | ❌ | Não altera conteúdos diretamente através deste requisito             |
| 🗑️ **DELETE**             | ❌ | Não exclui conteúdos diretamente através deste requisito             |

---

### 2. ⚙️ SISTEMA (Ator Automático)

* **Papel:** Controlar o carregamento, organização e apresentação da tela inicial e das publicações disponíveis.
* **Responsabilidade:** Verificar se o usuário está autenticado, carregar as publicações disponíveis, organizar os conteúdos do feed, apresentar corretamente textos, imagens, GIFs e vídeos e informar ao usuário eventuais problemas no carregamento.

**Permissões:**

| OperaçãoPermissãoDescrição |   |                                                                                |
| -------------------------- | - | ------------------------------------------------------------------------------ |
| ➕ **CREATE**               | ❌ | Não cria publicações através deste requisito                                   |
| 🔎 **READ**                | ✅ | Consulta usuários, publicações e conteúdos necessários para composição do feed |
| ✏️ **UPDATE**              | ❌ | Não altera o conteúdo das publicações através deste requisito                  |
| 🗑️ **DELETE**             | ❌ | Não exclui publicações através deste requisito                                 |

---

## 🔄 3. ESPECIFICAÇÃO DE CASOS DE USO + REQUISITOS NÃO-FUNCIONAIS

**Objetivo:** Descrever detalhadamente como o requisito da tela inicial e feed é executado, incluindo pré-condições, pós-condições, fluxo principal, fluxos alternativos, regras de negócio e requisitos não-funcionais.

---

## 📌 Caso de Uso (UC-004): Acessar Tela Inicial / Feed

### Pré-Condições

* ✅ Usuário possui uma conta cadastrada na plataforma;
* ✅ Usuário realizou o login com sucesso;
* ✅ Usuário possui uma sessão válida e autenticada;
* ✅ Sistema está disponível para carregar a tela inicial;
* ✅ Sistema possui acesso aos dados necessários para consultar as publicações.

### Pós-Condições (Sucesso)

* ✅ Usuário é direcionado para a tela inicial da plataforma;
* ✅ Feed é carregado corretamente;
* ✅ Publicações disponíveis são apresentadas ao usuário;
* ✅ Nome e foto do autor são apresentados nas publicações;
* ✅ Conteúdos em texto, imagem, GIF ou vídeo são exibidos corretamente;
* ✅ Vídeos disponíveis podem ser reproduzidos diretamente no feed;
* ✅ Elementos de navegação da plataforma permanecem disponíveis;
* ✅ Usuário pode continuar navegando para outras funcionalidades da plataforma.

### Pós-Condições (Falha)

* ✅ Sistema não apresenta informações inconsistentes ou incompletas como se estivessem carregadas corretamente;
* ✅ Sistema exibe uma mensagem correspondente ao problema encontrado;
* ✅ Usuário permanece informado sobre o estado do carregamento;
* ✅ Sistema permite uma nova tentativa quando ocorrer falha no carregamento do feed;
* ✅ Caso não existam publicações, o sistema apresenta um estado vazio informativo.

---

### 🔄 Fluxo Principal

1. Usuário realiza o login na plataforma.
2. Sistema valida as credenciais do usuário.
3. Sistema confirma que o usuário está autenticado.
4. Sistema direciona o usuário para a tela inicial do Librando.
5. Sistema inicia o carregamento do feed.
6. Sistema consulta as publicações disponíveis.
7. Sistema organiza as publicações conforme a regra de ordenação definida para o feed.
8. Sistema apresenta as publicações na tela inicial.
9. Sistema exibe o nome e a foto do autor de cada publicação.
10. Sistema exibe o conteúdo textual da publicação, quando existente.
11. Sistema exibe imagens presentes na publicação, quando existentes.
12. Sistema exibe GIFs presentes na publicação, quando existentes.
13. Sistema exibe vídeos presentes na publicação, quando existentes.
14. Usuário pode iniciar a reprodução de um vídeo diretamente pelo feed.
15. Sistema mantém disponíveis os elementos de navegação da plataforma.
16. Usuário pode continuar navegando pelo feed ou acessar outras funcionalidades disponíveis.

---

### ⚠️ Fluxo Alternativo A1: Nenhuma publicação disponível

6a.1. Sistema consulta as publicações disponíveis.
6a.2. Sistema identifica que não existem publicações disponíveis para serem apresentadas.
6a.3. Sistema não apresenta um espaço vazio sem orientação.
6a.4. Sistema exibe uma mensagem visual informando que ainda não existem publicações disponíveis.
6a.5. Usuário permanece na tela inicial e pode utilizar as demais opções de navegação.

---

### ⚠️ Fluxo Alternativo A2: Falha ao carregar o feed

6b.1. Sistema tenta consultar as publicações disponíveis.
6b.2. Ocorre uma falha durante a consulta ou carregamento dos dados.
6b.3. Sistema interrompe o carregamento das publicações afetadas.
6b.4. Sistema apresenta uma mensagem informando que não foi possível carregar o feed.
6b.5. Sistema disponibiliza uma opção para tentar o carregamento novamente.
6b.6. Usuário solicita uma nova tentativa.
6b.7. Sistema realiza novamente a consulta das publicações.

---

### ⚠️ Fluxo Alternativo A3: Conteúdo da publicação indisponível

11a.1. Sistema identifica que determinado arquivo associado à publicação não está disponível.
11a.2. Sistema mantém a estrutura da publicação quando possível.
11a.3. Sistema informa visualmente que aquele conteúdo não pôde ser carregado.
11a.4. Sistema continua carregando normalmente as demais publicações do feed.
11a.5. A indisponibilidade de uma publicação não deve impedir a utilização de todo o feed.

---

### ⚠️ Fluxo Alternativo A4: Vídeo não pode ser reproduzido

14a.1. Usuário tenta reproduzir um vídeo apresentado no feed.
14a.2. Sistema identifica uma falha ou indisponibilidade do arquivo.
14a.3. Sistema não inicia a reprodução.
14a.4. Sistema apresenta uma mensagem visual informando que o vídeo não pôde ser reproduzido.
14a.5. Usuário pode continuar navegando normalmente pelas demais publicações.

---

### ⚠️ Fluxo Alternativo A5: Sessão do usuário inválida ou expirada

3a.1. Sistema verifica que a sessão do usuário não é mais válida.
3a.2. Sistema impede o acesso ao conteúdo autenticado da tela inicial.
3a.3. Sistema informa ao usuário que será necessário realizar uma nova autenticação.
3a.4. Sistema direciona o usuário para a tela de login.
3a.5. Após realizar uma nova autenticação com sucesso, o usuário poderá acessar novamente a tela inicial.

---

### 📋 Regras de Negócio (RN)

| IDRegraDescrição |                         |                                                                                                                                           |
| ---------------- | ----------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| **RN-01**        | Usuário Autenticado     | Somente usuários autenticados podem acessar a tela inicial e o feed principal da plataforma.                                              |
| **RN-02**        | Redirecionamento        | Após o login realizado com sucesso, o usuário deve ser direcionado para a tela inicial da plataforma.                                     |
| **RN-03**        | Identificação do Autor  | Toda publicação apresentada no feed deve possuir identificação do usuário responsável pelo conteúdo.                                      |
| **RN-04**        | Conteúdos Visuais       | O feed deve permitir a apresentação de texto, imagens, GIFs e vídeos conforme o conteúdo existente em cada publicação.                    |
| **RN-05**        | Reprodução de Vídeo     | Vídeos apresentados no feed devem poder ser reproduzidos diretamente na plataforma quando estiverem disponíveis.                          |
| **RN-06**        | Conteúdo em Libras      | A interface do feed deve permitir a apresentação adequada de vídeos utilizados para comunicação em Libras.                                |
| **RN-07**        | Publicação Indisponível | A indisponibilidade de um conteúdo não deve impedir o carregamento das demais publicações disponíveis.                                    |
| **RN-08**        | Feed Vazio              | Quando não existirem publicações disponíveis, o sistema deve apresentar uma mensagem visual informativa ao usuário.                       |
| **RN-09**        | Navegação               | A tela inicial deve disponibilizar os meios necessários para o acesso às principais áreas da plataforma.                                  |
| **RN-10**        | Ordenação do Feed       | As publicações devem ser apresentadas conforme o critério de ordenação definido pela plataforma.                                          |
| **RN-11**        | Funcionalidades Futuras | Espaços destinados a reações e comentários podem estar presentes visualmente, sendo seu funcionamento definido em requisitos específicos. |
| **RN-12**        | Acessibilidade          | As informações essenciais da tela inicial não devem depender exclusivamente de áudio para serem compreendidas.                            |

---

### ⚙️ Requisitos Não-Funcionais (RNF)

| IDAtributoRequisitoMétricaJustificativa |                    |                                                                                                                                         |                                             |                                                                          |
| --------------------------------------- | ------------------ | --------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------- | ------------------------------------------------------------------------ |
| **RNF-01**                              | ⚡ Performance      | A tela inicial e as primeiras publicações do feed devem iniciar seu carregamento em até aproximadamente 2 segundos em condições normais | Tempo inicial de resposta ≤ 2 segundos      | Evitar espera excessiva ao acessar a página principal                    |
| **RNF-02**                              | 🛡️ Segurança      | O acesso à tela inicial deve exigir uma sessão autenticada e a comunicação entre usuário e servidor deve utilizar HTTPS                 | Sessão válida e comunicação via HTTPS       | Proteger dados e conteúdos acessados pelo usuário                        |
| **RNF-03**                              | ♿ Acessibilidade   | Informações importantes, mensagens de erro e estados do feed devem ser apresentados visualmente                                         | Feedbacks visuais disponíveis               | Garantir que informações relevantes não dependam exclusivamente de áudio |
| **RNF-04**                              | 🤟 Acessibilidade  | Vídeos em Libras devem possuir espaço visual adequado para permitir a identificação dos sinais e movimentos                             | Reprodução visual adequada                  | Facilitar a compreensão dos conteúdos em Libras                          |
| **RNF-05**                              | ▶️ Usabilidade     | Vídeos devem possuir controles visuais de reprodução acessíveis diretamente no feed                                                     | Controles visuais disponíveis               | Facilitar a interação com conteúdos em vídeo                             |
| **RNF-06**                              | ⌨️ Acessibilidade  | Os principais elementos de navegação e interação da tela inicial devem permitir navegação por teclado                                   | Elementos acessíveis via teclado            | Facilitar a utilização da plataforma                                     |
| **RNF-07**                              | 📱 Responsividade  | A tela inicial deve adaptar-se a computadores, notebooks, tablets e smartphones                                                         | Interface adaptável a diferentes resoluções | Garantir boa experiência em diferentes dispositivos                      |
| **RNF-08**                              | 💬 Usabilidade     | O sistema deve apresentar feedback visual durante carregamentos, erros, ausência de conteúdos e demais estados relevantes               | Feedback visual nas principais situações    | Manter o usuário informado sobre o estado da interface                   |
| **RNF-09**                              | 👁️ Acessibilidade | Textos, botões, ícones, publicações e elementos de navegação devem possuir contraste visual adequado                                    | Contraste adequado entre elementos          | Facilitar a leitura e identificação dos componentes                      |
