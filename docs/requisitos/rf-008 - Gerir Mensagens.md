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
