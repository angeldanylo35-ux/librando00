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
💻 4. Protótipo Funcional
4.1 Localização e acesso ao protótipo
- Aplicação online: https://librando-frontend.onrender.com/
- Plataforma de hospedagem: Render.
- Funcionalidade: opção Mensagens, disponível após a autenticação do usuário.
- Repositório: https://github.com/angeldanylo35-ux/librando00
- Banco de dados: MySQL hospedado na Aiven.
- Interface de administração do banco: https://librando-phpmyadmin.onrender.com
- Banco informado no ambiente online: defaultdb.
O acesso à funcionalidade exige uma conta autenticada. As credenciais de avaliação, caso sejam necessárias, devem ser fornecidas separadamente e nunca registradas neste documento.

4.2 Tecnologias utilizadas
Camada	Tecnologia	Responsabilidade
Frontend	Vue 3	Construção da interface de mensagens e atualização da tela conforme as respostas da API.
Backend	Laravel	Implementação das rotas, validações, regras de negócio e operações de mensagens.
Autenticação	Laravel Sanctum	Proteção dos endpoints para usuários autenticados.
Banco de dados	MySQL	Persistência de conversas, participantes, mensagens e registros de leitura.
Comunicação	API REST/HTTP	Comunicação entre o frontend e o backend.
Controle de versão	Git e GitHub	Armazenamento e acompanhamento do código-fonte.


4.3 Operações implementadas
A funcionalidade RF-008 foi implementada no frontend e no backend, substituindo os dados fictícios da interface por consultas à API.
Operação	Funcionalidade na interface	Processamento no backend	Persistência
Create	Enviar mensagem e iniciar conversa quando necessário.	Valida o usuário, a participação na conversa e o conteúdo antes de criar o registro.	Registra a conversa/participantes quando criada e armazena a mensagem.
Read	Listar e pesquisar conversas; abrir uma conversa e consultar mensagens.	Retorna somente conversas autorizadas e recupera as mensagens correspondentes.	Consulta as tabelas de conversas, participantes e mensagens.
Update	Editar uma mensagem própria.	Confere a autoria e valida o novo conteúdo antes de atualizar.	Atualiza o conteúdo da mensagem autorizada.
Delete	Excluir uma mensagem própria, mediante confirmação na interface.	Confere a autoria e executa a exclusão lógica definida pelo projeto.	Mantém o registro no banco, identificando a mensagem como excluída.


4.4 Endpoints da API
A API possui seis endpoints protegidos pelo middleware auth:sanctum, responsáveis por listar/criar conversas, consultar mensagens e enviar/editar/excluir mensagens.
Operação	Método HTTP	Recurso	Finalidade
Listar conversas	GET	Rota de conversas	Retornar as conversas do usuário autenticado, com pesquisa e contagem de mensagens não lidas.
Criar conversa	POST	Rota de criação de conversa	Criar uma conversa e associar seus participantes.
Consultar mensagens	GET	Rota de mensagens de uma conversa	Retornar as mensagens da conversa autorizada e registrar a leitura das mensagens recebidas.
Enviar mensagem	POST	Rota de envio de mensagem	Validar e armazenar uma nova mensagem.
Editar mensagem	PUT ou PATCH	Rota de mensagem específica	Atualizar o conteúdo de uma mensagem somente quando solicitada por seu autor.
Excluir mensagem	DELETE	Rota de mensagem específica	Realizar a exclusão lógica de uma mensagem própria.


Conferência obrigatória antes da entrega: os caminhos completos das seis rotas e o método exato de atualização devem ser copiados do arquivo backend/routes/api.php ou obtidos pelo comando php artisan route:list --path=api. A tabela acima descreve os recursos e as operações, mas não substitui os URIs reais da aplicação.

