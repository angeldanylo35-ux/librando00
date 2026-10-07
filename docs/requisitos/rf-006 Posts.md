# RF-006: CRIAÇÃO E PUBLICAÇÃO DE POSTAGENS

> ⚠ **LEMBRETE:** Este documento contempla **somente um requisito funcional**. Para múltiplos requisitos, devem ser criados documentos separados.

---

## 🎯 1. IDENTIFICAÇÃO DO REQUISITO (2%) ⭐ PESO: 2%

### Objetivo

Identificar de forma clara o requisito responsável pela criação e publicação de postagens na plataforma Librando, apresentando seu tipo, prioridade, complexidade e situação atual de desenvolvimento.

### Identificação

- **ID:** RF-006
- **Título:** Criação e Publicação de Postagens
- **Tipo:** Requisito Funcional
- **Prioridade:** **ALTA** — é uma funcionalidade essencial para o funcionamento da rede social e para a disponibilização de conteúdo no feed.
- **Complexidade:** **MÉDIA/ALTA** — estimado em **8 story points**
- **Status:** EM DESENVOLVIMENTO
- **Data de Criação:** 07/10/2026
- **Última Atualização:** 07/10/2026

### Breve Descrição

O sistema deve permitir que usuários cadastrados criem e publiquem conteúdos na rede social Librando, utilizando diferentes formatos de mídia, como textos, imagens, GIFs, vídeos e enquetes.

A funcionalidade deve priorizar a comunicação visual e proporcionar uma experiência simples e acessível para a comunidade surda, de acordo com a proposta da plataforma.

O usuário poderá criar uma publicação, selecionar o tipo de conteúdo, visualizar uma prévia, publicar ou cancelar a operação.

### CRITÉRIOS DE ACEITE PARA 2/2:

- [x] ID identificado corretamente como RF-006.
- [x] Título claro e descritivo.
- [x] Tipo identificado como Requisito Funcional.
- [x] Prioridade definida e justificada.
- [x] Complexidade estimada em story points.
- [x] Status do requisito informado.
- [x] Data de criação e atualização informadas.
- [x] Breve descrição apresenta claramente a finalidade do requisito.

---

## 📋 2. DESCRIÇÃO E ATORES (6%) ⭐ PESO REDUZIDO DE 10% PARA 6%

### Objetivo

Descrever detalhadamente o requisito de criação e publicação de postagens, apresentando seu objetivo dentro da plataforma Librando, seus benefícios para os usuários e os atores envolvidos no funcionamento da funcionalidade.

### Descrição Detalhada

O requisito existe para permitir que os usuários cadastrados da plataforma Librando possam produzir e compartilhar conteúdos com a comunidade.

A funcionalidade possibilita a criação de diferentes tipos de publicações, permitindo que o usuário escolha o formato mais adequado para transmitir sua informação.

A criação de postagens contribui para:

1. **Facilitar a comunicação visual** entre os usuários da plataforma.
2. **Permitir o compartilhamento de diferentes formatos de conteúdo**, como textos, imagens, GIFs, vídeos e enquetes.
3. **Estimular a interação e participação da comunidade** dentro da rede social.
4. **Centralizar conteúdos produzidos pelos usuários** no feed da plataforma.
5. **Fortalecer a proposta de acessibilidade e comunicação da Librando**, priorizando recursos adequados à comunidade surda.

### Contexto do Negócio

A Librando é uma rede social voltada para a comunidade surda e para a acessibilidade, oferecendo recursos que priorizam a comunicação visual.

Dentro desse contexto, a criação e publicação de postagens é uma funcionalidade fundamental, pois permite que os usuários compartilhem informações, opiniões, mídias e outros conteúdos com os demais participantes da plataforma.

O requisito deve proporcionar uma experiência simples, acessível e adequada à proposta da rede social.

### Atores do Sistema

#### 1. USUÁRIO CADASTRADO — Ator Principal

**Papel:**  
Utilizar a funcionalidade de criação e publicação de postagens.

**Responsabilidade:**  
Criar o conteúdo, selecionar o formato da publicação, inserir as informações necessárias, visualizar a publicação antes do envio e confirmar ou cancelar sua publicação.

**Permissões CRUD:**

- **CREATE:** Criar novas publicações.
- **READ:** Visualizar publicações disponibilizadas no feed.
- **UPDATE:** Não contemplado neste requisito.
- **DELETE:** Não contemplado neste requisito.

