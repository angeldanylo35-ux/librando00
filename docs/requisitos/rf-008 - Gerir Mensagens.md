# RF-008: Gerir Mensagens

## 🎯 1. Identificação

- **ID:** RF-008
- **Título:** Gerir Mensagens
- **Tipo:** Requisito Funcional
- **Prioridade:** ALTA
- **Complexidade:** 8 story points

## 📍 Localização dos Artefatos

### a) URL da Aplicação (Deploy Online)

- **Deploy:** https://librando-frontend.onrender.com/
- **Plataforma:** [Render](https://render.com)
- **Acesso:** Público, com autenticação para acessar as funcionalidades restritas.
- **Funcionalidade:** Gerenciamento de mensagens e conversas.

### b) Link do Banco de Dados Online

- **SGBD:** MySQL (Aiven)
- **Interface de acesso:** phpMyAdmin
- **Link:** https://librando-phpmyadmin.onrender.com
- **Banco de dados:** `defaultdb`
- **Tabelas relacionadas:** a definir conforme a implementação das conversas e mensagens.
- **Permissões:** o acesso de leitura para avaliação deverá respeitar as credenciais disponibilizadas pela equipe do projeto.

> ⚠️ **Pendente:** confirmar a existência das tabelas de conversas, mensagens, participantes e status de leitura no banco de dados.

### c) Link do GitHub (Repositório)

- **Repositório:** [Librando](https://github.com/angeldanylo35-ux/librando00)
- **Branch principal:** `main`
- **Diretórios relevantes:**
  - `backend/`: implementação da API, regras de negócio, autenticação e persistência.
  - `frontend/`: interface da aplicação.
  - `docs/api/swagger.json`: documentação da API.
  - `docs/requisitos/`: documentação dos requisitos funcionais.

**Estrutura prevista para a documentação do requisito:**

```text
librando00/
└── docs/
    └── requisitos/
        └── rf-008-gerir-mensagens.md
```

> ⚠️ A estrutura e os arquivos específicos da funcionalidade de mensagens deverão ser atualizados conforme a implementação real no repositório.

## 📋 2. Atores e Descrição

### 📝 2.1 Descrição do Requisito

O requisito funcional **RF-008 — Gerir Mensagens** tem como objetivo permitir que usuários cadastrados no Librando acessem a funcionalidade de conversas pela página principal da aplicação. Ao selecionar a opção **Conversas**, o usuário deverá ser direcionado para uma área na qual poderá consultar suas conversas e visualizar as mensagens enviadas e recebidas.

A funcionalidade deverá permitir o envio de mensagens, a visualização do conteúdo das conversas, a atualização e a exclusão das próprias mensagens. Essas operações deverão respeitar a autoria dos conteúdos e as permissões dos participantes, impedindo que um usuário altere ou exclua mensagens pertencentes a outras pessoas.

Além do gerenciamento das mensagens, o sistema deverá disponibilizar a visualização do status de leitura, permitindo que o usuário identifique se uma mensagem foi lida pelo destinatário, quando essa informação estiver disponível. Também deverá existir uma opção de pesquisa para facilitar a localização de conversas às quais o usuário tenha acesso.

O sistema deverá validar as solicitações antes de executá-las, garantindo que somente usuários autenticados e autorizados possam consultar ou gerenciar mensagens. Caso ocorra uma falha durante o envio, a atualização, a exclusão ou a consulta, a aplicação deverá apresentar uma mensagem clara, sem informar que uma operação foi concluída quando isso não tiver sido confirmado.

A interface deverá seguir os princípios de acessibilidade do Librando, mantendo a navegação organizada e os controles de conversa compreensíveis para os usuários da plataforma.

### 🎯 2.2 Benefícios para o Negócio

- 💬 **Comunicação direta:** permite que os usuários conversem dentro da própria plataforma.
- 👥 **Organização das conversas:** centraliza as conversas em uma área específica, facilitando o acesso às mensagens.
- 🔎 **Facilidade de localização:** permite pesquisar conversas sem precisar percorrer manualmente toda a lista.
- 👁️ **Acompanhamento de leitura:** disponibiliza o status de leitura das mensagens, quando aplicável.
- ✏️ **Autonomia do usuário:** permite atualizar mensagens próprias quando necessário e autorizado.
- 🗑️ **Gerenciamento de conteúdo:** permite excluir mensagens próprias conforme as regras definidas pelo sistema.
- 🔐 **Privacidade:** restringe o acesso às conversas aos participantes autorizados.
- ♿ **Acessibilidade:** contribui para uma experiência de comunicação mais organizada e inclusiva.
- 🛡️ **Integridade das informações:** protege as mensagens contra alterações e exclusões não autorizadas.

### 👥 2.3 Atores

#### 👤 1. Usuário Cadastrado

- **🎭 Papel:** acessar conversas, visualizar mensagens, enviar novas mensagens, atualizar e excluir mensagens próprias, consultar o status de leitura e pesquisar conversas.
- **🔐 Permissões:** visualizar somente as conversas autorizadas para sua conta e gerenciar exclusivamente as mensagens de sua autoria.
- **🖥️ Acesso:** página principal, opção **Conversas**, lista de conversas e área de mensagens.
- **🚫 Restrições:** não poderá acessar conversas privadas das quais não seja participante, alterar mensagens de outros usuários ou executar operações sem autenticação.

##### 📊 Permissões CRUD — Usuário Cadastrado

| Operação | Permissão | Descrição |
|---|:---:|---|
| 🟢 **Create** | ✅ | Pode enviar mensagens em conversas autorizadas. |
| 🔵 **Read** | ✅ | Pode visualizar suas conversas, mensagens e os status de leitura disponíveis. |
| 🟡 **Update** | ✅ | Pode atualizar somente as próprias mensagens, respeitando as regras definidas pelo sistema. |
| 🔴 **Delete** | ✅ | Pode solicitar a exclusão das próprias mensagens, conforme a política de exclusão adotada pelo projeto. |

#### ⚙️ 2. Sistema Librando

- **🎭 Papel:** processar as operações de mensagens, apresentar as conversas autorizadas, validar as solicitações e manter as informações consistentes.
- **🛡️ Responsabilidade:** verificar autenticação, participação na conversa, autoria da mensagem e permissões antes de executar cada operação.
- **💾 Acesso:** API, serviços internos, mecanismos de autenticação, banco de dados e recursos responsáveis pelo gerenciamento de conversas e mensagens.
- **🚫 Restrições:** não deverá permitir acesso não autorizado, alteração de mensagens de terceiros ou exclusões sem uma solicitação válida do usuário. O sistema poderá executar tecnicamente as operações solicitadas, mas não deverá decidir excluir mensagens de forma autônoma.

##### 📊 Permissões CRUD — Sistema Librando

| Operação | Permissão | Descrição |
|---|:---:|---|
| 🟢 **Create** | ❌ | Não cria mensagens por iniciativa própria nem envia mensagens em nome do sistema. |
| 🔵 **Read** | ✅ | Recupera as conversas e mensagens necessárias para atender às solicitações dos participantes autorizados. |
| 🟡 **Update** | ✅ | Processa atualizações autorizadas e registra as mudanças necessárias no status de leitura. |
| 🔴 **Delete** | ❌ | Não decide excluir mensagens autonomamente. Executa tecnicamente a exclusão somente após uma solicitação autorizada do usuário. |

### ✅ 2.4 Validações Necessárias

1. 🔐 **Autenticação obrigatória:** somente usuários autenticados poderão acessar a funcionalidade de conversas.
2. 👥 **Participação na conversa:** o sistema deverá verificar se o usuário possui autorização para acessar a conversa solicitada.
3. ✍️ **Conteúdo obrigatório:** mensagens de texto não poderão ser enviadas vazias ou contendo apenas espaços em branco.
4. 📏 **Limite de caracteres:** o conteúdo das mensagens deverá respeitar o limite definido pela implementação.
5. 🛡️ **Validação de autoria:** o usuário poderá atualizar ou excluir somente as próprias mensagens.
6. 💾 **Persistência:** o sistema deverá confirmar que a mensagem foi armazenada corretamente antes de informar sucesso no envio.
7. ✏️ **Atualização de mensagens:** o sistema deverá validar a autoria e a permissão antes de salvar qualquer alteração.
8. 🗑️ **Exclusão de mensagens:** o sistema deverá validar a autoria e aplicar a política de exclusão definida pelo projeto.
9. 👁️ **Status de leitura:** o sistema deverá atualizar e apresentar o status de leitura conforme as regras de funcionamento adotadas.
10. 🔎 **Pesquisa de conversas:** os resultados deverão conter somente conversas às quais o usuário autenticado tenha acesso.
11. 🔒 **Proteção contra acesso indevido:** o backend deverá validar as permissões independentemente dos controles apresentados no frontend.
12. ⚠️ **Tratamento de erros:** falhas de comunicação, validação ou persistência deverão gerar mensagens claras e não deverão ser apresentadas como operações bem-sucedidas.
13. ♿ **Acessibilidade:** os botões, campos, indicadores e mensagens deverão possuir identificação clara e navegação compreensível.
14. 🔄 **Consistência:** após o envio, a atualização ou a exclusão de uma mensagem, a conversa deverá refletir o estado confirmado pelo sistema.
15. 🔍 **Pesquisa segura:** os termos de pesquisa deverão ser tratados como dados de entrada, sem permitir a execução de comandos ou consultas não autorizadas.

---

## 🔄 3. Casos de Uso e Requisitos Não Funcionais

### 📌 3.1 Identificação do Caso de Uso

| Campo | Descrição |
|---|---|
| 🆔 **ID** | UC-008 |
| 📋 **Requisito relacionado** | RF-008 — Gerir Mensagens |
| 👤 **Ator principal** | Usuário Cadastrado |
| ⚙️ **Ator secundário** | Sistema Librando |
| 🎯 **Objetivo** | Permitir que o usuário consulte conversas, envie mensagens, visualize o status de leitura, pesquise conversas e atualize ou exclua as próprias mensagens. |
| 🔗 **Relacionamento** | Funcionalidade de comunicação privada integrada à aplicação Librando. |

### 🔐 3.2 Pré-condições

- O usuário deverá possuir uma conta cadastrada no Librando.
- O usuário deverá estar autenticado na plataforma.
- O sistema deverá estar disponível para receber solicitações.
- O usuário deverá acessar a página principal da aplicação.
- A opção **Conversas** deverá estar disponível na interface.
- Para visualizar uma conversa, o usuário deverá ser um participante autorizado.
- Para atualizar ou excluir uma mensagem, o usuário deverá