4.5 Validações e comportamentos da interface
- A interface consulta a API e não utiliza mais conversas ou mensagens fictícias.
- A pesquisa apresenta somente conversas às quais o usuário autenticado tem acesso.
- O conteúdo da mensagem é obrigatório e deve respeitar o limite de 2.000 caracteres.
- Mensagens com conteúdo vazio ou somente espaços em branco são recusadas.
- A edição e a exclusão ficam restritas ao autor da mensagem.
- A interface aguarda a confirmação do servidor antes de atualizar o estado exibido.
- A exclusão solicita confirmação antes de executar a operação.
- O identificador client_id evita a criação duplicada de mensagens em caso de reenvio da mesma solicitação.
- Quando a atualização do status de leitura falha, a interface não apresenta a mensagem como lida de forma confirmada.
- Erros de validação, falhas de comunicação e sessão expirada recebem tratamento na interface.
- Os controles possuem identificações de acessibilidade e a tela se adapta a dispositivos móveis.
4.6 Estados da tela
Estado	Comportamento esperado
Carregando	A interface informa que está buscando conversas ou mensagens na API.
Vazio	Apresenta uma orientação quando não existem conversas, resultados de pesquisa ou mensagens.
Preenchido	Exibe a lista de conversas e o histórico de mensagens retornado pelo backend.
Erro	Apresenta uma mensagem compreensível quando a API falha, a validação é recusada ou a sessão expira.
Sucesso	Atualiza a conversa e apresenta a confirmação somente depois da resposta bem-sucedida do servidor.


4.7 Banco de dados e persistência
A implementação utiliza migrations do Laravel para criar as seguintes tabelas:
Tabela	Finalidade
conversas	Armazenar os registros das conversas.
conversa_usuario	Relacionar as conversas aos usuários participantes.
mensagens	Armazenar o conteúdo, o autor, a conversa, a informação de edição e os dados de exclusão lógica.
mensagem_leituras	Registrar os dados de leitura das mensagens pelos participantes.


As tabelas possuem relacionamentos com usuarios, utilizando a estrutura de usuários já existente no Librando. As migrations são responsáveis pela criação da estrutura no banco de dados.

Artefato SQL para a entrega: o guia do professor solicita um arquivo DDL em database/, contendo a estrutura de todas as tabelas utilizadas, suas chaves primárias, chaves estrangeiras, restrições e índices. As migrations já implementadas devem ser a referência para gerar e conferir esse arquivo SQL.
4.8 Documentação da API — OpenAPI/Swagger
O guia da disciplina exige o arquivo docs/api/swagger.json, em formato OpenAPI 3.0, documentando as operações implementadas.

A documentação deverá conter:
- Os seis endpoints da RF-008, com seus métodos HTTP e caminhos reais.
- Parâmetros de rota e de pesquisa, quando aplicáveis.
- Campos obrigatórios e exemplos dos corpos das requisições.
- Exemplos de respostas retornadas pela API.
- Códigos de sucesso e de erro compatíveis com os testes reais.
- Esquema de autenticação BearerAuth e indicação de segurança nos endpoints protegidos.
- Respostas para sessão não autenticada, conversa não autorizada, mensagem inexistente e conteúdo inválido.
Local obrigatório no repositório: docs/api/swagger.json.

Validação: abrir o arquivo em https://editor.swagger.io e conferir se o JSON é válido e se os métodos, campos e códigos de resposta correspondem ao comportamento real da API.
A existência e a validação final do swagger.json, assim como a conferência dos URIs e dos códigos HTTP, precisam ser verificadas no repositório e nos testes da API antes da entrega. Não se deve documentar um endpoint ou uma resposta que não exista na implementação.

4.9 Testes de aceitação do RF-008
ID	Cenário	Resultado esperado
T-01	Acessar mensagens com usuário autenticado.	A lista de conversas autorizadas é apresentada.
T-02	Tentar acessar a API sem autenticação ou com sessão expirada.	O acesso é bloqueado e a interface orienta o usuário a autenticar-se novamente.
T-03	Pesquisar uma conversa.	São retornadas somente conversas do usuário autenticado.
T-04	Abrir uma conversa da qual o usuário participa.	As mensagens são apresentadas e as recebidas são marcadas como lidas conforme o processamento do backend.
T-05	Tentar abrir uma conversa de outro usuário.	O backend bloqueia o acesso, sem revelar o conteúdo privado.
T-06	Enviar mensagem válida.	A mensagem é persistida e aparece na conversa após a confirmação da API.
T-07	Enviar mensagem vazia ou com mais de 2.000 caracteres.	A API recusa o conteúdo e a interface apresenta o erro.
T-08	Reenviar uma solicitação com o mesmo client_id.	A mensagem não é duplicada.
T-09	Editar mensagem própria.	O conteúdo é atualizado após a confirmação do backend.
T-10	Tentar editar mensagem de outro participante.	A operação é bloqueada e o conteúdo original permanece inalterado.
T-11	Excluir mensagem própria.	Após a confirmação, a mensagem deixa de ser exibida conforme a exclusão lógica.
T-12	Tentar excluir mensagem de outro participante.	A operação é bloqueada.
T-13	Simular falha na API durante uma operação.	A interface informa a falha e não apresenta a operação como concluída.
T-14	Consultar status de leitura quando houver falha no processamento.	A interface não apresenta leitura como confirmada.
T-15	Utilizar a tela em dispositivo móvel.	Os controles permanecem acessíveis e a interface se adapta à largura da tela.


