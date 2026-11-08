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

Interface funcionando online em: https://librando-frontend.onrender.com/ (menu **Mensagens**, após autenticação). Código da tela: [`frontend/src/paginas/Mensagem.vue`](https://github.com/angeldanylo35-ux/librando00/blob/main/frontend/src/paginas/Mensagem.vue).

| Operação | Método | Endpoint | Status esperado |
|---|---|---|---|
| Create (conversa) | POST | `/api/conversas` | 201 (nova) / 200 (já existente) / 401 / 422 |
| Create (mensagem) | POST | `/api/conversas/{conversa}/mensagens` | 201 / 401 / 404 / 422 |
| Read (conversas) | GET | `/api/conversas?busca=` | 200 / 401 |
| Read (mensagens) | GET | `/api/conversas/{conversa}/mensagens` | 200 / 401 / 404 |
| Read (buscar usuário) | GET | `/api/usuarios?busca=` | 200 / 401 |
| Update | PUT | `/api/mensagens/{mensagem}` | 200 / 401 / 404 / 422 |
| Delete (mensagem) | DELETE | `/api/mensagens/{mensagem}` | 200 / 401 / 404 |
| Delete (conversa) | DELETE | `/api/conversas/{conversa}` | 200 / 401 / 404 |

⛔ Documentação da API (obrigatória): [`docs/api/swagger.json`](https://github.com/angeldanylo35-ux/librando00/blob/main/docs/api/swagger.json)

---

### 4.1 Pré-requisitos dos itens a, b, c e d

**a) Aplicação online e pública**
- **URL:** https://librando-frontend.onrender.com/ (a mesma informada no Tópico 1, item a).
- **Plataforma:** Render (deploy automático a partir do GitHub).
- **Credenciais de teste** (a aplicação exige login): são necessárias **duas contas** (usuário A e usuário B), porque os cenários de conversa e de autorização envolvem dois participantes. **Conta A:** «teste@librando.com» / «Teste123» (a mesma conta de teste do RF-007). **Conta B:** uma segunda conta de teste, criada pelo cadastro do RF-002 antes de executar o roteiro.

**b) Banco de dados online e persistindo dados**
- **BD:** MySQL hospedado no Aiven. **Interface de acesso:** phpMyAdmin — https://librando-phpmyadmin.onrender.com
- **Banco:** `defaultdb`. **Acesso de leitura ao professor:** usuário `professor_leitura` (somente consulta), o mesmo usado no RF-007 (mesmo banco).
- **Tabelas do RF-008:** `conversas`, `conversa_usuario`, `mensagens` e `mensagem_leituras`, ligadas à tabela `usuarios`. Os dados permanecem após recarregar a página.

**c) Código-fonte completo no GitHub**
- **Repositório:** https://github.com/angeldanylo35-ux/librando00 (público), branch `main`.
- **Onde conferir cada parte do RF-008:**

