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

## 📋 2. Atores e Descrição

### 📝 2.1 Descrição do Requisito

O requisito funcional **RF-008 — Gerir Mensagens** tem como objetivo permitir que usuários cadastrados no Librando acessem a funcionalidade de conversas pela página principal da aplicação. Ao selecionar a opção **Mensagens**, o usuário deverá ser direcionado para uma área na qual poderá consultar suas conversas e visualizar as mensagens enviadas e recebidas.

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
- A opção **Mensagens** deverá estar disponível na interface.
- Para visualizar uma conversa, o usuário deverá ser um participante autorizado.
- Para atualizar ou excluir uma mensagem, o usuário deverá ser seu autor e possuir uma sessão válida.
- O banco de dados deverá estar acessível para consultar e persistir as informações necessárias.

### 🚀 3.3 Fluxo Principal

1. 👤 O usuário acessa sua conta no Librando.
2. 🖥️ O sistema apresenta a página principal da aplicação.
3. 💬 O usuário seleciona a opção **Mensagens**.
4. 🔎 O sistema verifica a autenticação e recupera as conversas às quais o usuário possui acesso.
5. 📋 O sistema apresenta a lista de conversas disponíveis.
6. 🔍 O usuário poderá utilizar a pesquisa para localizar uma conversa.
7. 📄 O sistema apresenta os resultados correspondentes às conversas autorizadas.
8. 👥 O usuário seleciona uma conversa.
9. 💬 O sistema recupera e apresenta as mensagens enviadas e recebidas.
10. 👁️ O sistema apresenta os status de leitura disponíveis para as mensagens.
11. ✍️ O usuário informa o conteúdo de uma nova mensagem.
12. 📤 O usuário solicita o envio da mensagem.
13. 🛡️ O sistema valida a autenticação, a participação na conversa e o conteúdo informado.
14. 💾 O sistema armazena a mensagem e associa seu registro ao autor e à conversa correspondente.
15. ✅ O sistema confirma o envio e atualiza a exibição da conversa.
16. ✏️ Caso deseje atualizar uma mensagem própria, o usuário seleciona a opção de edição correspondente.
17. 📝 O sistema apresenta a mensagem selecionada para alteração.
18. 💾 O usuário modifica o conteúdo e solicita o salvamento.
19. 🛡️ O sistema verifica a autoria e valida o novo conteúdo.
20. ✅ O sistema salva a alteração autorizada e atualiza a mensagem apresentada na conversa.
21. 🗑️ Caso deseje excluir uma mensagem própria, o usuário seleciona a opção de exclusão correspondente.
22. ⚠️ O sistema solicita confirmação quando essa etapa estiver prevista na interface.
23. 🛡️ O sistema verifica a autoria e a autorização para excluir a mensagem.
24. 💾 O sistema processa a exclusão conforme a política definida para o projeto.
25. 🔄 O sistema atualiza a conversa e informa o resultado da operação.

### 🔀 3.4 Fluxos Alternativos

#### 🔒 FA-01 — Sessão Expirada ou Usuário Não Autenticado

1. O usuário tenta acessar a opção **Mensagens** sem uma sessão válida.
2. O sistema verifica a autenticação.
3. O sistema identifica que o token está ausente, expirado ou inválido.
4. O sistema bloqueia o acesso às conversas.
5. O sistema informa que é necessário autenticar-se novamente.

**Resultado:** nenhuma mensagem privada é disponibilizada a um usuário não autenticado.

#### 👥 FA-02 — Conversa Inexistente ou Não Autorizada

1. O usuário tenta acessar uma conversa.
2. O sistema verifica se a conversa existe e se o usuário possui autorização.
3. O sistema identifica que a conversa não existe ou não pertence às conversas acessíveis ao usuário.
4. O sistema bloqueia a consulta e apresenta uma mensagem adequada.

**Resultado:** o usuário não consegue consultar mensagens de uma conversa não autorizada.

#### 🔎 FA-03 — Nenhuma Conversa Encontrada

1. O usuário acessa a opção de pesquisa.
2. O usuário informa um termo de pesquisa.
3. O sistema consulta as conversas às quais o usuário tem acesso.
4. O sistema não encontra resultados correspondentes.
5. O sistema informa que nenhuma conversa foi encontrada.

**Resultado:** a pesquisa apresenta corretamente o estado sem resultados, sem expor conversas de outros usuários.

#### ✍️ FA-04 — Mensagem Vazia ou Inválida

1. O usuário tenta enviar uma mensagem.
2. O sistema valida o conteúdo informado.
3. O sistema identifica que a mensagem está vazia ou não atende às regras definidas.
4. O sistema informa o problema e mantém o usuário na conversa.
5. O usuário corrige o conteúdo e tenta novamente.

**Resultado:** mensagens inválidas não são armazenadas nem enviadas.

#### 🌐 FA-05 — Falha ao Enviar Mensagem

