# RF-006: Criação e Publicação de Postagens

## 🎯 1. IDENTIFICAÇÃO DO REQUISITO&#x20;

**ID:** RF-006
**Título:** Criação e Publicação de Postagens
**Tipo:** Requisito Funcional
**Prioridade:** ALTA
**Complexidade:** MÉDIA/ALTA (estimado 8 story points)
**Status:** EM DESENVOLVIMENTO
**Data de Criação:** 07/10/2026
**Última Atualização:** 07/10/2026

### Breve Descrição

O sistema deve permitir que usuários cadastrados criem e publiquem conteúdos na rede social, utilizando diferentes formatos de mídia, como texto, imagens, GIFs, vídeos e enquetes.

A funcionalidade deve priorizar a comunicação visual e proporcionar uma experiência simples e acessível para a comunidade surda, de acordo com a proposta da plataforma.

O usuário poderá criar uma publicação, selecionar o tipo de conteúdo, visualizar uma prévia, publicar ou cancelar a operação.

---

# 👤 2. ATORES ENVOLVIDOS

### Ator Principal

**Usuário Cadastrado**

Responsável por criar, configurar e publicar conteúdos na plataforma.

### Atores Secundários

**Sistema**

Responsável por validar os dados da publicação, processar os arquivos enviados e disponibilizar o conteúdo no feed.

---

# 📋 3. PRÉ-CONDIÇÕES

Para realizar uma publicação, devem ser atendidas as seguintes condições:

1. O usuário deve possuir uma conta cadastrada.
2. O usuário deve estar autenticado na plataforma.
3. A sessão do usuário deve estar válida.
4. O usuário deve possuir permissão para publicar.
5. O conteúdo enviado deve atender às regras de publicação da plataforma.

---

# 🔄 4. FLUXO PRINCIPAL

1. O usuário acessa a área de criação de publicação.
2. O sistema apresenta o campo para criação do post.
3. O usuário informa o conteúdo que deseja publicar.
4. O usuário pode adicionar uma ou mais mídias permitidas pela plataforma.
5. O sistema permite selecionar entre os formatos de conteúdo disponíveis:
   - Texto;
   - Imagem;
   - GIF;
   - Vídeo;
   - Enquete.
6. O usuário visualiza uma prévia da publicação.
7. O sistema realiza as validações necessárias.
8. O usuário seleciona a opção **"Publicar"**.
9. O sistema registra a publicação.
10. O sistema disponibiliza a publicação no feed.
11. O sistema apresenta uma confirmação de que a publicação foi realizada com sucesso.

---

# 📝 5. FORMATOS DE PUBLICAÇÃO

O sistema deverá permitir os seguintes formatos:

### Texto

O usuário poderá criar uma publicação contendo texto.

### Imagem

O usuário poderá adicionar uma imagem à publicação.

### GIF

O usuário poderá adicionar um GIF à publicação.

### Vídeo

O usuário poderá adicionar um vídeo à publicação.

### Enquete

O usuário poderá criar uma enquete contendo uma pergunta e opções de resposta para os demais usuários.

### Publicação multimídia

Quando permitido pelas regras da plataforma, a publicação poderá combinar texto e conteúdo visual.

A comunicação visual deve ser considerada uma característica central da experiência da rede social.

---

# ⚠️ 6. FLUXOS ALTERNATIVOS

## FA-001 — Usuário tenta publicar sem conteúdo

1. O usuário seleciona **"Publicar"** sem inserir conteúdo.
2. O sistema verifica que a publicação está vazia.
3. O sistema impede a publicação.
4. O sistema apresenta uma mensagem informando que é necessário adicionar conteúdo.

**Mensagem sugerida:**

> "Adicione um conteúdo antes de publicar."

---

## FA-002 — Arquivo incompatível

1. O usuário seleciona um arquivo para adicionar à publicação.
2. O sistema verifica o formato do arquivo.
3. O sistema identifica que o formato não é permitido.
4. O sistema rejeita o arquivo.
5. O sistema informa ao usuário que o formato não é suportado.

---

## FA-003 — Arquivo excede o tamanho permitido

