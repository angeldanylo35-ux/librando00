# RF-006: CRIAÇÃO E PUBLICAÇÃO DE POSTAGENS

---

## 🎯 1. IDENTIFICAÇÃO DO REQUISITO (2%) ⭐ PESO: 2%

### Objetivo

Identificar claramente o requisito responsável pela criação e publicação de postagens na plataforma Librando, apresentando seu tipo, prioridade, complexidade e situação atual.

### Identificação do Requisito

- **ID:** RF-006
- **Título:** Criação e Publicação de Postagens
- **Tipo:** Requisito Funcional
- **Prioridade:** ALTA
- **Complexidade:** MÉDIA/ALTA (estimado 8 Story Points)
- **Status:** EM DESENVOLVIMENTO
- **Data de Criação:** 07/10/2026
- **Última Atualização:** 07/10/2026

### Breve Descrição

O sistema deve permitir que usuários cadastrados criem e publiquem conteúdos na rede social Librando, utilizando diferentes formatos de mídia, como texto, imagens, GIFs, vídeos e enquetes.

A funcionalidade deve priorizar a comunicação visual e proporcionar uma experiência simples e acessível para a comunidade surda, de acordo com a proposta da plataforma.

O usuário poderá criar uma publicação, selecionar o tipo de conteúdo, visualizar uma prévia, publicar ou cancelar a operação.

---

## 📋 2. DESCRIÇÃO E ATORES (6%) ⭐ PESO REDUZIDO DE 10% PARA 6%

### Objetivo

Descrever claramente o requisito de criação e publicação de postagens, apresentando seu objetivo dentro da plataforma Librando, seus benefícios e todos os atores envolvidos na execução da funcionalidade.

### Descrição Detalhada

O requisito existe para permitir que os usuários cadastrados da plataforma Librando possam criar e compartilhar conteúdos com a comunidade.

A funcionalidade permitirá a criação de diferentes tipos de publicações, possibilitando que o usuário escolha o formato mais adequado para transmitir sua informação.

Entre os principais benefícios estão:

1. **Facilitar a comunicação visual** entre os usuários da plataforma.
2. **Permitir o compartilhamento de diferentes formatos de conteúdo**, como textos, imagens, GIFs, vídeos e enquetes.
3. **Estimular a interação e participação da comunidade** dentro da rede social.
4. **Centralizar os conteúdos produzidos pelos usuários** no feed da plataforma.
5. **Contribuir para a proposta de acessibilidade da Librando**, priorizando recursos adequados à comunidade surda.

### Contexto do Negócio

A Librando é uma rede social voltada para a comunidade surda e para a acessibilidade, tendo como foco a comunicação visual e a interação entre seus usuários.

Nesse contexto, a criação e publicação de postagens é uma funcionalidade essencial para permitir que os usuários compartilhem informações, opiniões, mídias e outros conteúdos com os demais participantes da plataforma.

A funcionalidade deve proporcionar uma experiência simples, acessível e adequada à proposta da rede social.

### Atores do Sistema

#### 1. USUÁRIO CADASTRADO — Ator Principal

**Papel:**  
Utilizar a funcionalidade de criação e publicação de postagens.

**Responsabilidade:**  
Criar o conteúdo, selecionar o formato da publicação, inserir as informações necessárias, visualizar a publicação antes do envio e confirmar ou cancelar sua publicação.

**Permissões CRUD:**

- **CREATE:** Criar novas publicações.
- **READ:** Visualizar publicações disponíveis no feed.
- **UPDATE:** Não contemplado neste requisito.
- **DELETE:** Não contemplado neste requisito.

---

#### 2. SISTEMA — Ator Automático

**Papel:**  
Processar e controlar automaticamente o fluxo de criação e publicação das postagens.

**Responsabilidade:**

- Validar os dados enviados pelo usuário.
- Processar os arquivos enviados.
- Verificar os dados necessários para a publicação.
- Registrar a publicação.
- Disponibilizar o conteúdo no feed após a publicação.
- Informar o usuário sobre erros ou problemas durante o processo.

**Permissões CRUD:**

- **CREATE:** Registrar a publicação no sistema.
- **READ:** Consultar os dados necessários para validação e publicação.
- **UPDATE:** Atualizar informações relacionadas ao processamento da publicação quando necessário.
- **DELETE:** Cancelar ou remover registros quando necessário para o funcionamento do sistema.