1. O usuário solicita o envio de uma mensagem válida.
2. O sistema inicia o processamento da solicitação.
3. Ocorre uma falha de comunicação, processamento ou persistência.
4. O sistema informa que não foi possível concluir o envio.
5. O usuário poderá tentar novamente após a normalização do serviço.

**Resultado:** o sistema não deverá confirmar o envio sem verificar que a operação foi concluída. Deverá evitar duplicações quando uma nova tentativa ocorrer após uma resposta incerta.

#### ✏️ FA-06 — Tentativa de Atualizar Mensagem de Outro Usuário

1. O usuário tenta atualizar uma mensagem.
2. O sistema verifica a autoria da mensagem.
3. O sistema identifica que a mensagem pertence a outro participante.
4. O sistema bloqueia a operação e apresenta uma mensagem informativa.

**Resultado:** a mensagem original permanece inalterada.

#### 🗑️ FA-07 — Cancelamento da Exclusão de Mensagem

1. O usuário seleciona a opção de excluir uma mensagem própria.
2. O sistema apresenta uma confirmação, quando aplicável.
3. O usuário seleciona **Cancelar**.
4. O sistema fecha a confirmação sem executar a exclusão.

**Resultado:** a mensagem permanece disponível na conversa.

#### ⚠️ FA-08 — Falha ao Excluir Mensagem

1. O usuário solicita a exclusão de uma mensagem própria.
2. O sistema valida a autoria e a autorização.
3. Ocorre uma falha durante o processamento.
4. O sistema informa que a exclusão não foi concluída.

**Resultado:** o sistema não deverá informar sucesso indevidamente e deverá manter a consistência dos dados.

#### 📝 FA-09 — Falha ao Atualizar Mensagem

1. O usuário modifica uma mensagem própria e solicita o salvamento.
2. O sistema valida o conteúdo e a autoria.
3. Ocorre uma falha na comunicação ou persistência.
4. O sistema informa que não foi possível atualizar a mensagem.

**Resultado:** o sistema não deverá apresentar uma atualização como concluída se ela não tiver sido persistida. O conteúdo anterior deverá ser preservado sempre que possível.

#### 👁️ FA-10 — Status de Leitura Indisponível

1. O usuário abre uma conversa.
2. O sistema tenta recuperar os status de leitura.
3. O sistema identifica que o status não está disponível ou não pôde ser atualizado.
4. O sistema apresenta a mensagem sem indicar um estado de leitura não confirmado.

**Resultado:** o sistema não deverá afirmar que uma mensagem foi lida sem confirmação do mecanismo responsável.

#### 🔐 FA-11 — Tentativa de Acessar Mensagens sem Permissão

1. O usuário solicita a consulta, atualização ou exclusão de uma mensagem.
2. O sistema verifica a autenticação, a participação na conversa e a autoria quando necessário.
3. O sistema identifica que a solicitação não está autorizada.
4. O sistema bloqueia a operação e apresenta uma resposta adequada.

**Resultado:** nenhuma operação não autorizada deverá ser executada.

#### 🔍 FA-12 — Pesquisa sem Termo Informado

1. O usuário acessa a pesquisa de conversas.
2. O usuário tenta pesquisar sem informar um termo.
3. O sistema valida o campo de pesquisa.
4. O sistema apresenta uma orientação para informar um termo ou, caso essa seja a regra da interface, exibe a lista padrão de conversas.

**Resultado:** o sistema trata a pesquisa vazia conforme o comportamento definido para a interface, sem gerar erros inesperados.

#### 🔄 FA-13 — Conversa sem Mensagens

1. O usuário acessa uma conversa autorizada.
2. O sistema consulta as mensagens associadas.
3. O sistema identifica que ainda não existem mensagens.
4. O sistema apresenta a conversa vazia e disponibiliza o campo de envio, quando permitido.

**Resultado:** a conversa permanece acessível e o usuário pode iniciar a comunicação conforme as regras da plataforma.

### 🏁 3.5 Pós-condições

- ✅ As conversas autorizadas ficam disponíveis para consulta.
- 💬 As mensagens enviadas com sucesso ficam associadas à conversa e ao autor corretos.
- 👁️ Os status de leitura são apresentados conforme as informações confirmadas pelo sistema.
- ✏️ As mensagens atualizadas refletem o conteúdo persistido.
- 🗑️ As mensagens excluídas são tratadas conforme a política de exclusão definida.
- 🔎 A pesquisa apresenta somente conversas acessíveis ao usuário autenticado.
- 🔐 Nenhuma mensagem privada é disponibilizada a usuários não autorizados.
- 🛡️ O usuário não consegue alterar ou excluir mensagens pertencentes a outros participantes.
- 💾 As operações concluídas são persistidas corretamente no banco de dados.
- ⚠️ Em caso de falha, o sistema informa o problema sem indicar sucesso indevido.
- ♿ A interface mantém os controles e as mensagens de retorno compreensíveis e acessíveis.

### ⚙️ 3.6 Requisitos Não Funcionais