> **Observação:** A edição ou exclusão de uma publicação pelo próprio usuário não faz parte do escopo deste RF-006.

---

#### 2. ADMINISTRADOR SURDO — Ator Secundário

**Papel:**  
Acompanhar e realizar ações de moderação sobre conteúdos publicados na plataforma.

**Responsabilidade:**  
Visualizar publicações e realizar ações administrativas quando uma publicação estiver em desacordo com as regras da plataforma.

**Permissões CRUD:**

- **CREATE:** Não contemplado como responsabilidade principal deste requisito.
- **READ:** Visualizar publicações para fins de moderação.
- **UPDATE:** Realizar alterações administrativas quando aplicável à moderação.
- **DELETE:** Remover publicações que violem as regras da plataforma, conforme suas permissões.

---

#### 3. SISTEMA — Ator Automático

**Papel:**  
Processar e controlar automaticamente o fluxo de criação e publicação das postagens.

**Responsabilidade:**  

- Validar os dados enviados pelo usuário.
- Processar os conteúdos enviados.
- Verificar se os dados obrigatórios foram preenchidos.
- Processar os arquivos de mídia enviados.
- Registrar a publicação.
- Disponibilizar a publicação no feed após a confirmação.
- Informar o usuário sobre erros durante o processo.

**Permissões CRUD:**

- **CREATE:** Registrar a publicação no sistema.
- **READ:** Consultar dados necessários para validação e publicação.
- **UPDATE:** Atualizar informações de processamento da publicação quando necessário.
- **DELETE:** Cancelar ou remover registros quando houver necessidade operacional ou administrativa.

### CRITÉRIOS DE ACEITE PARA 10/10:

- [x] Descrição detalhada apresenta claramente a finalidade do requisito.
- [x] São apresentados pelo menos 3 benefícios para o negócio.
- [x] Contexto do negócio relacionado à proposta da Librando.
- [x] Mínimo de 3 atores identificados.
- [x] Papel de cada ator definido.
- [x] Responsabilidade de cada ator definida.
- [x] Permissões CRUD mapeadas para os atores.
- [x] Ator principal identificado.
- [x] Atores secundários e automático identificados.
- [x] Escopo do requisito delimitado.

---

## 📋 3. PRÉ-CONDIÇÕES

Para que o requisito possa ser executado:

- O usuário deve possuir uma conta cadastrada na plataforma.
- O usuário deve estar autenticado no sistema.
- O usuário deve possuir acesso à funcionalidade de criação de postagem.
- O sistema deve estar disponível para receber e processar a publicação.
- Os dados necessários para o tipo de publicação escolhido devem estar disponíveis.

---

## 🔄 4. FLUXO PRINCIPAL

1. O usuário acessa a funcionalidade de criação de postagem.
2. O sistema apresenta a interface para criação da publicação.
3. O usuário seleciona o tipo de conteúdo que deseja publicar.
4. O usuário insere o conteúdo da publicação.
5. Caso necessário, o usuário adiciona arquivos de mídia.
6. O sistema realiza as validações necessárias.
7. O usuário visualiza uma prévia da publicação.
8. O usuário confirma a publicação.
9. O sistema processa os dados e arquivos enviados.
10. O sistema registra a publicação.
11. O sistema disponibiliza a publicação no feed.
12. O sistema informa ao usuário que a publicação foi realizada com sucesso.

---

## 📝 5. FORMATOS DE PUBLICAÇÃO

O requisito deve permitir a criação de publicações nos seguintes formatos:

### Texto

Permite ao usuário escrever e publicar uma mensagem textual.

### Imagem

Permite o envio de uma imagem juntamente com a publicação.

### GIF

Permite o envio de um GIF como conteúdo da publicação.

### Vídeo

Permite o envio de um vídeo para ser disponibilizado na publicação.

### Enquete

Permite a criação de uma pergunta acompanhada de opções para interação dos demais usuários.

---

## ⚠️ 6. FLUXOS ALTERNATIVOS

### 6.1 Usuário cancela a publicação

1. O usuário inicia a criação da publicação.
2. O usuário seleciona a opção de cancelar.
3. O sistema interrompe o processo.
4. A publicação não é registrada.

### 6.2 Dados obrigatórios não preenchidos