Registro de execução: os cenários acima constituem o roteiro de validação. Marque cada teste como aprovado somente depois de executá-lo e conferir o resultado na interface e, quando aplicável, no banco de dados.

🏗️ 5. Arquitetura e Decisões Técnicas
5.1 Visão geral da arquitetura
A RF-008 utiliza uma arquitetura cliente-servidor. O frontend desenvolvido em Vue 3 realiza as solicitações HTTP à API Laravel. O backend autentica o usuário, aplica as regras de negócio e consulta ou altera os registros no MySQL.
┌──────────────────────────────────────┐
│             USUÁRIO                   │
│       Navegador / Dispositivo         │
└──────────────────┬───────────────────┘
                   │ Interação
                   ▼
┌──────────────────────────────────────┐
│          FRONTEND — VUE 3             │
│                                      │
│  Mensagem.vue                        │
│  • Lista e pesquisa de conversas     │
│  • Exibição de mensagens             │
│  • Envio, edição e exclusão          │
│  • Estados de carregamento e erro   │
└──────────────────┬───────────────────┘
                   │ Requisições HTTP
                   │ Token de autenticação
                   ▼
┌──────────────────────────────────────┐
│          BACKEND — LARAVEL            │
│                                      │
│  Rotas protegidas: auth:sanctum      │
│  • ConversaController                │
│  • MensagemController                │
│  • Models e relacionamentos          │
│  • Validações e regras de acesso     │
└──────────────────┬───────────────────┘
                   │ Eloquent / SQL
                   ▼
┌──────────────────────────────────────┐
│             MYSQL                     │
│                                      │
│  usuarios                            │
│  conversas                           │
│  conversa_usuario                    │
│  mensagens                           │
│  mensagem_leituras                   │
└──────────────────────────────────────┘
5.2 Componentes da arquitetura
Componente	Tecnologia/artefato	Responsabilidade
Interface de mensagens	Vue 3 — Mensagem.vue	Apresentar conversas, mensagens, pesquisa e controles de gerenciamento.
API	Laravel	Receber requisições, validar dados e executar as operações.
Autenticação	Laravel Sanctum	Restringir o acesso aos endpoints a usuários autenticados.
Controle de conversas	ConversaController	Listar e criar conversas, consultar mensagens e tratar a leitura.
Controle de mensagens	MensagemController	Enviar, editar e excluir mensagens.
Camada de dados	Models Conversa, Mensagem e MensagemLeitura	Representar as entidades e seus relacionamentos.
Persistência	MySQL	Armazenar conversas, participantes, mensagens e leituras.