| ID | Requisito | Descrição |
|---|---|---|
| ⚡ **RNF-01** | **Desempenho** | A lista de conversas e as mensagens deverão ser exibidas em até 2 segundos em condições normais de operação, considerando um volume de dados compatível com o uso esperado. |
| 📱 **RNF-02** | **Responsividade** | A interface deverá adaptar-se a dispositivos móveis, tablets e computadores, mantendo os controles de conversa acessíveis. |
| 🌐 **RNF-03** | **Compatibilidade** | A funcionalidade deverá ser compatível com versões atuais dos principais navegadores, incluindo Chrome, Firefox, Edge e Safari. |
| ♿ **RNF-04** | **Acessibilidade** | Campos, botões, indicadores de leitura e mensagens de retorno deverão possuir identificação clara e apresentação compreensível, considerando as necessidades dos usuários do Librando. |
| 🔒 **RNF-05** | **Segurança** | A API deverá validar autenticação, participação na conversa e autorização antes de permitir o acesso ou gerenciamento de mensagens. |
| 💾 **RNF-06** | **Integridade e confiabilidade** | O sistema deverá manter a consistência das mensagens e das conversas durante as operações de envio, atualização e exclusão. |
| 👁️ **RNF-07** | **Confiabilidade do status de leitura** | O status de leitura deverá refletir o estado registrado pelo sistema e não poderá ser apresentado como confirmado quando estiver indisponível. |
| 🔎 **RNF-08** | **Desempenho da pesquisa** | A pesquisa deverá retornar resultados em tempo adequado, sem consultar ou revelar conversas às quais o usuário não tenha acesso. |
| 🛡️ **RNF-09** | **Proteção contra entradas maliciosas** | O sistema deverá validar e tratar os dados recebidos para reduzir riscos de injeção, execução de scripts e manipulação de requisições. |
| 🔄 **RNF-10** | **Consistência da interface** | Após uma operação concluída, a interface deverá refletir o estado confirmado pelo backend. |
| 🧩 **RNF-11** | **Manutenibilidade** | As regras de mensagens deverão permanecer organizadas em componentes e serviços adequados, facilitando correções e futuras melhorias. |

### 📏 3.7 Regras de Negócio

| ID | Regra de Negócio | Descrição |
|---|---|---|
| **RN-01** | Autenticação | Somente usuários autenticados poderão acessar a funcionalidade de conversas. |
| **RN-02** | Acesso às conversas | O usuário poderá consultar somente conversas das quais seja participante autorizado. |
| **RN-03** | Envio de mensagens | O envio deverá ocorrer dentro de uma conversa autorizada. |
| **RN-04** | Conteúdo da mensagem | Mensagens de texto não poderão ser vazias ou conter apenas espaços em branco. |
| **RN-05** | Limite de conteúdo | O conteúdo deverá respeitar o limite de caracteres estabelecido pela implementação. |
| **RN-06** | Autoria da mensagem | Cada mensagem deverá estar associada ao usuário que a enviou. |
| **RN-07** | Atualização por autoria | Somente o autor da mensagem poderá solicitar sua atualização. |
| **RN-08** | Exclusão por autoria | Somente o autor da mensagem poderá solicitar sua exclusão, respeitando a política definida pelo projeto. |
| **RN-09** | Validação no backend | As permissões deverão ser verificadas no backend, independentemente das opções apresentadas na interface. |
| **RN-10** | Status de leitura | O sistema deverá disponibilizar o status de leitura conforme o mecanismo implementado e as regras definidas para as conversas. |
| **RN-11** | Pesquisa de conversas | A pesquisa deverá limitar os resultados às conversas às quais o usuário autenticado tenha acesso. |
| **RN-12** | Confirmação das operações | O sistema somente deverá informar sucesso depois de confirmar a conclusão da operação solicitada. |
| **RN-13** | Tratamento de erros | Falhas de validação, comunicação ou persistência deverão ser informadas sem comprometer a integridade dos registros. |
| **RN-14** | Privacidade | Mensagens privadas não poderão ser consultadas por usuários que não possuam autorização para acessar a conversa. |
| **RN-15** | Exclusão de mensagens | A exclusão deverá seguir uma política definida pelo projeto, esclarecendo se a mensagem será removida para todos os participantes ou somente para quem a excluiu. |
| **RN-16** | Atualização de mensagens | O sistema deverá registrar e apresentar o conteúdo atualizado após a persistência bem-sucedida. |
| **RN-17** | Integridade das conversas | A exclusão ou atualização de uma mensagem não deverá corromper os demais registros da conversa. |
| **RN-18** | Pesquisa segura | Os termos informados na pesquisa deverão ser tratados como dados de entrada e processados de forma segura. |
| **RN-19** | Estado vazio | Quando não houver conversas ou mensagens para apresentar, o sistema deverá exibir um estado vazio adequado, sem indicar erro indevidamente. |
| **RN-20** | Acessibilidade | Os controles e retornos da funcionalidade deverão seguir as diretrizes de acessibilidade adotadas pelo projeto Librando. |

---
---


---

## 4. Protótipo