1. O usuário seleciona uma mídia.
2. O sistema verifica o tamanho do arquivo.
3. O sistema identifica que o arquivo excede o limite definido.
4. O sistema impede o envio.
5. O sistema informa o usuário sobre o limite permitido.

---

## FA-004 — Usuário cancela a publicação

1. O usuário inicia a criação de uma publicação.
2. O usuário seleciona a opção **"Cancelar"**.
3. O sistema solicita confirmação caso existam dados preenchidos.
4. O usuário confirma o cancelamento.
5. O sistema descarta a publicação em andamento.

---

## FA-005 — Falha no envio

1. O usuário solicita a publicação.
2. O sistema tenta processar o conteúdo.
3. Ocorre uma falha durante o processamento ou envio.
4. O sistema não registra a publicação como concluída.
5. O sistema informa o usuário.
6. O sistema permite que o usuário tente realizar a publicação novamente.

---

# 🔐 7. REGRAS DE NEGÓCIO

### RB-001 — Usuário autenticado

Somente usuários cadastrados e autenticados poderão criar publicações.

### RB-002 — Conteúdo obrigatório

Uma publicação não poderá ser criada sem conteúdo.

### RB-003 — Formatos permitidos

O sistema deverá aceitar somente os formatos de conteúdo disponibilizados pela plataforma.

### RB-004 — Validação de mídia

Arquivos enviados deverão passar pelas validações definidas pelo sistema antes de serem publicados.

### RB-005 — Moderação

Publicações estarão sujeitas às regras da comunidade e poderão ser denunciadas e encaminhadas para moderação.

### RB-006 — Permissões administrativas

Administradores poderão atuar sobre conteúdos de acordo com suas permissões.

### RB-007 — Comunicação visual

A experiência de publicação deverá considerar a comunicação visual como elemento central da plataforma, incluindo conteúdos como imagens, GIFs e vídeos.

---

# 🖥️ 8. INTERFACE DO FRONT-END

A tela de criação de publicação deverá apresentar, no mínimo:

```text
┌───────────────────────────────────────────┐
│             CRIAR PUBLICAÇÃO              │
├───────────────────────────────────────────┤
│                                           │
│  O que você quer compartilhar?            │
│                                           │
│  ┌─────────────────────────────────────┐  │
│  │ Digite sua publicação...            │  │
│  │                                     │  │
│  └─────────────────────────────────────┘  │
│                                           │
│  [ 📷 Imagem ] [ GIF ] [ 🎥 Vídeo ]       │
│                                           │
│  [ 📊 Criar enquete ]                     │
│                                           │
│  ┌─────────────────────────────────────┐  │
│  │             PRÉVIA                  │  │
│  └─────────────────────────────────────┘  │
│                                           │
│  [ Cancelar ]              [ Publicar ]   │
│                                           │
└───────────────────────────────────────────┘
```

A interface deverá ser responsiva, considerando computadores, tablets e smartphones.

---

# ♿ 9. ACESSIBILIDADE

A funcionalidade deverá seguir as diretrizes de acessibilidade definidas para a plataforma.

Deverá considerar:

- Interface visual clara;
- Contraste adequado;
- Botões e campos identificados de forma clara;
- Mensagens de erro compreensíveis;
- Layout responsivo;
- Priorização de conteúdos visuais;
- Suporte à comunicação em Libras quando aplicável;
- Facilidade de navegação em dispositivos móveis.

A acessibilidade é um requisito não funcional definido na proposta da plataforma, que estabelece a priorização de comunicação visual, contraste, clareza e conteúdos em Libras.

---

# 🔒 10. SEGURANÇA E PRIVACIDADE

O sistema deverá:

- Validar o usuário antes da publicação;
- Validar os arquivos enviados;
- Impedir o envio de arquivos não permitidos;
- Proteger os dados relacionados à publicação;
- Respeitar as permissões do usuário;
- Evitar que usuários não autenticados publiquem conteúdo.

Essas medidas estão relacionadas aos requisitos não funcionais de **segurança e privacidade** definidos para a plataforma.

---

# 📤 11. PÓS-CONDIÇÕES

Após uma publicação realizada com sucesso:

