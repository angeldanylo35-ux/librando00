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
- Para atualizar ou excluir uma mensagem, o usuário deverá ser seu autor e possuir uma sessão válida.
- O banco de dados deverá estar acessível para consultar e persistir as informações necessárias.

### 🚀 3.3 Fluxo Principal

1. 👤 O usuário acessa sua conta no Librando.
2. 🖥️ O sistema apresenta a página principal da aplicação.
3. 💬 O usuário seleciona a opção **Conversas**.
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

1. O usuário tenta acessar a opção **Conversas** sem uma sessão válida.
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

## 4. Protótipo

**Aplicação online:** https://librando-frontend.onrender.com/

**Caminho previsto na interface:** página principal → **Conversas** → selecionar uma conversa.

> ⚠️ A disponibilidade da funcionalidade, dos endpoints e dos controles deverá ser confirmada na aplicação publicada. As rotas abaixo são propostas de referência e não devem ser consideradas implementadas até serem verificadas no código e na documentação da API.

### 4.1 Pré-requisitos dos itens a, b, c e d

**a) Aplicação online e pública**

- **URL:** https://librando-frontend.onrender.com/
- **Plataforma:** Render.
- **Acesso:** autenticação necessária para visualizar conversas privadas.
- **Verificação:** confirmar que a opção **Conversas** está disponível e que a navegação funciona após o login.

**b) Banco de dados online e persistindo dados**

- **SGBD:** MySQL hospedado no Aiven.
- **Interface de acesso:** phpMyAdmin — https://librando-phpmyadmin.onrender.com
- **Verificação:** confirmar a estrutura real das tabelas utilizadas para armazenar conversas, mensagens, participantes e status de leitura.
- **Persistência:** verificar se as mensagens continuam disponíveis após recarregar a página.

**c) Código-fonte completo no GitHub**

- **Repositório:** https://github.com/angeldanylo35-ux/librando00
- **Branch principal:** `main`.
- **Verificação:** confirmar a existência dos componentes do frontend, dos controladores e serviços do backend e das migrations relacionadas à funcionalidade.

**d) Documentação da API**

- **Arquivo de referência:** `docs/api/swagger.json`.
- **Verificação:** documentar os endpoints de conversas e mensagens somente após confirmar os métodos, parâmetros, regras de autenticação e respostas implementados.

### 4.2 CRUD: as operações do RF-008

A tabela abaixo apresenta uma proposta de organização das operações. Os endpoints são sugestões e deverão ser ajustados conforme as rotas efetivamente implementadas.

| Operação | Ação na interface | Método HTTP sugerido | Endpoint sugerido | Resposta esperada |
|---|---|---|---|---|
| **Create** | Enviar mensagem | `POST` | `/api/conversas/{conversa}/mensagens` | `201`, `400`, `401`, `403` ou `500` |
| **Read** | Abrir conversas e visualizar mensagens | `GET` | `/api/conversas` e `/api/conversas/{conversa}/mensagens` | `200`, `401`, `403` ou `404` |
| **Update** | Editar mensagem própria | `PATCH` | `/api/mensagens/{mensagem}` | `200`, `400`, `401`, `403`, `404` ou `500` |
| **Delete** | Excluir mensagem própria | `DELETE` | `/api/mensagens/{mensagem}` | `200`/`204`, `401`, `403`, `404` ou `500` |
| **Pesquisa** | Pesquisar conversas | `GET` | `/api/conversas?busca={termo}` | `200`, `401` ou `422` |
| **Status de leitura** | Consultar ou atualizar a leitura | `GET` ou `PATCH` | A definir conforme a implementação | A definir |

> **Importante:** os endpoints, códigos HTTP e nomes dos parâmetros desta seção são propostas para documentação. Devem ser substituídos pelos valores reais após a análise de `backend/routes/api.php` e dos controladores correspondentes.

### 4.3 Documentação da API

Arquivo de referência: `docs/api/swagger.json`.

A documentação deverá descrever, quando implementadas, as operações de:

| Operação | O que documentar |
|---|---|
| Listar conversas | Método, autenticação, parâmetros de pesquisa e formato da resposta. |
| Consultar mensagens | Identificação da conversa, autorização e formato das mensagens retornadas. |
| Enviar mensagem | Conteúdo obrigatório, validações, associação à conversa e resposta de sucesso. |
| Atualizar mensagem | Identificação da mensagem, autorização por autoria e conteúdo permitido. |
| Excluir mensagem | Política de exclusão, autorização e resposta da operação. |
| Consultar status de leitura | Estado apresentado e regras de atualização. |
| Pesquisar conversas | Parâmetro de busca, validação e limitação dos resultados às conversas autorizadas. |