Interface disponível em: https://librando-frontend.onrender.com/ (página principal → opção **Mensagens**, após autenticação).

| Operação | Método | Endpoint/Recurso | Status esperado |
|---|---|---|---|
| Create | `POST` | Rota de criação de conversa e/ou envio de mensagem | Sucesso após validação e persistência; erros de autenticação ou validação quando aplicáveis |
| Read | `GET` | Rota de listagem de conversas e rota de consulta de mensagens | `200 OK` / `401` / `404` ou resposta de acesso não autorizado conforme implementação |
| Update | `PUT` ou `PATCH` | Rota de atualização de mensagem específica | Sucesso após validação de autoria; erros de autenticação, validação ou autorização |
| Delete | `DELETE` | Rota de exclusão de mensagem específica | Sucesso após validação de autoria; erros de autenticação ou autorização |

⛔ **Documentação da API (obrigatória):** `docs/api/swagger.json`.

> Os caminhos completos das rotas e os códigos HTTP devem ser conferidos em `backend/routes/api.php` ou pelo comando `php artisan route:list --path=api`. Não foram incluídos URIs presumidos nesta documentação.

---

### 4.1 Pré-requisitos dos itens a, b, c e d

**a) Aplicação online e pública**
- **URL:** https://librando-frontend.onrender.com/
- **Plataforma:** Render.
- **Funcionalidade:** opção **Mensagens**, acessível após o usuário realizar a autenticação.
- **Acesso para avaliação:** utilizar uma conta de teste fornecida separadamente pela equipe, se necessário. Não registrar senhas ou tokens neste documento.

**b) Banco de dados online e persistindo dados**
- **SGBD:** MySQL hospedado na Aiven.
- **Interface de acesso:** phpMyAdmin — https://librando-phpmyadmin.onrender.com
- **Banco informado no ambiente online:** `defaultdb`.
- **Tabelas relacionadas:** `conversas`, `conversa_usuario`, `mensagens` e `mensagem_leituras`, relacionadas à estrutura de usuários do Librando.
- **Persistência:** as operações concluídas devem permanecer registradas no banco após a atualização ou reabertura da aplicação.

**c) Código-fonte completo no GitHub**
- **Repositório:** https://github.com/angeldanylo35-ux/librando00
- **Branch principal:** `main`.
- Contém o código do frontend (`frontend/`), backend (`backend/`), documentação (`docs/`) e migrations responsáveis pela estrutura do banco.
- O arquivo `.env` e demais credenciais não devem ser versionados; configurações sensíveis devem permanecer em variáveis de ambiente.

**d) Documentação da API**
- **Arquivo:** `docs/api/swagger.json`.
- **Formato:** OpenAPI 3.0.
- Deve documentar os endpoints reais de conversas e mensagens, os parâmetros, os corpos das requisições, exemplos de respostas, códigos HTTP e o esquema de autenticação `BearerAuth`.
- A documentação deve corresponder às rotas efetivamente implementadas e testadas.

---

### 4.2 CRUD: as operações do RF-008

O RF-008 permite que o usuário autenticado consulte as conversas das quais participa e gerencie mensagens de sua autoria. A criação de conta permanece sob responsabilidade do RF-002. No contexto deste requisito, o **Create** corresponde à criação de conversas, quando necessária, e ao envio de mensagens.

| Operação | Ação na interface | Método HTTP | Endpoint/Recurso | Resposta esperada | Verificação |
|---|---|---|---|---|---|
| **C**reate | Iniciar conversa ou enviar mensagem | `POST` | Rota de criação de conversa e/ou envio de mensagem | Sucesso após validação; `401` se não autenticado; erro de validação se o conteúdo for inválido | Conversa, participantes e mensagem associados corretamente no banco |
| **R**ead | Abrir **Mensagens**, pesquisar e selecionar uma conversa | `GET` | Rota de listagem de conversas e rota de consulta de mensagens | `200 OK`; erro de autenticação ou acesso quando aplicável | Somente conversas autorizadas e mensagens correspondentes são apresentadas |
| **U**pdate | Editar uma mensagem própria | `PUT` ou `PATCH` | Rota de mensagem específica | Sucesso após validação; erro se a mensagem não pertencer ao usuário | Conteúdo atualizado no banco e na interface após confirmação da API |
| **D**elete | Excluir uma mensagem própria após confirmação | `DELETE` | Rota de mensagem específica | Sucesso após validação; erro se a mensagem não pertencer ao usuário | Exclusão lógica registrada e mensagem apresentada conforme a política do projeto |

A API utiliza o middleware `auth:sanctum` nas rotas protegidas. Antes de consultar uma conversa, o backend deve verificar a participação do usuário. Para editar ou excluir uma mensagem, deve verificar também sua autoria. Os caminhos completos e os métodos exatos devem ser confirmados no arquivo de rotas antes da entrega.

---

### 4.3 Documentação da API

A documentação da API deve estar no arquivo `docs/api/swagger.json`, em formato OpenAPI 3.0, no repositório do projeto.