5.3 Fluxo de dados
1. O usuário acessa a opção Mensagens no frontend.
2. O componente Mensagem.vue solicita à API a lista de conversas.
3. O Laravel recebe a requisição e verifica a autenticação por meio do auth:sanctum.
4. O ConversaController consulta as conversas relacionadas ao usuário autenticado.
5. O Eloquent acessa o banco MySQL e recupera os dados necessários.
6. O backend retorna os dados autorizados em uma resposta HTTP.
7. O Vue 3 apresenta as conversas e permite que o usuário selecione uma delas.
8. Ao abrir a conversa, o frontend solicita suas mensagens.
9. O backend verifica a participação do usuário, recupera as mensagens e processa os registros de leitura das mensagens recebidas.
10. Quando o usuário envia, edita ou exclui uma mensagem, o frontend encaminha a solicitação à API.
11. O MensagemController valida a operação, incluindo conteúdo e autoria.
12. O banco de dados registra a alteração solicitada.
13. O backend retorna o resultado e o frontend atualiza a interface somente após a confirmação.
5.4 Decisões arquiteturais (ADRs)
ADR-001 — Separação entre frontend e backend
- Decisão: utilizar Vue 3 no frontend e Laravel no backend, com comunicação por API HTTP.
- Motivo: separar a apresentação da interface das regras de negócio e da persistência, permitindo organizar e manter cada camada de forma independente.
- Aplicação na RF-008: o componente Mensagem.vue consome os endpoints da API, enquanto os controllers Laravel processam as operações.
ADR-002 — Utilização do Laravel Sanctum para autenticação
- Decisão: proteger os endpoints da funcionalidade com o middleware auth:sanctum.
- Motivo: garantir que somente usuários autenticados possam consultar e gerenciar conversas e mensagens.
- Aplicação na RF-008: as seis rotas da funcionalidade ficam dentro do grupo de autenticação.
ADR-003 — Persistência relacional no MySQL
- Decisão: utilizar MySQL e migrations do Laravel para estruturar os dados.
- Motivo: conversas, participantes, mensagens e leituras possuem relacionamentos que precisam ser mantidos de forma consistente.
- Aplicação na RF-008: as tabelas conversas, conversa_usuario, mensagens e mensagem_leituras relacionam-se à tabela usuarios.
ADR-004 — Organização da lógica por Models e Controllers
- Decisão: separar a representação dos dados em Models e o processamento das requisições em Controllers.
- Motivo: manter as responsabilidades organizadas, facilitar a manutenção e evitar concentrar todas as regras em um único componente.
- Aplicação na RF-008: ConversaController concentra as operações de conversas; MensagemController concentra o gerenciamento das mensagens; os Models representam as entidades e seus relacionamentos.
ADR-005 — Confirmação do backend antes da atualização da interface
- Decisão: atualizar a interface somente após receber a confirmação da API.
- Motivo: evitar que o usuário visualize uma operação como concluída quando o servidor não conseguiu persistir a alteração.
- Aplicação na RF-008: envio, edição e exclusão aguardam a resposta do servidor; falhas são apresentadas sem confirmação indevida.
5.5 Padrão de projeto adotado
A implementação utiliza a organização MVC (Model-View-Controller) no backend Laravel:
- Model: representa os dados e relacionamentos, como Conversa, Mensagem e MensagemLeitura.
- View: no contexto da aplicação, a interface é apresentada pelo frontend Vue 3, por meio do componente Mensagem.vue.
- Controller: recebe as requisições e coordena as operações, por meio de ConversaController e MensagemController.
A separação entre frontend e backend é realizada por meio da API. Essa organização facilita a manutenção, a validação das permissões e a evolução da funcionalidade sem misturar a interface com as regras de persistência.
🔒 6. Segurança — Controles OWASP
A segurança da RF-008 é importante porque a funcionalidade trabalha com conversas privadas e mensagens de usuários. Foram considerados controles para autenticação, autorização, validação de entradas e proteção das credenciais.
Controle 1 — Controle de acesso às conversas e mensagens
Vulnerabilidade OWASP (risco):

Falhas de controle de acesso podem permitir que um usuário consulte conversas privadas ou altere mensagens pertencentes a outras pessoas.

Implementação (como protege):
- Os endpoints são protegidos pelo middleware auth:sanctum.
- O backend verifica se o usuário autenticado participa da conversa solicitada.
- A consulta de uma conversa não autorizada retorna 404, da mesma forma que uma conversa inexistente, evitando revelar sua existência.
- A edição e a exclusão verificam se o usuário é o autor da mensagem.
- As verificações são realizadas no backend, não dependendo apenas dos botões apresentados no frontend.
Teste (como validar):
- Autenticar com um usuário e tentar consultar uma conversa da qual ele não participa.
- Tentar editar e excluir uma mensagem criada por outro usuário.
- Confirmar que as operações são bloqueadas e que os dados originais permanecem inalterados.
Controle 2 — Autenticação e proteção dos endpoints
Vulnerabilidade OWASP (risco):

Endpoints sem autenticação adequada podem permitir que pessoas não autorizadas consultem ou manipulem mensagens privadas.