- A API deverá documentar os mecanismos de autenticação utilizados pelo projeto.
- As operações protegidas deverão indicar a necessidade de autenticação.
- Os exemplos de requisição e resposta deverão utilizar dados fictícios.
- Os códigos HTTP documentados deverão corresponder aos retornados pela implementação.
- Nenhuma senha, token ou chave real deverá ser incluída no arquivo.

### 4.4 Script DDL do banco de dados

**Arquivo sugerido:** `database/rf-008-gerir-mensagens-ddl.sql`.

O script deverá ser criado ou atualizado de acordo com a modelagem efetiva do banco de dados.

As entidades a serem avaliadas são:

- **Conversas:** identificação da conversa e informações necessárias ao seu gerenciamento.
- **Participantes:** associação entre usuários e conversas, caso a arquitetura utilize uma tabela específica.
- **Mensagens:** conteúdo, autor, conversa e datas de criação e atualização.
- **Status de leitura:** informações necessárias para registrar ou consultar a leitura das mensagens, conforme o modelo adotado.

**Requisitos de integridade a verificar:**

- Chaves primárias e estrangeiras adequadas.
- Associação válida entre mensagem, conversa e autor.
- Índices que apoiem a consulta de mensagens por conversa e a pesquisa de conversas.
- Regras de exclusão que evitem inconsistências nos registros relacionados.
- Validações de conteúdo compatíveis com as regras de negócio.
- Proteção dos dados privados dos usuários.

> ⚠️ A estrutura das tabelas, os nomes das colunas e os relacionamentos não estão confirmados neste documento. O DDL deverá refletir o modelo real aprovado pela equipe, evitando criar tabelas duplicadas para funcionalidades já existentes.

### 4.5 Interface e integração

| Item | Situação |
|---|---|
| Opção **Conversas** acessível pela página principal | ⏳ A validar/implementar |
| Listagem das conversas autorizadas | ⏳ A validar/implementar |
| Visualização das mensagens enviadas e recebidas | ⏳ A validar/implementar |
| Envio de mensagens com validação do conteúdo | ⏳ A validar/implementar |
| Edição das próprias mensagens | ⏳ A validar/implementar |
| Exclusão das próprias mensagens | ⏳ A validar/implementar |
| Visualização do status de leitura | ⏳ A validar/implementar |
| Pesquisa de conversas | ⏳ A validar/implementar |
| Mensagens de erro claras em português | ⏳ A validar/implementar |
| Tratamento de falhas nas chamadas à API | ⏳ A validar/implementar |
| Estado vazio para conversas sem mensagens | ⏳ A validar/implementar |
| Estado de carregamento durante as consultas | ⏳ A validar/implementar |
| Atualização da interface após operações bem-sucedidas | ⏳ A validar/implementar |
| Validação de autoria e permissão no backend | ⏳ A validar/implementar |
| Proteção de conversas privadas | ⏳ A validar/implementar |

### 4.6 Autoavaliação (Tópico 4)

| Parte | Situação |
|---|---|
| **CREATE** — envio de mensagens | ⏳ Confirmar/implementar |
| **READ** — listagem de conversas e mensagens | ⏳ Confirmar/implementar |
| **UPDATE** — edição de mensagens próprias | ⏳ Confirmar/implementar |
| **DELETE** — exclusão de mensagens próprias | ⏳ Confirmar/implementar |
| **Pesquisa de conversas** | ⏳ Confirmar/implementar |
| **Status de leitura** | ⏳ Confirmar/implementar |
| **Segurança e autorização** | ⏳ Testar acesso e autoria no backend |
| **Qualidade da interface e integração** | ⏳ Validar estados de carregamento, vazio, sucesso e erro |
| **Pré-requisitos (a, b, c, d)** | ⏳ Confirmar aplicação, banco, repositório e documentação da API |

### 4.7 Roteiro de teste