| Operação | Método HTTP | Recurso documentado | O que deve apresentar |
|---|---|---|---|
| Listar conversas | `GET` | Rota de conversas | Parâmetro de pesquisa, quando aplicável, e resposta com as conversas autorizadas |
| Criar conversa | `POST` | Rota de criação de conversa | Participantes necessários e exemplo de resposta |
| Consultar mensagens | `GET` | Rota de mensagens de uma conversa | Parâmetro da conversa, resposta com mensagens e comportamento do status de leitura |
| Enviar mensagem | `POST` | Rota de envio de mensagem | Identificador da conversa, conteúdo, `client_id` e exemplo de resposta |
| Editar mensagem | `PUT` ou `PATCH` | Rota de mensagem específica | Identificador da mensagem, novo conteúdo e respostas possíveis |
| Excluir mensagem | `DELETE` | Rota de mensagem específica | Identificador da mensagem e resposta da exclusão lógica |

- Os caminhos completos devem ser copiados de `backend/routes/api.php` ou obtidos com `php artisan route:list --path=api`.
- Os corpos das requisições devem indicar os campos obrigatórios e seus limites, incluindo o limite de 2.000 caracteres para o conteúdo da mensagem.
- Os endpoints protegidos devem indicar o esquema `BearerAuth`.
- Devem ser documentadas respostas compatíveis com a implementação, incluindo autenticação ausente ou inválida, conversa não autorizada, mensagem inexistente e conteúdo inválido.
- A validação do arquivo deve ser realizada em https://editor.swagger.io.

> Não se deve registrar como concluída a documentação de um endpoint antes de confirmar seu URI, método HTTP, parâmetros e respostas na implementação real.

---

### 4.4 Script DDL do banco de dados

O banco de dados da RF-008 utiliza migrations do Laravel para estruturar as tabelas relacionadas às conversas e mensagens.

| Tabela | Finalidade |
|---|---|
| `conversas` | Armazenar os registros das conversas. |
| `conversa_usuario` | Relacionar as conversas aos usuários participantes. |
| `mensagens` | Armazenar o conteúdo, o autor, a conversa, a informação de edição e os dados de exclusão lógica. |
| `mensagem_leituras` | Registrar os dados de leitura das mensagens pelos participantes. |

As tabelas utilizam relacionamentos com `usuarios`, aproveitando a estrutura de usuários já existente no Librando.

**Artefato SQL para a entrega:** deverá ser disponibilizado em `database/` um arquivo DDL compatível com MySQL, contendo a estrutura das tabelas utilizadas, chaves primárias, chaves estrangeiras, restrições e índices. As migrations do Laravel devem ser utilizadas como referência para gerar e conferir o DDL.

---

### 4.5 Interface e integração

| Item | Situação/Comportamento |
|---|---|
| Interface de mensagens em Vue 3, com o componente `Mensagem.vue` | Apresenta a lista de conversas, a pesquisa e o histórico de mensagens |
| Integração com a API Laravel | As conversas e mensagens são recuperadas por requisições à API |
| Autenticação com Laravel Sanctum | As rotas protegidas exigem token válido |
| Pesquisa de conversas | Retorna somente conversas às quais o usuário autenticado tem acesso |
| Envio de mensagens | Conteúdo obrigatório, sem espaços em branco e limitado a 2.000 caracteres |
| Edição e exclusão | Opções restritas às mensagens de autoria do usuário autenticado |
| Confirmação do servidor | A interface atualiza o estado da conversa somente após a resposta da API |
| Confirmação de exclusão | A interface solicita confirmação antes de excluir uma mensagem |
| Prevenção de duplicidade | O identificador `client_id` permite reconhecer o reenvio da mesma solicitação |
| Status de leitura | A interface não apresenta a leitura como confirmada quando o processamento falha |
| Tratamento de erros | Falhas de validação, comunicação e sessão expirada devem ser informadas ao usuário |
| Acessibilidade e responsividade | Os controles possuem identificação clara e a tela adapta-se a dispositivos móveis |

---

### 4.6 Autoavaliação (Tópico 4)

| Parte | Situação |
|---|---|
| **CREATE** | Previsto para criação de conversas e envio de mensagens; validar pela interface e pela API |
| **READ** | Listagem e pesquisa de conversas, consulta de mensagens e status de leitura descritos na implementação |
| **UPDATE** | Edição de mensagem própria descrita na implementação; validar persistência após a resposta da API |
| **DELETE** | Exclusão lógica de mensagem própria descrita na implementação; validar a confirmação e o registro no banco |
| **Autenticação e autorização** | Rotas protegidas por `auth:sanctum`; participação na conversa e autoria devem ser verificadas no backend |
| **Interface e integração** | Estados de carregamento, vazio, preenchido, erro e sucesso descritos no item 4.5 e 4.6 |
| **Banco de dados** | Migrations das tabelas de conversas, participantes, mensagens e leituras descritas no item 4.4 |
| **Documentação da API** | Conferir a existência, validade e correspondência do `docs/api/swagger.json` com as rotas reais |
| **Pré-requisitos (a, b, c, d)** | Aplicação, banco, repositório e documentação devem ser conferidos antes da entrega |

