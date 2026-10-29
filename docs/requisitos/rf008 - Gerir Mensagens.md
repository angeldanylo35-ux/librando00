# RF-008 — Gerir Mensagens

## 1. Identificação

| Campo | Definição |
|---|---|
| **ID** | RF-008 |
| **Título** | Gerir Mensagens |
| **Prioridade** | ALTA |
| **Complexidade** | ALTA — 8 Story Points |
| **Status** | A DEFINIR |
| **Caso de Uso** | UC-008 |

## 2. Localização dos Artefatos

| Artefato | Localização |
|---|---|
| Repositório GitHub | [Librando](https://github.com/angeldanylo35-ux/librando00.git) |
| Aplicação online | A definir |
| Banco de dados online | A definir |
| Quadro de tarefas | Trello do projeto |

## 3. Descrição e Benefícios

O sistema Librando deverá permitir que usuários cadastrados acessem a opção **Conversas**, disponível na página principal da aplicação. Nessa área, o usuário poderá visualizar suas conversas, enviar mensagens, consultar mensagens recebidas e enviadas, atualizar e excluir suas próprias mensagens.

O sistema também deverá disponibilizar a pesquisa de conversas e a visualização do status de leitura das mensagens, permitindo que os usuários acompanhem a comunicação de maneira mais organizada, prática e acessível.

O recurso deverá respeitar a privacidade dos usuários e manter as operações de gerenciamento de mensagens restritas aos participantes autorizados de cada conversa.

## 4. Atores e Permissões CRUD

### 4.1. Usuário Cadastrado

| Operação | Permissão | Descrição |
|---|---|---|
| **Create** | ✅ | Enviar mensagens em uma conversa autorizada. |
| **Read** | ✅ | Visualizar conversas, mensagens e seus status de leitura. |
| **Update** | ✅ | Atualizar as próprias mensagens, respeitando as regras definidas pelo sistema. |
| **Delete** | ✅ | Excluir as próprias mensagens, respeitando as regras definidas pelo sistema. |

### 4.2. Sistema Librando

| Operação | Permissão | Descrição |
|---|---|---|
| **Create** | ❌ | O sistema não inicia conversas ou envia mensagens em nome próprio. |
| **Read** | ✅ | Consultar os dados necessários para exibir mensagens, conversas e status de leitura aos participantes autorizados. |
| **Update** | ✅ | Atualizar informações operacionais, como o status de leitura das mensagens. |
| **Delete** | ❌ | O sistema não decide excluir mensagens por conta própria; a exclusão depende de uma ação autorizada do usuário. |

**Observação:** as permissões representam as responsabilidades funcionais de cada ator. O sistema poderá executar tecnicamente uma operação solicitada pelo usuário, mas não deverá decidir excluir mensagens de forma autônoma.

## 5. Regras de Negócio e Validações

| ID | Regra |
|---|---|
| **RN-01** | Somente usuários autenticados poderão acessar a área de conversas. |
| **RN-02** | O usuário poderá visualizar apenas conversas das quais seja participante autorizado. |
| **RN-03** | O envio de mensagens deverá ocorrer dentro de uma conversa autorizada. |
| **RN-04** | O usuário poderá atualizar somente as próprias mensagens. |
| **RN-05** | O usuário poderá excluir somente as próprias mensagens, sem autorização para excluir mensagens de outros participantes. |
| **RN-06** | O sistema deverá disponibilizar o status de leitura das mensagens conforme o funcionamento definido para as conversas. |
| **RN-07** | A pesquisa deverá permitir localizar conversas às quais o usuário tenha acesso. |
| **RN-08** | O sistema deverá validar as permissões antes de permitir a visualização, atualização ou exclusão de mensagens. |
| **RN-09** | Mensagens e conversas deverão respeitar os requisitos de privacidade e segurança da aplicação. |

## 6. Caso de Uso — UC-008

**Nome:** Gerir Mensagens

**Ator principal:** Usuário Cadastrado.

### 6.1. Pré-condições

- O usuário deverá estar autenticado no Librando.
- O usuário deverá ter acesso à página principal da aplicação.

### 6.2. Pós-condições

- As mensagens enviadas, atualizadas ou excluídas deverão refletir a operação realizada.
- O status de leitura deverá ser disponibilizado conforme as regras do sistema.
- A pesquisa deverá apresentar apenas conversas acessíveis ao usuário.

### 6.3. Fluxo Principal

1. O usuário acessa a página principal do Librando.
2. O usuário seleciona a opção **Conversas**.
3. O sistema apresenta as conversas disponíveis para o usuário.
4. O usuário seleciona uma conversa.
5. O sistema apresenta as mensagens da conversa e seus respectivos status de leitura, quando disponíveis.
6. O usuário poderá enviar uma nova mensagem, atualizar ou excluir uma mensagem própria.
7. O sistema valida a operação solicitada.
8. O sistema realiza a operação autorizada e atualiza a exibição da conversa.

### 6.4. Fluxos Alternativos

- **Pesquisa de conversas:** o usuário informa um termo de pesquisa e o sistema apresenta as conversas correspondentes às quais ele tem acesso.
- **Mensagem inválida:** o sistema informa o problema e não envia a mensagem.
- **Permissão insuficiente:** o sistema bloqueia a operação e apresenta uma mensagem informativa.
- **Conversa inexistente ou inacessível:** o sistema informa que a conversa não está disponível para o usuário.

## 7. Requisitos Não Funcionais

| ID | Requisito |
|---|---|
| **RNF-01** | **Desempenho:** as conversas e mensagens deverão ser exibidas em até 2 segundos em condições normais de uso. |
| **RNF-02** | **Segurança:** o acesso às mensagens deverá ser restrito aos participantes autorizados. |
| **RNF-03** | **Usabilidade:** a opção Conversas deverá ser facilmente identificável na página principal. |
| **RNF-04** | **Acessibilidade:** a interface deverá considerar as necessidades de acessibilidade da comunidade surda e dos usuários do Librando. |
| **RNF-05** | **Compatibilidade:** a funcionalidade deverá ser compatível com Chrome, Firefox, Edge e Safari em versões suportadas. |
| **RNF-06** | **Integridade:** atualizações e exclusões deverão ser refletidas corretamente na conversa. |

## 8. Critérios de Aceitação

- [ ] O usuário autenticado consegue acessar a opção Conversas.
- [ ] O usuário consegue visualizar suas conversas e mensagens.
- [ ] O usuário consegue enviar mensagens.
- [ ] O usuário consegue atualizar as próprias mensagens.
- [ ] O usuário consegue excluir as próprias mensagens.
- [ ] O usuário consegue visualizar o status de leitura das mensagens.
- [ ] O usuário consegue pesquisar conversas.
- [ ] O sistema impede o acesso a conversas não autorizadas.
- [ ] O sistema impede a alteração ou exclusão de mensagens pertencentes a outros usuários.
- [ ] A funcionalidade atende aos requisitos de desempenho e acessibilidade definidos.

## 9. Pontos Pendentes de Definição

Os seguintes comportamentos deverão ser definidos pela equipe antes da implementação final:

| ID | Ponto pendente | Decisão necessária |
|---|---|---|
| **PD-01** | Atualização de mensagens | Definir se o usuário poderá editar mensagens a qualquer momento ou somente dentro de um prazo. |
| **PD-02** | Exclusão de mensagens | Definir se a exclusão removerá a mensagem para todos os participantes ou somente para quem a excluiu. |
| **PD-03** | Pesquisa de conversas | Definir se a pesquisa será realizada pelo nome do participante, pelo conteúdo das mensagens ou por ambos. |
| **PD-04** | Status de leitura | Definir como o status será atualizado e apresentado aos participantes. |