1. Abrir a aplicação publicada e autenticar-se com uma conta de teste autorizada.
2. Acessar a página principal e selecionar **Conversas**.
3. Verificar se o sistema apresenta somente as conversas às quais a conta possui acesso.
4. Abrir uma conversa e conferir se as mensagens são exibidas corretamente.
5. Enviar uma mensagem válida e verificar a confirmação apresentada pela aplicação.
6. Recarregar a página e verificar se a mensagem continua disponível.
7. Tentar enviar uma mensagem vazia ou contendo somente espaços e conferir a validação.
8. Editar uma mensagem própria e confirmar que a alteração aparece após o salvamento.
9. Tentar editar uma mensagem de outro usuário e verificar se o backend bloqueia a operação.
10. Solicitar a exclusão de uma mensagem própria e conferir o comportamento definido pela política de exclusão.
11. Cancelar a confirmação de exclusão, caso exista, e verificar se a mensagem permanece disponível.
12. Tentar excluir uma mensagem de outro usuário e confirmar que a operação não é autorizada.
13. Verificar se o status de leitura é apresentado de acordo com os dados registrados pelo sistema.
14. Pesquisar uma conversa existente e verificar se o resultado corresponde ao termo informado.
15. Pesquisar um termo sem correspondência e verificar se a interface apresenta um estado sem resultados.
16. Tentar acessar uma conversa utilizando uma conta que não participa dela e verificar se o backend bloqueia o acesso.
17. Testar as operações com sessão expirada ou token inválido.
18. Conferir se os erros de rede e de persistência são apresentados sem mensagens indevidas de sucesso.
19. Verificar a persistência das operações diretamente no banco de dados, utilizando acesso autorizado.
20. Conferir se os endpoints e os códigos HTTP documentados no Swagger correspondem à implementação testada.
21. Verificar o comportamento da interface em dispositivos móveis e em diferentes navegadores.
22. Confirmar que a pesquisa e a consulta de mensagens não expõem dados de outras conversas.

---

## 5. Arquitetura e Decisões

### 5.1 Diagrama de Arquitetura

O diagrama abaixo representa a arquitetura lógica proposta para a funcionalidade e deverá ser ajustado se a implementação utilizar outros componentes ou mecanismos de comunicação.

```text
┌────────────────────────────┐
│ NAVEGADOR DO USUÁRIO       │
│                            │
│ FRONTEND                   │
│ Vue 3 + Vite + Tailwind    │
│ Página principal           │
│ Área de conversas          │
│ Lista e painel de mensagens│
└──────────────┬─────────────┘
               │ HTTPS / JSON
               │ Authorization: Bearer <token>
               ▼
┌────────────────────────────┐
│ BACKEND                    │
│ Laravel - API REST         │
│                            │
│ Autenticação               │
│ Validação de entrada       │
│ Autorização por conversa   │
│ Controle de autoria        │
│ Serviços de mensagens      │
└──────────────┬─────────────┘
               │
               │ Consultas e persistência
               ▼
┌────────────────────────────┐
│ BANCO DE DADOS             │
│ MySQL - Aiven              │
│                            │
│ Conversas                  │
│ Participantes              │
│ Mensagens                  │
│ Status de leitura          │
└────────────────────────────┘
```

**Componentes**

| Camada | Tecnologia ou componente | Responsabilidade no RF-008 |
|---|---|---|
| Frontend | Vue 3, Vite e Tailwind CSS | Apresentar conversas, mensagens, pesquisa e controles de gerenciamento. |
| Cliente HTTP | Serviço de API do frontend | Enviar as requisições ao backend e incluir a autenticação necessária. |
| Backend | Laravel — API REST | Validar solicitações, aplicar regras de negócio e retornar os resultados. |
| Autenticação | Mecanismo utilizado pelo projeto | Identificar o usuário autenticado e proteger as operações privadas. |
| Banco de dados | MySQL — Aiven | Persistir conversas, mensagens e dados relacionados conforme o modelo adotado. |
| Documentação | Swagger/OpenAPI | Descrever os endpoints, os parâmetros, a autenticação e as respostas da API. |

### 5.2 Decisões Arquiteturais (ADRs)

**ADR-001: Frontend e backend separados**

- *Decisão proposta:* manter a interface de conversas no frontend e as regras de negócio no backend por meio da API.
- *Razão:* manter a organização do projeto e centralizar as validações de segurança.
- *Consequência:* as operações deverão seguir os contratos definidos pela API, e o frontend deverá tratar corretamente as respostas e os erros.

**ADR-002: Autenticação e autorização das conversas**

- *Decisão proposta:* utilizar o mecanismo de autenticação já adotado pelo Librando e validar no backend a participação do usuário na conversa.
- *Razão:* impedir que a interface seja utilizada para acessar mensagens privadas de outras pessoas.
- *Consequência:* todas as rotas privadas deverão verificar a identidade do usuário e sua autorização para acessar o recurso solicitado.

**ADR-003: Validação de autoria para atualização e exclusão**