---

### 4.7 Roteiro de teste

1. Abrir a URL da aplicação em uma janela anônima e autenticar-se com uma conta de teste.
2. Acessar **Mensagens** e verificar se a lista apresenta somente as conversas do usuário autenticado.
3. Pesquisar uma conversa e conferir se os resultados pertencem somente às conversas autorizadas.
4. Abrir uma conversa da qual o usuário participa e verificar a apresentação das mensagens.
5. Enviar uma mensagem válida e conferir se ela aparece na conversa após a confirmação da API e permanece registrada no banco.
6. Tentar enviar uma mensagem vazia, contendo apenas espaços e com mais de 2.000 caracteres; conferir se a API recusa o conteúdo.
7. Reenviar uma solicitação com o mesmo `client_id` e verificar se não ocorre duplicidade.
8. Editar uma mensagem própria e conferir se o novo conteúdo permanece após recarregar a conversa.
9. Tentar editar uma mensagem de outro participante e verificar se a operação é bloqueada.
10. Excluir uma mensagem própria, confirmar a operação e verificar o comportamento da exclusão lógica.
11. Tentar excluir uma mensagem de outro participante e verificar se a operação é bloqueada.
12. Tentar acessar os endpoints sem token ou com token inválido e confirmar que a API bloqueia o acesso.
13. Simular falha na API durante envio, edição ou exclusão e verificar se a interface informa o erro sem apresentar sucesso indevido.
14. Conferir o status de leitura e verificar se a interface não o apresenta como confirmado quando o processamento falha.
15. Abrir `docs/api/swagger.json` em https://editor.swagger.io e conferir se o JSON é válido e corresponde aos endpoints reais.
16. Conferir as migrations e o DDL no repositório, verificando tabelas, chaves e relacionamentos.
17. Utilizar a tela em dispositivo móvel e verificar a acessibilidade dos controles e a adaptação da interface.

> **Registro de execução:** este roteiro descreve os cenários de validação. Marque um teste como aprovado somente depois de executá-lo e conferir o resultado na interface, na API e, quando aplicável, no banco de dados.

---

## 5. Arquitetura e Decisões

### 5.1 Diagrama de Arquitetura

A RF-008 utiliza uma arquitetura cliente-servidor, com frontend em Vue 3, backend em Laravel e persistência em MySQL. A comunicação entre frontend e backend ocorre por meio de requisições HTTP à API, protegidas por autenticação.

```text
┌──────────────────────────────┐
│      NAVEGADOR DO USUÁRIO    │
│                              │
│      FRONTEND — VUE 3        │
│      Mensagem.vue            │
│      • Lista de conversas    │
│      • Pesquisa               │
│      • Histórico de mensagens│
│      • Envio, edição e exclusão│
└──────────────┬───────────────┘
               │ HTTPS / HTTP
               │ Requisições à API
               │ Token Bearer
               ▼
┌──────────────────────────────┐
│       BACKEND — LARAVEL      │
│                              │
│      API REST                │
│      Middleware auth:sanctum │
│      ConversaController      │
│      MensagemController      │
│      Models / Eloquent       │
│      Validações e permissões │
└──────────────┬───────────────┘
               │ Eloquent / SQL
               ▼
┌──────────────────────────────┐
│          MYSQL (AIVEN)       │
│                              │
│      usuarios                │
│      conversas               │
│      conversa_usuario        │
│      mensagens               │
│      mensagem_leituras       │
└──────────────────────────────┘
```

**Componentes**

| Camada | Tecnologia/artefato | Responsabilidade no RF-008 |
|---|---|---|
| Frontend | Vue 3 — `Mensagem.vue` | Apresentar conversas, mensagens, pesquisa e controles de gerenciamento |
| API | Laravel | Receber requisições, validar dados e executar as operações |
| Autenticação | Laravel Sanctum | Validar o token e restringir o acesso aos endpoints protegidos |
| Controle de conversas | `ConversaController` | Listar e criar conversas, consultar mensagens e tratar a leitura |
| Controle de mensagens | `MensagemController` | Enviar, editar e excluir mensagens |
| Camada de dados | Models `Conversa`, `Mensagem` e `MensagemLeitura` | Representar as entidades e seus relacionamentos |
| Persistência | MySQL (Aiven) | Armazenar conversas, participantes, mensagens e registros de leitura |
| Comunicação | API REST/HTTP | Transportar as solicitações e respostas entre frontend e backend |
| Hospedagem | Render | Disponibilizar a aplicação online |

### 5.2 Decisões Arquiteturais (ADRs)

**ADR-001: Frontend e backend separados (SPA + API REST)**
- *Decisão:* utilizar Vue 3 no frontend e Laravel no backend, com comunicação por API HTTP.
- *Razão:* separar a apresentação da interface das regras de negócio e da persistência, permitindo organizar e manter cada camada de forma independente.
- *Consequência:* o frontend realiza requisições à API e apresenta os dados retornados pelo backend.