Implementação (como protege):
- Utilizar o middleware auth:sanctum nas rotas da RF-008.
- Exigir uma sessão/token válido para executar as operações.
- Tratar respostas de autenticação inválida ou sessão expirada no frontend.
- Não disponibilizar os endpoints de gerenciamento de mensagens para acesso sem autenticação.
Teste (como validar):
- Fazer uma requisição aos endpoints sem enviar credenciais.
- Repetir a requisição com credencial inválida ou expirada.
- Confirmar que a API bloqueia o acesso e que a interface informa a necessidade de autenticação.
Controle 3 — Validação de entradas e prevenção contra SQL Injection
Vulnerabilidade OWASP (risco):

Entradas não validadas podem permitir conteúdo inválido, consultas manipuladas ou tentativas de injeção de comandos no banco de dados.

Implementação (como protege):
- Validar o conteúdo das mensagens no backend.
- Recusar mensagens vazias ou compostas apenas por espaços.
- Limitar o conteúdo a 2.000 caracteres.
- Utilizar os recursos de consulta do Eloquent e os mecanismos de parametrização do Laravel, evitando concatenar diretamente entradas do usuário em comandos SQL.
- Tratar os termos da pesquisa como dados de entrada.
Teste (como validar):
- Tentar enviar mensagem vazia, somente com espaços e com mais de 2.000 caracteres.
- Utilizar caracteres especiais e textos que simulem uma tentativa de SQL Injection no campo de mensagem ou pesquisa.
- Confirmar que os dados são tratados como entrada, que a validação funciona e que nenhuma consulta indevida é executada.
Controle 4 — Prevenção contra Cross-Site Scripting (XSS)
Vulnerabilidade OWASP (risco):

Uma mensagem contendo código HTML ou JavaScript malicioso pode tentar executar scripts no navegador de outro participante.

Implementação (como protege):
- Exibir o conteúdo das mensagens como texto, utilizando a interpolação e os mecanismos de escape padrão do Vue.
- Evitar renderizar conteúdo enviado pelo usuário como HTML confiável.
- Não utilizar v-html para exibir mensagens sem sanitização apropriada.
- Manter a validação no backend e a apresentação segura no frontend.
Teste (como validar):
- Enviar uma mensagem contendo texto semelhante a uma tag <script> ou a um atributo HTML com evento JavaScript.
- Abrir a conversa com outro usuário.
- Confirmar que o conteúdo é exibido como texto e que nenhum script é executado.
Controle 5 — Proteção de credenciais e prevenção de duplicidade
Vulnerabilidade OWASP (risco):

Credenciais, tokens ou configurações sensíveis expostos no repositório podem permitir acesso indevido. Além disso, reenvios de requisições podem gerar mensagens duplicadas.

Implementação (como protege):
- Manter credenciais e configurações sensíveis em variáveis de ambiente, sem registrá-las no código-fonte.
- Manter o arquivo .env fora do versionamento por meio do .gitignore.
- Não inserir tokens ou senhas reais na documentação Swagger.
- Utilizar o identificador client_id para reconhecer reenvios da mesma solicitação e evitar a duplicação de mensagens.
Teste (como validar):
- Conferir se .env está listado no .gitignore e se não há credenciais reais nos arquivos versionados.
- Inspecionar o histórico do repositório para verificar se segredos não foram publicados.
- Enviar novamente uma solicitação com o mesmo client_id e confirmar que não é criado um segundo registro para a mesma mensagem.
Observação sobre evidências: os cenários desta seção descrevem como os controles devem ser validados. Registre como aprovado somente o teste que tiver sido efetivamente executado. Não inclua tokens, senhas ou credenciais reais como evidência.

✅ Checklist final de entrega — RF-008
- [ ] Aplicação online acessível pela URL informada no Tópico 1.
- [ ] Acesso de avaliação definido, sem expor credenciais no documento.
- [ ] Banco MySQL online e dados persistidos após recarregar a aplicação.
- [ ] Repositório GitHub público com o código atualizado.
- [ ] Migrations das quatro tabelas presentes no backend.
- [ ] Arquivo DDL SQL criado em database/ e conferido com as migrations.
- [ ] Arquivo docs/api/swagger.json criado em OpenAPI 3.0.
- [ ] Os seis endpoints reais documentados, com métodos, campos e respostas conferidos.
- [ ] Swagger validado no editor oficial.
- [ ] Testes de Create, Read, Update e Delete executados pela interface.
- [ ] Testes de autorização, autenticação, validação e tratamento de erros executados.
- [ ] Responsividade e acessibilidade conferidas.
- [ ] Nenhum .env, token, senha ou chave real publicado no GitHub.