1. O usuário tenta publicar o conteúdo.
2. O sistema identifica que existem dados obrigatórios ausentes.
3. O sistema informa quais informações precisam ser preenchidas.
4. O usuário corrige os dados.
5. O processo de publicação pode continuar.

### 6.3 Arquivo de mídia inválido

1. O usuário seleciona um arquivo.
2. O sistema realiza a validação.
3. O sistema identifica que o arquivo não atende aos requisitos necessários.
4. O sistema informa o problema ao usuário.
5. O arquivo não é utilizado na publicação.
6. O usuário pode selecionar outro arquivo.

### 6.4 Falha durante a publicação

1. O usuário confirma a publicação.
2. O sistema tenta processar o conteúdo.
3. Ocorre uma falha durante o processamento.
4. O sistema informa que a publicação não pôde ser concluída.
5. A publicação não deve ser disponibilizada no feed de forma incompleta.

---

## 🔐 7. REGRAS DE NEGÓCIO

- **RN-001:** Apenas usuários cadastrados e autenticados podem criar publicações.
- **RN-002:** Uma publicação deve possuir conteúdo válido antes de ser publicada.
- **RN-003:** O sistema deve validar os dados enviados antes de registrar a publicação.
- **RN-004:** Arquivos enviados devem ser processados e validados pelo sistema.
- **RN-005:** A publicação somente deve aparecer no feed após a confirmação do processo de publicação.
- **RN-006:** O usuário deve poder cancelar a criação antes da publicação.
- **RN-007:** Conteúdos que violem as regras da plataforma poderão ser submetidos a ações de moderação.
- **RN-008:** O sistema deve apresentar mensagens de erro quando uma publicação não puder ser concluída.
- **RN-009:** A funcionalidade deve considerar os princípios de acessibilidade da plataforma Librando.

---

## 🖥️ 8. INTERFACE DO FRONT-END

A interface de criação de postagem deve disponibilizar:

- Campo para inserção do conteúdo textual.
- Opção para seleção do tipo de publicação.
- Opção para adicionar imagens.
- Opção para adicionar GIFs.
- Opção para adicionar vídeos.
- Opção para criação de enquetes.
- Área de pré-visualização.
- Botão para publicar.
- Botão para cancelar.
- Mensagens de validação e erro.
- Feedback visual após a publicação.

A interface deve apresentar os elementos de maneira clara e organizada, facilitando a compreensão e utilização da funcionalidade.

---

## ♿ 9. ACESSIBILIDADE

A funcionalidade deve seguir a proposta de acessibilidade da Librando.

Devem ser considerados:

- Interface visual clara.
- Botões e ações identificáveis.
- Informações apresentadas de maneira objetiva.
- Feedback visual para ações realizadas.
- Elementos compatíveis com a proposta de comunicação visual da plataforma.
- Recursos adequados para utilização pela comunidade surda.
- Conteúdos de mídia devem considerar recursos de acessibilidade quando aplicáveis.

---

## 🔒 10. SEGURANÇA E PRIVACIDADE

- O sistema deve permitir a criação de publicações somente por usuários autenticados.
- Os dados enviados devem ser validados antes de serem armazenados.
- Os arquivos enviados devem ser processados de forma segura.
- O sistema deve impedir o envio de dados inválidos que possam comprometer a aplicação.
- As informações relacionadas ao usuário devem respeitar as regras de privacidade da plataforma.
- Ações administrativas sobre publicações devem respeitar as permissões atribuídas ao administrador.

---

## 📤 11. PÓS-CONDIÇÕES

Após a conclusão bem-sucedida do requisito:

- A publicação deve estar registrada no sistema.
- O conteúdo deve estar associado ao usuário responsável pela publicação.
- A publicação deve estar disponível no feed.
- O usuário deve receber uma confirmação da publicação.
- O conteúdo poderá ser visualizado e utilizado nas demais funcionalidades da rede social.

Caso a operação seja cancelada ou apresente erro:

- A publicação não deve ser disponibilizada no feed.
- O usuário deve receber uma informação sobre o cancelamento ou erro ocorrido.

---

## ✅ 12. CRITÉRIOS DE ACEITE

### CA-001 — Criar publicação de texto

**Dado que** o usuário está autenticado,  
**quando** inserir um texto válido e confirmar a publicação,  
**então** o sistema deve registrar e disponibilizar a publicação no feed.