**ADR-002: Autenticação com Laravel Sanctum**
- *Decisão:* proteger os endpoints da funcionalidade com o middleware `auth:sanctum`.
- *Razão:* garantir que somente usuários autenticados possam consultar e gerenciar conversas e mensagens.
- *Consequência:* as operações protegidas dependem de um token válido, e a autorização de cada conversa ou mensagem também deve ser verificada no backend.

**ADR-003: Persistência relacional no MySQL com migrations**
- *Decisão:* utilizar MySQL e migrations do Laravel para estruturar os dados.
- *Razão:* conversas, participantes, mensagens e registros de leitura possuem relacionamentos que precisam ser mantidos de forma consistente.
- *Consequência:* as tabelas `conversas`, `conversa_usuario`, `mensagens` e `mensagem_leituras` devem manter seus relacionamentos com `usuarios`.

**ADR-004: Organização da lógica por Models e Controllers**
- *Decisão:* separar a representação dos dados em Models e o processamento das requisições em Controllers.
- *Razão:* manter as responsabilidades organizadas, facilitar a manutenção e evitar concentrar todas as regras em um único componente.
- *Consequência:* `ConversaController` concentra as operações de conversas; `MensagemController` concentra o gerenciamento das mensagens; os Models representam as entidades e seus relacionamentos.

**ADR-005: Confirmação do backend antes da atualização da interface**
- *Decisão:* atualizar a interface somente após receber a confirmação da API.
- *Razão:* evitar que o usuário visualize uma operação como concluída quando o servidor não conseguiu persistir a alteração.
- *Consequência:* envio, edição e exclusão aguardam a resposta do servidor; falhas são apresentadas sem confirmação indevida.

### 5.3 Fluxo de Dados (Gerenciar Mensagens)

1. O usuário acessa a opção **Mensagens** no frontend.
2. O componente `Mensagem.vue` solicita à API a lista de conversas.
3. O Laravel recebe a requisição e verifica a autenticação por meio do middleware `auth:sanctum`.
4. O `ConversaController` consulta as conversas relacionadas ao usuário autenticado.
5. O Eloquent acessa o banco MySQL e recupera os dados necessários.
6. O backend retorna somente os dados autorizados em uma resposta HTTP.
7. O Vue 3 apresenta as conversas e permite que o usuário selecione uma delas.
8. Ao abrir a conversa, o frontend solicita suas mensagens.
9. O backend verifica a participação do usuário, recupera as mensagens e processa os registros de leitura das mensagens recebidas.
10. Para enviar, editar ou excluir uma mensagem, o frontend encaminha a solicitação correspondente à API.
11. O `MensagemController` valida a operação, incluindo o conteúdo informado e a autoria da mensagem.
12. O banco de dados registra a operação autorizada.
13. O backend retorna o resultado e o frontend atualiza a interface somente após a confirmação.

### 5.4 Padrão de Design

**API REST em camadas (MVC).** O fluxo de processamento é: Rota → Middleware de autenticação → Controller → Model (Eloquent) → Banco de dados. O frontend Vue 3 funciona como camada de apresentação e consome a API por requisições HTTP.

- **Model:** representa os dados e relacionamentos, como `Conversa`, `Mensagem` e `MensagemLeitura`.
- **View:** corresponde à interface apresentada pelo frontend Vue 3, por meio do componente `Mensagem.vue`.
- **Controller:** recebe as requisições e coordena as operações, por meio de `ConversaController` e `MensagemController`.

*Justificativa:* a separação entre interface, regras de negócio e persistência facilita a manutenção, a validação das permissões e a evolução da funcionalidade sem misturar a apresentação com o acesso ao banco de dados.

---

## 6. Segurança OWASP

A segurança da RF-008 é importante porque a funcionalidade trabalha com conversas privadas e mensagens dos usuários. Os controles abaixo tratam dos riscos de acesso indevido, autenticação inadequada, entradas maliciosas e exposição de informações sensíveis.

### Controle 1: Controle de acesso às conversas e mensagens

**Vulnerabilidade OWASP (Risco):** A01 — Broken Access Control. Falhas de autorização podem permitir que um usuário consulte conversas privadas ou altere e exclua mensagens pertencentes a outras pessoas.

**Implementação (Como protege?):** As rotas da funcionalidade são protegidas pelo middleware `auth:sanctum`. Além da autenticação, o backend verifica se o usuário participa da conversa solicitada. Para editar ou excluir uma mensagem, verifica se o usuário autenticado é o autor. A consulta de uma conversa não autorizada deve ser bloqueada, sem revelar seu conteúdo.

**Teste (Como provar que funciona?):** Com uma conta de teste, tentar consultar uma conversa da qual o usuário não participa. Em seguida, tentar editar e excluir uma mensagem de outro participante. Confirmar que as operações são bloqueadas e que os registros originais permanecem inalterados. Registrar os resultados somente após executar os testes.