| Parte | Arquivo no repositório |
|---|---|
| Rotas da API | [`backend/routes/api.php`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/routes/api.php#L34-L43) (bloco `RF-008: Gerir Mensagens`) |
| Conversas, busca e leitura | [`backend/app/Http/Controllers/Api/ConversaController.php`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Http/Controllers/Api/ConversaController.php) |
| Envio, edição e exclusão de mensagens | [`backend/app/Http/Controllers/Api/MensagemController.php`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Http/Controllers/Api/MensagemController.php) |
| Models | [`Conversa.php`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Models/Conversa.php), [`Mensagem.php`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Models/Mensagem.php), [`MensagemLeitura.php`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Models/MensagemLeitura.php) |
| Migration das 4 tabelas | [`backend/database/migrations/create_mensagens.php`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/database/migrations/create_mensagens.php) |
| Tela de mensagens | [`frontend/src/paginas/Mensagem.vue`](https://github.com/angeldanylo35-ux/librando00/blob/main/frontend/src/paginas/Mensagem.vue) |
| Cliente HTTP (token Bearer) | [`frontend/src/services/api.js`](https://github.com/angeldanylo35-ux/librando00/blob/main/frontend/src/services/api.js) |
| Teste automatizado | [`backend/tests/Feature/MensagensTest.php`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/tests/Feature/MensagensTest.php) |
| DDL do banco | `database/rf-008-gerir-mensagens-ddl.sql` |
| Documentação da API | [`docs/api/swagger.json`](https://github.com/angeldanylo35-ux/librando00/blob/main/docs/api/swagger.json) |

- O `.env` não é versionado (`.gitignore`); as credenciais ficam em variáveis de ambiente.

**d) Documentação da API**
- Arquivo [`docs/api/swagger.json`](https://github.com/angeldanylo35-ux/librando00/blob/main/docs/api/swagger.json) (OpenAPI 3.0, JSON válido), com `BearerAuth` declarado e as rotas de conversas e mensagens marcadas com `security`. Detalhes no item 4.3.

---

### 4.2 CRUD: as operações do RF-008

O RF-008 trata das conversas das quais o usuário autenticado **participa** e das mensagens de **sua autoria**. A conta é criada no RF-002 (`POST /api/cadastro`). Neste requisito, o **Create** corresponde a iniciar conversa e enviar mensagem. O autor da mensagem nunca vem do corpo da requisição: é sempre o dono do token. As rotas usam `{conversa}` e `{mensagem}`, mas o backend só encontra a conversa se o usuário for participante e só encontra a mensagem, para editar ou excluir, se ela for do próprio usuário (RN-02, RN-07, RN-08 e RN-09).

| Operação | Ação na interface | Método HTTP | Endpoint | Resposta esperada | Verificação |
|---|---|---|---|---|---|
| **C**reate (conversa) | **Nova mensagem** → pesquisar pessoa → selecionar | `POST` | `/api/conversas` | `201 Created` / `200` se já existir / `401` / `422` | Linha em `conversas` e duas linhas em `conversa_usuario` (criador e destinatário) |
| **C**reate (mensagem) | Digitar e enviar | `POST` | `/api/conversas/{conversa}/mensagens` | `201 Created` / `401` / `404` / `422` | Linha em `mensagens` com o autor e a conversa corretos |
| **R**ead (conversas) | Abrir **Mensagens** e pesquisar | `GET` | `/api/conversas?busca=` | `200 OK` / `401` | Só aparecem conversas em que o usuário consta em `conversa_usuario` |
| **R**ead (mensagens) | Selecionar uma conversa | `GET` | `/api/conversas/{conversa}/mensagens` | `200 OK` / `401` / `404` | Mensagens da conversa; linhas em `mensagem_leituras` para as mensagens recebidas |
| **R**ead (usuários) | Pesquisar pessoa em **Nova mensagem** | `GET` | `/api/usuarios?busca=` | `200 OK` / `401` | Resultados conferem com a tabela `usuarios`, sem o próprio usuário |
| **U**pdate | Editar mensagem própria → Enter | `PUT` | `/api/mensagens/{mensagem}` | `200 OK` / `401` / `404` / `422` | Novo `texto` e `editada = 1` no banco e na tela após recarregar |
| **D**elete (mensagem) | Excluir mensagem própria | `DELETE` | `/api/mensagens/{mensagem}` | `200 OK` / `401` / `404` | `deleted_at` preenchido; o registro permanece em `mensagens` |
| **D**elete (conversa) | Excluir conversa, após confirmação | `DELETE` | `/api/conversas/{conversa}` | `200 OK` / `401` / `404` | Conversa, mensagens e leituras removidas do banco (cascata) |

A exclusão de **mensagem** é lógica: o registro continua no banco, mas deixa de ser exibido (RN-15). A exclusão de **conversa** é física e também apaga o histórico do outro participante. Conversa inexistente, conversa de outra pessoa e mensagem de terceiros recebem a **mesma resposta (`404`)**, para não revelar que o registro existe; por isso a API não documenta `403`. Dados inválidos retornam `422`, padrão de validação do Laravel. O status de leitura não tem rota própria: é registrado ao consultar as mensagens da conversa.

---

### 4.3 Documentação da API

Arquivo [`docs/api/swagger.json`](https://github.com/angeldanylo35-ux/librando00/blob/main/docs/api/swagger.json) (OpenAPI 3.0, JSON válido), com `BearerAuth` (HTTP, `bearer`) e `security` em todas as rotas abaixo.

| Método | Endpoint | O que documenta | Respostas | Onde verificar |
|---|---|---|---|---|
| GET | `/api/conversas` | Conversas do usuário autenticado; parâmetro `busca`; campo `naoLidas` | `200`, `401` | [`ConversaController@index`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Http/Controllers/Api/ConversaController.php#L15) |
| POST | `/api/conversas` | Corpo `{ "usuario_id": 2 }` | `200`, `201`, `401`, `422` | [`ConversaController@store`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Http/Controllers/Api/ConversaController.php#L77) |
| DELETE | `/api/conversas/{conversa}` | Exclui a conversa do usuário; sem corpo | `200`, `401`, `404` | [`ConversaController@destroy`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Http/Controllers/Api/ConversaController.php#L149) |
| GET | `/api/conversas/{conversa}/mensagens` | Mensagens da conversa e campo `lida`; registra a leitura das recebidas | `200`, `401`, `404` | [`ConversaController@mensagens`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Http/Controllers/Api/ConversaController.php#L117) |
| POST | `/api/conversas/{conversa}/mensagens` | Corpo `{ "texto": "...", "client_id": "uuid (opcional)" }`; `texto` obrigatório, até 5.000 caracteres | `201`, `401`, `404`, `422` | [`MensagemController@store`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Http/Controllers/Api/MensagemController.php#L11) |
| PUT | `/api/mensagens/{mensagem}` | Corpo `{ "texto": "..." }`; marca `editada` | `200`, `401`, `404`, `422` | [`MensagemController@update`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Http/Controllers/Api/MensagemController.php#L33) |
| DELETE | `/api/mensagens/{mensagem}` | Exclusão lógica de mensagem própria; sem corpo | `200`, `401`, `404` | [`MensagemController@destroy`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Http/Controllers/Api/MensagemController.php#L54) |
| GET | `/api/usuarios` | Parâmetro `busca`; até 20 usuários, sem o próprio | `200`, `401` | [`ConversaController@buscarUsuarios`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/app/Http/Controllers/Api/ConversaController.php#L56) |

- São **oito** endpoints do RF-008, todos declarados em [`backend/routes/api.php`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/routes/api.php#L34-L43) dentro do grupo `auth:sanctum`.
- Cada método traz exemplo de resposta e, nos métodos com corpo (POST e PUT), exemplo de requisição.
- Os campos do `requestBody` são os mesmos enviados por `Mensagem.vue` (`texto`, `usuario_id`).
- Os códigos documentados são os que a API retorna (`200` sucesso, `201` criação, `401` sem token, `404` conversa ou mensagem não encontrada para o usuário, `422` dados inválidos).
- O arquivo também documenta `login`, `cadastro` e as rotas de perfil; o login devolve o token Bearer usado nas rotas de mensagens.
- O arquivo não contém senhas, tokens ou chaves reais (os exemplos usam valores fictícios).

---

### 4.4 Script DDL do banco de dados

Arquivo `database/rf-008-gerir-mensagens-ddl.sql` (MySQL 8), equivalente à migration [`create_mensagens.php`](https://github.com/angeldanylo35-ux/librando00/blob/main/backend/database/migrations/create_mensagens.php). Contém as quatro tabelas do RF-008, todas ligadas à tabela `usuarios`.

| Tabela | Chaves e restrições | Finalidade |
|---|---|---|
| `conversas` | PK `id`; `created_at` e `updated_at` | Registro da conversa |
| `conversa_usuario` | PK composta (`conversa_id`, `user_id`); FKs para `conversas` e `usuarios` com `ON DELETE CASCADE` | Participantes da conversa; impede participante repetido |
| `mensagens` | PK `id`; FKs `conversa_id` e `user_id` (autor) com `ON DELETE CASCADE`; `texto` `NOT NULL`; `editada` (padrão `0`); `deleted_at` para exclusão lógica; `client_id` (UUID, opcional); `UNIQUE` (`conversa_id`, `user_id`, `client_id`); índice (`conversa_id`, `created_at`) | Conteúdo, autor, edição, exclusão lógica e histórico ordenado |
| `mensagem_leituras` | PK `id`; FKs `mensagem_id` e `user_id` com `ON DELETE CASCADE`; `lida_em` `NOT NULL`; `UNIQUE` (`mensagem_id`, `user_id`) | Registro de leitura por participante, sem duplicar |

> O limite de 5.000 caracteres do `texto` é aplicado na validação da API (`max:5000`); a coluna é do tipo `TEXT`.

---

### 4.5 Interface e integração

| Item | Situação |
|---|---|
| HTML com CSS e JavaScript (Vue 3 + Tailwind CSS), página `Mensagem.vue` | ✅ |
| Dados vindos da API (conversas, mensagens e busca de usuários), sem dados fictícios | ✅ |
| Mensagens de erro claras, em português (carregar, enviar, editar, apagar, pesquisar) | ✅ |
| Tratamento de erros (`try/catch`) nas chamadas à API, com retorno ao login em caso de `401` ([`api.js`](https://github.com/angeldanylo35-ux/librando00/blob/main/frontend/src/services/api.js)) | ✅ |
| Estado **carregando**: "Carregando conversas..." e carregamento das mensagens | ✅ |
| Estado **vazio**: "Nenhuma conversa encontrada." e orientação para usar **Nova mensagem** | ✅ |
| Estado **preenchido**: lista de conversas e histórico de mensagens | ✅ |
| Estado **erro**: mensagem do servidor ou mensagem padrão exibida na tela | ✅ |
| Estado **sucesso**: a conversa só é atualizada depois da resposta da API | ✅ |
| Edição e exclusão de mensagens restritas ao autor (backend responde `404` para mensagem de outro usuário) | ✅ |
| Confirmação antes de excluir **conversa** | ✅ |
| Confirmação antes de excluir **mensagem** | ⚠️ Não há: a exclusão de mensagem é imediata (a confirmação existe apenas na exclusão de conversa) |
| Atualização automática da lista e das mensagens a cada 5 segundos | ✅ |
| Prevenção de duplicidade com `client_id` | ⚠️ Parcial: o banco e a validação aceitam `client_id` (UUID opcional, com índice único), mas `Mensagem.vue` não o envia e o `MensagemController` não devolve a mensagem existente em caso de reenvio |
| Exibição do status de leitura (`lida`) na tela | ⚠️ A API registra a leitura em `mensagem_leituras` e devolve o campo `lida`; a tela ainda não o exibe |
| Responsividade: menu inferior no celular e lateral em telas largas (Tailwind) | ✅ |
| Acessibilidade: `aria-label` na navegação principal e botões desabilitados quando o campo está vazio | ⚠️ Parcial |

**Regras de validação (backend):** `texto` obrigatório, texto, até 5.000 caracteres; `client_id` opcional, no formato UUID; `usuario_id` obrigatório, inteiro, existente em `usuarios` e diferente do usuário autenticado. O autor e a conversa nunca vêm do corpo: o autor vem do token e a conversa vem da rota. Edição aceita somente `texto`. A busca trata o termo como dado e escapa os curingas do `LIKE`.

---

### 4.6 Autoavaliação (Tópico 4)

| Parte | Situação |
|---|---|
| **CREATE** (`POST /api/conversas` e `POST /api/conversas/{conversa}/mensagens`) | ✅ funcionando; documentado |
| **READ** (`GET /api/conversas`, `GET /api/conversas/{conversa}/mensagens`, `GET /api/usuarios`) | ✅ funcionando; documentado |
| **UPDATE** (`PUT /api/mensagens/{mensagem}`) | ✅ funcionando; documentado |
| **DELETE** (`DELETE /api/mensagens/{mensagem}` e `DELETE /api/conversas/{conversa}`) | ✅ funcionando; documentado. A exclusão de mensagem não pede confirmação; a de conversa pede |
| **Autenticação e autorização** | ✅ Rotas sob `auth:sanctum`; participação e autoria verificadas no backend |
| **Status de leitura** | ✅ Registro em `mensagem_leituras` ao abrir a conversa. ⚠️ Limitação: o campo `lida` das mensagens enviadas pelo próprio usuário vem sempre verdadeiro e a tela não o exibe |
| **Prevenção de duplicidade (`client_id`)** | ⚠️ Parcial (ver item 4.5 e ADR-006) |
| **Qualidade da interface e integração** | ✅ Estados carregando, vazio, preenchido, erro e sucesso; mensagens claras e tratamento de erros (item 4.5). Acessibilidade parcial |
| **Banco de dados** | ✅ Migration das quatro tabelas; DDL em `database/` |
| **Pré-requisitos (a, b, c, d)** | ✅ aplicação, banco e repositório online; `swagger.json` com as rotas do RF-008 |

> Marque um item como concluído somente depois de executado e conferido na interface, na API e, quando aplicável, no banco.

---

### 4.7 Roteiro de teste

1. Abrir a URL do item a) em uma janela anônima e entrar com a conta do usuário A.
2. Abrir **Mensagens** → conferir que a lista traz somente as conversas do usuário A e comparar com a tabela `conversa_usuario` no phpMyAdmin (**Read**).
3. Pesquisar uma conversa existente e outra inexistente na caixa de busca → conferir os resultados e o texto "Nenhuma conversa encontrada.".
4. Clicar em **Nova mensagem**, pesquisar o usuário B e iniciá-lo → conferir `201` na primeira vez e `200` (mesma conversa) ao repetir; conferir as linhas em `conversas` e `conversa_usuario` (**Create**).
5. Enviar uma mensagem válida → conferir que aparece após a confirmação da API, que permanece após recarregar e que existe em `mensagens` com o `user_id` do usuário A e a `conversa_id` correta.
6. Tentar enviar mensagem vazia, só com espaços e com mais de 5.000 caracteres (por API) → conferir a recusa (`422`) e que nada foi gravado.
7. Editar uma mensagem própria → recarregar → conferir o novo `texto` e `editada = 1` na tela e no banco (**Update**).
8. Com o token do usuário A, enviar `PUT /api/mensagens/{id}` para uma mensagem do usuário B → conferir `404` e que o `texto` não mudou.
9. Excluir uma mensagem própria → conferir que some da conversa e que a linha continua em `mensagens` com `deleted_at` preenchido (**Delete**).
10. Com o token do usuário A, enviar `DELETE /api/mensagens/{id}` para uma mensagem do usuário B → conferir `404` e que a mensagem continua disponível.
11. Com o token do usuário A, chamar `GET /api/conversas/{id}/mensagens` de uma conversa da qual A não participa → conferir `404` sem conteúdo.
12. Como usuário B, abrir a conversa e conferir que as mensagens recebidas ganham linha em `mensagem_leituras` no phpMyAdmin.
13. Chamar os endpoints sem token e com token inválido → conferir `401` e retorno à tela de login.
14. Simular falha da API (por exemplo, derrubar o backend) durante envio, edição e exclusão → conferir que a tela mostra o erro sem apresentar sucesso.
15. Excluir uma conversa (confirmando) → conferir que ela e suas mensagens somem da tela e do banco.
16. Abrir `docs/api/swagger.json` em https://editor.swagger.io → conferir que não há erro e que as oito rotas correspondem às de `backend/routes/api.php`.
17. Conferir o repositório: migration, DDL em `database/`, `.gitignore` e ausência de segredos.
18. Usar a tela em dispositivo móvel e verificar a acessibilidade dos controles e a adaptação da interface.

> **Registro de execução:** marque um teste como aprovado somente depois de executá-lo e conferir o resultado na interface, na API e, quando aplicável, no banco.

---

## 5. Arquitetura e Decisões

### 5.1 Diagrama de Arquitetura

```text
┌──────────────────────────┐      HTTPS / JSON                              ┌─────────────────────────────┐
│  NAVEGADOR DO USUÁRIO    │ ───────────────────────────────────────────▶  │  BACKEND (Render)           │
│                          │      Authorization: Bearer <token>            │  Laravel (API REST)         │
│  FRONTEND (Render)       │                                               │                             │
│  Vue 3 + Vite + Tailwind │ ◀───────────────────────────────────────────  │  routes/api.php             │
│  Vue Router (SPA)        │      JSON (conversas, mensagens, erros)       │    └─ auth:sanctum          │
│  Mensagem.vue            │                                               │  ConversaController         │
│  services/api.js (axios) │                                               │  MensagemController         │
└──────────────────────────┘                                               │    └─ validate()            │
                                                                           │  Models (Eloquent):         │
                                                                           │   Conversa, Mensagem,       │
                                                                           │   MensagemLeitura, Usuario  │
                                                                           └─────────────┬───────────────┘
                                                                                         │ SQL
                                                                                         ▼
                                                                           ┌─────────────────────────────┐
                                                                           │ MySQL (Aiven)               │
                                                                           │ usuarios                    │
                                                                           │ conversas                   │
                                                                           │ conversa_usuario            │
                                                                           │ mensagens                   │
                                                                           │ mensagem_leituras           │
                                                                           │ + personal_access_tokens    │
                                                                           └─────────────────────────────┘
```

**Componentes**

| Camada | Tecnologia | Responsabilidade no RF-008 |
|---|---|---|
| Frontend | Vue 3, Vite, Tailwind, Vue Router — `Mensagem.vue` | Lista de conversas, pesquisa, busca de usuários, histórico, envio, edição e exclusão, exibição de erros |
| Cliente HTTP | `services/api.js` (axios) | Centraliza as chamadas à API, anexa o token Bearer e trata `401` voltando ao login |
| Backend | Laravel (API REST) | Autenticar, validar, verificar participação e autoria, processar as operações e devolver o resultado |
| Autenticação | Laravel Sanctum | Emite e valida o token pessoal de cada usuário |
| Controle de conversas | `ConversaController` | Listar e criar conversas, buscar usuários, consultar mensagens, registrar leitura e excluir conversa |
| Controle de mensagens | `MensagemController` | Enviar, editar e excluir mensagens |
| Camada de dados | Models `Conversa`, `Mensagem` (com `SoftDeletes`) e `MensagemLeitura` (Eloquent) | Representar as entidades e seus relacionamentos |
| Banco de dados | MySQL (Aiven) | Persistir conversas, participantes, mensagens e registros de leitura |
| Hospedagem | Render (deploy a partir do GitHub) | Publicar frontend e backend |

### 5.2 Decisões Arquiteturais (ADRs)

**ADR-001: Frontend e backend separados (SPA + API REST)**
- *Decisão:* Vue 3 como SPA e Laravel apenas como API JSON.
- *Razão:* permite publicar cada parte de forma independente, separar a interface das regras de negócio e da persistência e manter o código organizado, sem PHP misturado com HTML.
- *Consequência:* exige configurar CORS e enviar o token em toda requisição protegida.

**ADR-002: Autenticação com Laravel Sanctum (token Bearer)**
- *Decisão:* as rotas de conversas e mensagens ficam dentro do grupo `auth:sanctum`; o frontend envia o token no cabeçalho `Authorization`.
- *Razão:* é a solução oficial do Laravel para APIs, usada também nos demais requisitos, e garante que somente usuários autenticados acessem mensagens privadas.
- *Consequência:* a autenticação, sozinha, não basta: a participação na conversa e a autoria da mensagem são verificadas no backend a cada operação.

**ADR-003: Autorização por consulta restrita ao usuário (participação e autoria)**
- *Decisão:* as conversas são sempre buscadas a partir do usuário autenticado (`$user->conversas()->findOrFail(...)`) e as mensagens para edição ou exclusão são buscadas com filtro pelo autor (`where('user_id', ...)->findOrFail(...)`). O autor da mensagem é sempre o dono do token; `conversa` e `mensagem` vêm da rota e nunca do corpo.
- *Razão:* os identificadores aparecem na URL e podem ser trocados por qualquer usuário. Restringir a própria consulta impede o acesso, sem depender dos botões do frontend.
- *Consequência:* conversa inexistente, conversa de outros e mensagem de terceiros recebem a mesma resposta (`404`), sem revelar que o registro existe.

**ADR-004: MySQL com Eloquent ORM e migrations**
- *Decisão:* conversas, participantes, mensagens e leituras em quatro tabelas relacionadas à `usuarios`, criadas por migration e acessadas via Eloquent.
- *Razão:* os dados têm relacionamentos que precisam permanecer consistentes. A chave primária composta em `conversa_usuario`, os índices `UNIQUE` e as chaves estrangeiras com `ON DELETE CASCADE` impedem participantes e leituras repetidos e mensagens órfãs. O Eloquent utiliza consultas parametrizadas, reduzindo o risco de SQL Injection.
- *Consequência:* o banco precisa estar acessível pelo backend publicado, e as credenciais ficam nas variáveis de ambiente do Render.

**ADR-005: Exclusão lógica de mensagens e exclusão física de conversas**
- *Decisão:* a mensagem usa `SoftDeletes` (`deleted_at`), então deixa de aparecer nas consultas sem ser apagada. A conversa é removida de fato, e as chaves estrangeiras em cascata removem suas mensagens e leituras.
- *Razão:* a exclusão lógica preserva o registro da mensagem (RN-15, RN-17), enquanto a exclusão da conversa elimina um agrupamento inteiro sem deixar registros órfãos.
- *Consequência:* a política atual é remover a mensagem para **todos** os participantes, e a exclusão da conversa também apaga o histórico do outro participante. Essa política deve ficar registrada e ser testada.

**ADR-006: `client_id` para evitar duplicidade no envio (implementação parcial)**
- *Decisão:* a mensagem aceita um `client_id` (UUID opcional), com índice `UNIQUE` combinado com a conversa e o autor no banco.
- *Razão:* em uma resposta incerta (queda de rede, timeout), o usuário pode tentar de novo e gerar mensagens duplicadas (FA-05).
- *Consequência:* nesta versão, o `Mensagem.vue` não envia o `client_id` e o `MensagemController@store` não trata o reenvio: uma segunda requisição com o mesmo `client_id` seria barrada pelo índice do banco, sem devolver a mensagem já criada. A proteção contra duplicidade fica, portanto, limitada ao índice único e é uma limitação conhecida da versão entregue.

**ADR-007: Interface atualizada somente após a confirmação do backend**
- *Decisão:* envio, edição e exclusão aguardam a resposta da API antes de alterar a tela.
- *Razão:* evita que o usuário veja como concluída uma operação que o servidor não conseguiu persistir (RN-12).
- *Consequência:* a interface mostra o estado de carregamento e uma mensagem de erro em caso de falha, sem marcar a operação como concluída.

**ADR-008: Atualização periódica (polling) em vez de tempo real**
- *Decisão:* enquanto a tela está visível, `Mensagem.vue` consulta a API a cada 5 segundos para atualizar a lista de conversas e as mensagens.
- *Razão:* é simples de manter no Render e não exige servidor de WebSocket.
- *Consequência:* a mensagem de outro usuário pode levar alguns segundos para aparecer, e cada consulta de mensagens também registra a leitura das mensagens recebidas.

**ADR-009: Deploy no Render a partir do GitHub**
- *Decisão:* frontend e backend publicados separadamente no Render, com deploy automático a cada push na branch principal; o backend roda em contêiner Docker.
- *Razão:* permite disponibilizar o sistema por URLs públicas e automatizar a publicação a partir do repositório.
- *Consequência:* segredos e credenciais ficam nas variáveis de ambiente do Render, nunca no repositório.

### 5.3 Fluxo de Dados (Gerenciar Mensagens)

1. O usuário abre **Mensagens**; o Vue chama `GET /api/conversas` com o token.
2. O Sanctum valida o token e identifica o usuário; o `ConversaController@index` consulta somente as conversas do usuário, com a última mensagem e a contagem de não lidas, aplicando o termo `busca` ao nome ou ao nome de usuário do outro participante.
3. A API responde com as conversas autorizadas; o Vue as apresenta, com o estado vazio quando não houver nenhuma.
4. Para iniciar uma conversa, o usuário pesquisa em `GET /api/usuarios?busca=` e seleciona alguém; o Vue envia `POST /api/conversas` com o `usuario_id`. O backend valida, cria a conversa em transação ou devolve a existente (`200`).
5. O usuário seleciona uma conversa; o Vue chama `GET /api/conversas/{conversa}/mensagens`.
6. O backend busca a conversa entre as do usuário. Se não existir ou o usuário não participar, responde `404` sem conteúdo.
7. Se for válida, o backend registra em `mensagem_leituras` a leitura das mensagens recebidas e devolve o histórico em ordem de envio. Se o registro de leitura falhar, as mensagens são exibidas sem afirmar leitura (FA-10).
8. O usuário digita uma mensagem; o Vue envia `POST /api/conversas/{conversa}/mensagens` com o `texto`.
9. O Laravel valida o `texto` (obrigatório, até 5.000 caracteres) e a participação. Se houver erro, responde `422` e o Vue exibe a mensagem, mantendo o usuário na conversa.
10. Se estiver válido, o `MensagemController@store` grava a mensagem com o autor do token e a conversa da rota, e responde `201` com a mensagem criada.
11. Para editar, o Vue envia `PUT /api/mensagens/{mensagem}`. O backend busca a mensagem entre as do usuário; se for de outro, responde `404` e nada muda. Se for do usuário, valida o novo `texto`, grava e marca `editada`.
12. Para excluir, o Vue envia `DELETE /api/mensagens/{mensagem}`. O backend busca a mensagem entre as do usuário e preenche `deleted_at`, preservando o registro.
13. A API responde com o resultado; o Vue atualiza a conversa somente após a confirmação. Se ocorrer falha de comunicação ou de gravação, a interface informa o erro e não apresenta a operação como concluída.

### 5.4 Padrão de Design

**API REST em camadas (MVC sem camada de visão no servidor).** O fluxo é: Rota → Middleware de autenticação (`auth:sanctum`) → Controller → Model (Eloquent) → Banco de dados. A restrição por participação e por autoria acontece na própria consulta do Controller, antes de qualquer leitura ou gravação. A “View” do MVC é a SPA em Vue (`Mensagem.vue`), que consome apenas JSON.

- **Model:** `Conversa`, `Mensagem` e `MensagemLeitura`, com seus relacionamentos.
- **View:** interface em Vue 3, componente `Mensagem.vue`.
- **Controller:** `ConversaController` (conversas, busca de usuários, consulta de mensagens e leitura) e `MensagemController` (envio, edição e exclusão).

*Justificativa:* separa responsabilidades (a tela não conhece o banco, e o banco não conhece a tela), permite evoluir frontend e backend de forma independente e concentra a verificação de permissões em um único ponto do servidor, que não depende do que a interface exibe.

---

## 6. Segurança OWASP

A funcionalidade trabalha com conversas privadas, então os controles abaixo priorizam acesso indevido, autenticação, alteração de campos que não pertencem ao usuário, entradas maliciosas e exposição de credenciais.

### Controle 1: Controle de acesso por participação e autoria (IDOR)

**Vulnerabilidade OWASP (Risco):** A01 – Broken Access Control. Como `{conversa}` e `{mensagem}` aparecem na URL, um usuário autenticado poderia trocar o identificador para ler a conversa privada de outras pessoas ou editar e excluir mensagens de terceiros (IDOR).

**Implementação (Como você protege?):** As rotas ficam dentro do grupo protegido pelo Sanctum. A conversa é sempre buscada entre as do usuário autenticado (`$user->conversas()->findOrFail(...)`) e a mensagem, para edição ou exclusão, é buscada com filtro pelo autor (`where('user_id', ...)->findOrFail(...)`). Conversa inexistente, conversa de outros e mensagem de terceiros recebem a mesma resposta (`404`), sem revelar conteúdo nem existência. A verificação ocorre no backend, mesmo que a interface esconda os botões.

**Teste (Como provou que funciona?):** Com o token do usuário A, chamar `GET /api/conversas/{id}/mensagens` de uma conversa da qual A não participa e esperar `404` sem conteúdo. Em seguida, chamar `PUT` e `DELETE /api/mensagens/{id}` de uma mensagem do usuário B e esperar `404`, conferindo no banco que a mensagem permaneceu intacta e sem `deleted_at`. Registrar os resultados somente após executar os testes.

### Controle 2: Autenticação e proteção dos endpoints

**Vulnerabilidade OWASP (Risco):** A07 – Identification and Authentication Failures. Endpoints sem autenticação adequada permitiriam que pessoas não autorizadas consultassem ou manipulassem mensagens privadas.

**Implementação (Como você protege?):** Todas as rotas de conversas, mensagens e busca de usuários estão no grupo `auth:sanctum` e exigem token válido. No frontend, o `api.js` trata a resposta `401` removendo o token e levando o usuário ao login. Tokens revogados no logout (RF-007) deixam de funcionar nessas rotas.

**Teste (Como provou que funciona?):** Chamar cada uma das oito rotas sem token e com token inválido ou expirado, esperando `401` em todas. Repetir após fazer logout com um token que já foi revogado, esperando `401`. Na interface, conferir que o usuário é levado ao login e que nenhuma conversa fica visível. Registrar os resultados somente após executar os testes.

### Controle 3: Lista de campos permitidos (proteção contra Mass Assignment)

**Vulnerabilidade OWASP (Risco):** A01 – Broken Access Control / A04 – Insecure Design. Se a API gravasse tudo o que chega na requisição, um usuário poderia forjar o autor da mensagem, enviar em outra conversa ou alterar campos internos apenas incluindo-os no corpo.

**Implementação (Como você protege?):** O envio aceita somente `texto` e `client_id`, e a edição aceita somente `texto`, ambos pelo `validate()` do Laravel. O autor vem sempre do token, a conversa vem da rota, e `editada` e `deleted_at` são definidos pelo servidor. Na criação de conversa, só o `usuario_id` é aceito e ele não pode ser o do próprio usuário.

**Teste (Como provou que funciona?):** Enviar `POST /api/conversas/{conversa}/mensagens` com um `texto` válido e, junto, `user_id` do usuário B, `conversa_id` de outra conversa e `deleted_at` preenchido. Esperar `201` e conferir no banco que a mensagem ficou com o autor A, na conversa da rota e sem exclusão. Enviar `PUT` com `user_id` diferente e conferir que o autor não mudou. Enviar `POST /api/conversas` com o próprio `usuario_id` e esperar `422`. Registrar os resultados somente após executar os testes.

### Controle 4: Validação de entrada e proteção contra SQL Injection

**Vulnerabilidade OWASP (Risco):** A03 – Injection. Entrada maliciosa no texto ou nos termos de pesquisa poderia alterar a consulta SQL e permitir ler, alterar ou apagar dados do banco.

**Implementação (Como você protege?):** O backend valida o `texto` (obrigatório, texto, até 5.000 caracteres), o `client_id` (UUID) e o `usuario_id` (inteiro existente). Todo acesso ao banco passa pelo Eloquent, que usa consultas parametrizadas. Nos termos de pesquisa (`busca`), o valor é enviado por *binding* e os curingas do `LIKE` (`%`, `_` e `\`) são escapados antes da consulta, de modo que o termo é sempre tratado como dado.

**Teste (Como provou que funciona?):** Enviar `x'); DROP TABLE mensagens; --` como `texto` de mensagem e como termo de `busca` em `/api/conversas` e `/api/usuarios`. Esperar que o texto seja salvo literalmente como mensagem comum, que a pesquisa apenas não encontre resultados e que as tabelas permaneçam intactas. Pesquisar `%` e `_` e conferir que não retornam todas as conversas ou usuários. Enviar texto vazio e com 5.001 caracteres, esperando `422` e nenhuma linha gravada. Registrar os resultados somente após executar os testes.

### Controle 5: Proteção contra XSS (Cross-Site Scripting)

**Vulnerabilidade OWASP (Risco):** A03 – Injection (XSS). Uma mensagem com HTML ou JavaScript malicioso poderia executar código no navegador de outro participante ao ser exibida na conversa.

**Implementação (Como você protege?):** O texto das mensagens e a prévia da última mensagem são exibidos com a interpolação padrão do Vue (`{{ msg.texto }}` e `{{ conversa.ultimaMensagem }}`), que trata o valor como texto e escapa os caracteres especiais. O `v-html` em `Mensagem.vue` é usado apenas para os ícones fixos definidos no próprio código, nunca para conteúdo enviado por usuários.

**Teste (Como provou que funciona?):** Enviar, do usuário A para o usuário B, `<script>alert('XSS')</script>` e `<img src=x onerror=alert(1)>`. Abrir a conversa como usuário B e confirmar que ambos aparecem como texto, sem executar código, inclusive após recarregar a página, na prévia da lista de conversas e após editar a mensagem. Registrar os resultados somente após executar os testes.

### Controle 6: Proteção de credenciais e prevenção de duplicidade

**Vulnerabilidade OWASP (Risco):** A05 – Security Misconfiguration. Credenciais, tokens ou chaves expostos no repositório permitiriam acesso indevido; além disso, reenvios de requisição poderiam criar mensagens duplicadas quando não tratados.

**Implementação (Como você protege?):** As credenciais do banco e demais segredos ficam em variáveis de ambiente do Render, e o `.env` está no `.gitignore`. O Swagger usa apenas valores fictícios. Contra duplicidade, o banco tem índice `UNIQUE` em (`conversa_id`, `user_id`, `client_id`) e a criação de conversa usa transação com bloqueio, evitando conversas diretas duplicadas. O reenvio de mensagem com `client_id` é uma proteção **parcial** nesta versão (ver ADR-006): o índice único impede o registro duplicado, mas a tela não envia o `client_id` e o backend não devolve a mensagem existente.

**Teste (Como provou que funciona?):** Conferir que `.env` está listado no `.gitignore` e que não há credenciais reais nos arquivos versionados nem no `swagger.json`. Chamar duas vezes `POST /api/conversas` com o mesmo `usuario_id` e confirmar que existe apenas uma conversa em `conversas`. Enviar duas vezes, por API, a mesma mensagem com o mesmo `client_id` e conferir que existe uma única linha em `mensagens` (a segunda requisição é recusada pelo índice único, sem criar duplicata). Registrar os resultados somente após executar os testes.

> **Observação sobre evidências:** os cenários desta seção descrevem como cada controle deve ser validado. Registre como aprovado somente o teste efetivamente executado, sem incluir tokens, senhas ou credenciais reais como evidência.

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