### CA-002 — Publicar imagem

**Dado que** o usuário está autenticado,  
**quando** selecionar uma imagem válida e confirmar a publicação,  
**então** o sistema deve processar a imagem e disponibilizar a publicação no feed.

### CA-003 — Publicar GIF

**Dado que** o usuário está autenticado,  
**quando** selecionar um GIF válido e confirmar a publicação,  
**então** o sistema deve registrar a publicação.

### CA-004 — Publicar vídeo

**Dado que** o usuário está autenticado,  
**quando** selecionar um vídeo válido e confirmar a publicação,  
**então** o sistema deve processar o arquivo e disponibilizar a publicação.

### CA-005 — Criar enquete

**Dado que** o usuário está autenticado,  
**quando** criar uma enquete com os dados necessários e confirmar a publicação,  
**então** o sistema deve registrar e disponibilizar a enquete.

### CA-006 — Cancelar publicação

**Dado que** o usuário está criando uma publicação,  
**quando** selecionar a opção de cancelar,  
**então** o sistema não deve registrar a publicação.

### CA-007 — Validar dados

**Dado que** existem dados obrigatórios ausentes ou inválidos,  
**quando** o usuário tentar publicar,  
**então** o sistema deve impedir a publicação e apresentar uma mensagem informativa.

### CA-008 — Usuário não autenticado

**Dado que** o usuário não está autenticado,  
**quando** tentar acessar a criação de uma publicação,  
**então** o sistema deve impedir a criação da postagem.

---

## 🧪 13. CENÁRIOS DE TESTE

| ID | Cenário | Resultado Esperado |
|---|---|---|
| CT-001 | Criar publicação com texto válido | Publicação criada e exibida no feed |
| CT-002 | Criar publicação com imagem válida | Imagem processada e publicação criada |
| CT-003 | Criar publicação com GIF válido | GIF processado e publicação criada |
| CT-004 | Criar publicação com vídeo válido | Vídeo processado e publicação criada |
| CT-005 | Criar enquete válida | Enquete criada e exibida no feed |
| CT-006 | Cancelar publicação | Publicação não registrada |
| CT-007 | Tentar publicar sem conteúdo obrigatório | Sistema impede a publicação |
| CT-008 | Enviar arquivo inválido | Sistema rejeita o arquivo |
| CT-009 | Tentar publicar sem autenticação | Sistema impede a operação |
| CT-010 | Falha durante o processamento | Sistema informa o erro e não publica conteúdo incompleto |

---

## 📌 14. RELAÇÃO COM OUTROS REQUISITOS

O RF-006 possui relação com outras funcionalidades da plataforma Librando:

- **RF-001 — Cadastro, Login e Recuperação de Acesso:** necessário para que o usuário possua uma conta e possa acessar a plataforma.
- **RF-004 — Interações entre Usuários:** as publicações criadas poderão receber interações dos demais usuários.
- **RF-005 — Respostas em Vídeo:** pode utilizar conteúdos publicados como parte das interações.
- **RF-009 — Notificações:** poderá informar o usuário sobre interações relacionadas às suas publicações.
- **RF-011 — Denúncias e Fila de Moderação:** publicações poderão ser submetidas a denúncias e processos de moderação.
- **RF-012 — Painel do Administrador Surdo:** permite ações administrativas relacionadas às publicações.
- **RF-013 — Painel Root:** fornece recursos administrativos de maior nível sobre a plataforma.

---

## 📊 15. RESUMO DO REQUISITO

| Item | Informação |
|---|---|
| **ID** | RF-006 |
| **Título** | Criação e Publicação de Postagens |
| **Tipo** | Requisito Funcional |
| **Prioridade** | ALTA |
| **Complexidade** | MÉDIA/ALTA — 8 Story Points |
| **Status** | EM DESENVOLVIMENTO |
| **Ator Principal** | Usuário Cadastrado |
| **Atores Secundários** | Administrador Surdo |
| **Ator Automático** | Sistema |
| **Formatos** | Texto, imagem, GIF, vídeo e enquete |
| **Objetivo** | Permitir que usuários criem e publiquem conteúdos na rede social Librando |
| **Acessibilidade** | Comunicação visual e recursos voltados à comunidade surda |
| **Data de Criação** | 07/10/2026 |
| **Última Atualização** | 07/10/2026 |