### Controle 2: Autenticação e proteção dos endpoints

**Vulnerabilidade OWASP (Risco):** A07 — Identification and Authentication Failures. Endpoints sem autenticação adequada podem permitir que pessoas não autorizadas consultem ou manipulem mensagens privadas.

**Implementação (Como protege?):** Os endpoints de conversas e mensagens utilizam o middleware `auth:sanctum`, exigindo uma sessão ou token válido para executar as operações. O frontend também deve tratar respostas de autenticação inválida ou sessão expirada, orientando o usuário a autenticar-se novamente.

**Teste (Como provar que funciona?):** Fazer requisições aos endpoints sem enviar credenciais e repetir com token inválido ou expirado. Confirmar que a API bloqueia o acesso e que a interface apresenta uma orientação adequada, sem disponibilizar conversas ou mensagens privadas.

### Controle 3: Validação de entradas e prevenção contra SQL Injection

**Vulnerabilidade OWASP (Risco):** A03 — Injection. Entradas não tratadas podem permitir tentativas de manipulação de consultas ou comandos executados no banco de dados.

**Implementação (Como protege?):** O backend valida o conteúdo das mensagens, recusando valores vazios ou compostos apenas por espaços e aplicando o limite de 2.000 caracteres. As consultas devem utilizar os recursos do Eloquent e os mecanismos de parametrização do Laravel, sem concatenar diretamente os termos de pesquisa ou outros dados enviados pelo usuário em comandos SQL.

**Teste (Como provar que funciona?):** Tentar enviar mensagens vazias, somente com espaços e acima do limite permitido. Utilizar caracteres especiais e textos que simulem uma tentativa de SQL Injection nos campos de mensagem e pesquisa. Confirmar que as entradas são tratadas como dados, que as validações são aplicadas e que nenhuma consulta indevida é executada.

### Controle 4: Proteção contra XSS (Cross-Site Scripting)

**Vulnerabilidade OWASP (Risco):** A03 — Injection. Uma mensagem contendo HTML ou JavaScript malicioso pode tentar executar scripts no navegador de outro participante ao ser exibida na conversa.

**Implementação (Como protege?):** O conteúdo das mensagens deve ser apresentado como texto, utilizando a interpolação e os mecanismos de escape padrão do Vue. A interface não deve renderizar conteúdo enviado pelo usuário como HTML confiável. O uso de `v-html` para exibir mensagens deve ser evitado, salvo quando houver sanitização adequada.

**Teste (Como provar que funciona?):** Enviar uma mensagem contendo texto semelhante a `<script>alert(1)</script>` ou a uma tag HTML com evento JavaScript. Abrir a conversa com outro usuário e confirmar que o conteúdo é exibido como texto, sem executar scripts no navegador.

### Controle 5: Proteção de credenciais e prevenção de duplicidade

**Vulnerabilidade OWASP (Risco):** A05 — Security Misconfiguration. Credenciais, tokens ou configurações sensíveis expostos no repositório podem permitir acesso indevido. Reenvios de requisições também podem provocar a criação duplicada de mensagens caso não sejam tratados.

**Implementação (Como protege?):** As credenciais e configurações sensíveis devem permanecer em variáveis de ambiente, e o arquivo `.env` deve estar fora do versionamento por meio do `.gitignore`. A documentação Swagger não deve conter tokens ou senhas reais. O identificador `client_id` é utilizado para reconhecer o reenvio da mesma solicitação e evitar a duplicação de mensagens.

**Teste (Como provar que funciona?):** Conferir se `.env` está listado no `.gitignore` e se não há credenciais reais nos arquivos versionados. Verificar a documentação para garantir que utiliza apenas valores fictícios. Reenviar uma solicitação com o mesmo `client_id` e confirmar que não é criado um segundo registro para a mesma mensagem.

> **Observação sobre evidências:** os cenários desta seção descrevem como os controles devem ser validados. Registre como aprovado somente o teste que tiver sido efetivamente executado. Não inclua tokens, senhas ou credenciais reais como evidência.

---

## ✅ Checklist final de entrega — RF-008

- [ ] Aplicação online acessível pela URL informada no Tópico 1.
- [ ] Acesso de avaliação definido, sem expor credenciais no documento.
- [ ] Banco MySQL online e dados persistidos após recarregar a aplicação.
- [ ] Repositório GitHub público com o código atualizado.
- [ ] Migrations das quatro tabelas presentes no backend.
- [ ] Arquivo DDL SQL criado em `database/` e conferido com as migrations.
- [ ] Arquivo `docs/api/swagger.json` criado em OpenAPI 3.0.
- [ ] Os seis endpoints reais documentados, com métodos, campos e respostas conferidos.
- [ ] Swagger validado no editor oficial.
- [ ] Testes de Create, Read, Update e Delete executados pela interface.
- [ ] Testes de autorização, autenticação, validação e tratamento de erros executados.
- [ ] Responsividade e acessibilidade conferidas.
- [ ] Nenhum `.env`, token, senha ou chave real publicado no GitHub.