1. A publicação deverá ser registrada pelo sistema.
2. O conteúdo deverá ficar associado ao usuário responsável.
3. A publicação deverá estar disponível no feed conforme as regras da plataforma.
4. O usuário deverá receber uma confirmação de publicação.
5. O conteúdo poderá receber interações posteriormente, como curtidas, comentários e compartilhamentos.

---

# ✅ 12. CRITÉRIOS DE ACEITE

A funcionalidade será considerada concluída quando:

- [ ] O usuário autenticado conseguir acessar a criação de publicação.
- [ ] O usuário conseguir publicar texto.
- [ ] O usuário conseguir adicionar imagem.
- [ ] O usuário conseguir adicionar GIF.
- [ ] O usuário conseguir adicionar vídeo.
- [ ] O usuário conseguir criar uma enquete.
- [ ] O sistema validar uma publicação vazia.
- [ ] O sistema validar arquivos enviados.
- [ ] O usuário conseguir visualizar uma prévia.
- [ ] O usuário conseguir cancelar uma publicação.
- [ ] O sistema registrar uma publicação válida.
- [ ] A publicação aparecer no feed após ser criada.
- [ ] O sistema apresentar mensagem de sucesso.
- [ ] O sistema apresentar mensagens de erro quando necessário.
- [ ] A interface funcionar em computador, tablet e smartphone.
- [ ] A interface seguir os princípios de acessibilidade definidos para o projeto.

---

# 🧪 13. CENÁRIOS DE TESTE

| ID     | Cenário                 | Resultado Esperado                    |
| ------ | ----------------------- | ------------------------------------- |
| CT-001 | Publicar texto          | Publicação criada com sucesso         |
| CT-002 | Publicar imagem         | Imagem adicionada e publicação criada |
| CT-003 | Publicar GIF            | GIF adicionado e publicação criada    |
| CT-004 | Publicar vídeo          | Vídeo adicionado e publicação criada  |
| CT-005 | Criar enquete           | Enquete criada e disponibilizada      |
| CT-006 | Publicar sem conteúdo   | Sistema impede a publicação           |
| CT-007 | Enviar arquivo inválido | Sistema rejeita o arquivo             |
| CT-008 | Cancelar publicação     | Publicação não é criada               |
| CT-009 | Falha no envio          | Sistema informa o erro                |
| CT-010 | Publicação realizada    | Conteúdo aparece no feed              |

---

# 📌 14. RELAÇÃO COM OUTROS REQUISITOS

O RF-003 possui relação direta com outros requisitos definidos para a plataforma:

- **RF-001 — Cadastro, login e recuperação de acesso:** necessário para identificar e autenticar o usuário.
- **RF-004 — Curtidas, comentários, compartilhamento, seguir, bloquear e silenciar:** permite interações com as publicações.
- **RF-005 — Respostas em vídeo:** permite responder publicações utilizando vídeos.
- **RF-009 — Notificações:** poderá informar o usuário sobre interações relacionadas às suas publicações.
- **RF-011 — Denúncias e fila de moderação:** permite denunciar conteúdos publicados.
- **RF-012 — Painel do Administrador Surdo:** permite ações de moderação.
- **RF-013 — Painel Root:** permite gerenciamento geral da plataforma.

---

# 📊 15. RESUMO DO REQUISITO

| Campo              | Informação                          |
| ------------------ | ----------------------------------- |
| **ID**             | RF-003                              |
| **Nome**           | Criação e Publicação de Postagens   |
| **Tipo**           | Requisito Funcional                 |
| **Prioridade**     | ALTA                                |
| **Complexidade**   | 8 Story Points                      |
| **Ator Principal** | Usuário Cadastrado                  |
| **Status**         | EM DESENVOLVIMENTO                  |
| **Formatos**       | Texto, imagem, GIF, vídeo e enquete |
| **Interface**      | Web responsiva                      |
| **Acessibilidade** | Comunicação visual e Libras         |
| **Moderação**      | Administrador Surdo / Root          |

---

## 📚 Referência da proposta

Este requisito foi detalhado a partir da proposta da **Rede Social Visual para a Comunidade Surda**, especialmente da definição do **RF03 — Feed com texto, foto, GIF, vídeo e enquete**, dos requisitos de acessibilidade, segurança, privacidade e da proposta de comunicação visual como elemento central da plataforma.