- *Decisão proposta:* permitir a atualização e a exclusão somente das mensagens pertencentes ao usuário autenticado.
- *Razão:* preservar a integridade e a autoria do conteúdo.
- *Consequência:* a API deverá verificar a autoria no backend antes de executar qualquer alteração ou exclusão.

**ADR-004: Persistência relacional**

- *Decisão proposta:* utilizar o MySQL já adotado pelo projeto, respeitando o modelo de dados aprovado para conversas e mensagens.
- *Razão:* manter a integração com a infraestrutura existente e permitir consultas estruturadas.
- *Consequência:* chaves, índices e relacionamentos deverão ser definidos de acordo com a modelagem real e com as necessidades de consulta.

**ADR-005: Política de exclusão de mensagens**

- *Decisão pendente:* definir se a exclusão remove a mensagem para todos os participantes ou apenas para o usuário que a excluiu.
- *Razão:* esse comportamento afeta a experiência dos participantes, a integridade do histórico e a modelagem dos dados.
- *Consequência:* o backend, a interface, o banco de dados e a documentação da API deverão seguir a mesma política.

**ADR-006: Status de leitura**

- *Decisão pendente:* definir quando uma mensagem será considerada lida, como esse estado será armazenado e quais participantes poderão visualizá-lo.
- *Razão:* garantir que o indicador apresentado na interface corresponda ao comportamento real do sistema.
- *Consequência:* as regras de atualização e consulta do status deverão ser implementadas e testadas de forma consistente.

**ADR-007: Pesquisa de conversas**

- *Decisão pendente:* definir se a pesquisa será realizada pelo nome do participante, pelo conteúdo das mensagens ou por ambos.
- *Razão:* delimitar o comportamento esperado e evitar consultas desnecessárias.
- *Consequência:* os parâmetros, índices e filtros de autorização deverão corresponder aos critérios definidos.

### 5.3 Fluxo de Dados (Gerenciar Mensagens)

1. O usuário acessa a opção **Conversas** no frontend.
2. O frontend envia uma solicitação autenticada ao backend para consultar as conversas.
3. O backend identifica o usuário autenticado e valida as permissões de acesso.
4. O backend consulta o banco de dados e retorna somente as conversas autorizadas.
5. O usuário seleciona uma conversa e o frontend solicita as mensagens correspondentes.
6. O backend verifica novamente a autorização para acessar a conversa e recupera as mensagens.
7. O frontend apresenta as mensagens e os status de leitura disponíveis.
8. Quando o usuário envia, atualiza ou exclui uma mensagem, o frontend envia a solicitação correspondente.
9. O backend valida o conteúdo, a autoria e as permissões antes de executar a operação.
10. O banco de dados registra a alteração quando a operação é válida.
11. O backend retorna o resultado confirmado ao frontend.
12. O frontend atualiza a interface e apresenta uma mensagem de retorno adequada.

### 5.4 Padrão de Design

- **Arquitetura cliente-servidor:** o frontend apresenta a interface e o backend processa as operações.
- **API REST:** as operações de consulta e gerenciamento são disponibilizadas por endpoints HTTP, conforme a implementação.
- **Separação de responsabilidades:** componentes de interface, serviços de comunicação, controladores, regras de negócio e persistência devem permanecer organizados.
- **Validação centralizada:** as regras de autenticação, autorização, autoria e conteúdo devem ser aplicadas no backend.
- **Tratamento consistente de erros:** a API deverá retornar respostas adequadas e a interface deverá apresentá-las de maneira compreensível.

---

## 6. Segurança OWASP

Os controles a seguir são medidas propostas para a funcionalidade. Sua implementação deverá ser confirmada por meio de inspeção do código e de testes.

### Controle 1: Controle de acesso e autenticação nas rotas de mensagens

- Proteger as rotas privadas com o mecanismo de autenticação adotado pelo Librando.
- Validar no backend se o usuário autenticado participa da conversa solicitada.
- Impedir a consulta de mensagens de conversas não autorizadas.
- Verificar a autorização em todas as operações de consulta, envio, atualização e exclusão.
- Não confiar apenas na ocultação de botões ou controles no frontend.

**Risco mitigado:** acesso indevido a conversas e mensagens privadas.

### Controle 2: Autorização por autoria da mensagem

- Identificar o autor da mensagem a partir da identidade autenticada.
- Verificar a autoria antes de permitir atualização ou exclusão.
- Não confiar em identificadores de autor enviados livremente pelo frontend.
- Impedir que a troca de um identificador na URL permita alterar ou excluir mensagens de terceiros.

**Risco mitigado:** alteração ou exclusão não autorizada de conteúdo.

### Controle 3: Validação de entrada

- Validar o conteúdo da mensagem no backend.
- Rejeitar mensagens vazias ou com conteúdo fora dos limites estabelecidos.
- Validar os parâmetros de pesquisa e os identificadores de conversas e mensagens.
- Retornar erros claros para dados inválidos.
- Não utilizar os dados recebidos como comandos executáveis.

**Risco mitigado:** processamento de dados inválidos e exploração de falhas de entrada.

### Controle 4: Proteção contra SQL Injection

- Utilizar consultas parametrizadas e os mecanismos seguros de acesso ao banco de dados disponíveis no framework.
- Evitar concatenar diretamente termos de pesquisa em comandos SQL.
- Validar os parâmetros utilizados para identificar conversas e mensagens.
- Revisar as consultas que envolvem conteúdo de mensagens e filtros de pesquisa.

**Risco mitigado:** manipulação indevida das consultas ao banco de dados.

### Controle 5: Proteção contra XSS (Cross-Site Scripting)

- Exibir o conteúdo das mensagens como texto, sem interpretá-lo indevidamente como HTML executável.
- Utilizar os mecanismos de escape e renderização segura do framework.
- Não inserir conteúdo de mensagens diretamente no DOM por meio de recursos que executem HTML sem sanitização adequada.
- Validar e tratar dados de entrada conforme a finalidade de cada campo.

**Risco mitigado:** execução de scripts maliciosos na interface de outros participantes.

### Controle 6: Proteção de dados e privacidade das conversas

- Restringir as respostas da API às conversas autorizadas.
- Evitar retornar mensagens privadas em consultas que não estejam associadas ao usuário autorizado.
- Não expor tokens, senhas ou outros segredos nas respostas da API.
- Evitar registrar o conteúdo integral das mensagens em logs de aplicação sem necessidade.
- Aplicar os princípios de menor privilégio no acesso aos dados.

**Risco mitigado:** exposição indevida de informações privadas.

### Controle 7: Integridade das operações de mensagem

- Validar a autorização antes de executar atualizações ou exclusões.
- Garantir que falhas de persistência não sejam apresentadas como sucesso.
- Definir uma política clara de exclusão de mensagens e aplicá-la de maneira consistente.
- Evitar que operações concorrentes deixem o histórico em um estado inconsistente.
- Confirmar que as alterações retornadas ao frontend correspondem aos dados efetivamente persistidos.

**Risco mitigado:** inconsistências, alterações indevidas e perda inesperada de informações.

### Controle 8: Tratamento de erros e respostas da API

- Retornar códigos HTTP compatíveis com o resultado real de cada operação.
- Não revelar informações internas do servidor, consultas SQL, tokens ou detalhes sensíveis nas mensagens de erro.
- Apresentar mensagens compreensíveis ao usuário.
- Registrar informações técnicas necessárias para diagnóstico, respeitando a privacidade dos usuários.
- Não confirmar o envio, a atualização ou a exclusão quando a operação não tiver sido concluída.

**Risco mitigado:** vazamento de informações técnicas e confirmação indevida de operações.

### Controle 9: Segurança da pesquisa de conversas

- Limitar os resultados às conversas às quais o usuário tem acesso.
- Validar o termo de pesquisa e os parâmetros recebidos.
- Evitar consultas excessivamente custosas e retornos desnecessariamente grandes.
- Avaliar paginação e índices conforme o volume de dados esperado.
- Não utilizar o termo de pesquisa como critério suficiente para conceder acesso a uma conversa.

**Risco mitigado:** exposição de dados e abuso da funcionalidade de pesquisa.

### Controle 10: Verificação e testes de segurança

- Testar tentativas de acesso sem autenticação.
- Testar tentativas de consultar conversas de outros usuários.
- Testar atualização e exclusão de mensagens que não pertencem ao usuário autenticado.
- Testar entradas maliciosas nos campos de mensagem e pesquisa.
- Confirmar que as permissões são aplicadas no backend e que a interface reflete corretamente os resultados.

**Risco mitigado:** falhas de autorização, validação e integridade que poderiam comprometer a privacidade das conversas.

---

**Observação final:** este documento descreve o comportamento esperado do RF-008. Antes de marcar os itens como concluídos, a equipe deverá verificar a implementação real no frontend, no backend, no banco de dados e no Swagger. Os endpoints e as decisões indicados como pendentes deverão ser confirmados antes de serem tratados como parte da API existente.
