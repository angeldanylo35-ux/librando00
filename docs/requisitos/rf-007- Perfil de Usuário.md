# RF-007: Perfil de Usuário

## 🎯 1. Identificação

- **ID:** RF-007
- **Título:** Perfil de Usuário
- **Tipo:** Requisito Funcional
- **Prioridade:** ALTA
- **Complexidade:** 8 story points

## 📍 Localização dos Artefatos

### a) URL da Aplicação (Deploy Online)

- **Deploy:** [Inserir URL da aplicação online]
- **Plataforma:** [Informar a plataforma utilizada]
- **Acesso:** [Público ou restrito]
- **Funcionalidade:** Perfil de Usuário

### b) Link do Banco de Dados Online

- **BD:** [Informar o banco de dados utilizado]
- **Link:** [Inserir link de acesso ao banco de dados online]
- **Acesso:** [Informar as permissões de acesso disponibilizadas ao professor]
- **Tabela principal:** [Informar o nome da tabela responsável pelos dados do perfil do usuário]

### c) Link do GitHub (Repositório)

- **Repositório:** [https://github.com/angeldanylo35-ux/librando00.git](https://github.com/angeldanylo35-ux/librando00.git)
- **Branch principal:** [Informar a branch principal do projeto]
- **Estrutura:** Conforme a organização de diretórios do projeto, incluindo documentação, código-fonte e arquivos do banco de dados.

## 📋 2. Atores e Descrição

### 📝 2.1 Descrição do Requisito

O requisito funcional **RF-007 — Perfil de Usuário** tem como objetivo permitir que usuários cadastrados no Librando visualizem e editem as informações básicas de seus próprios perfis. Essa funcionalidade busca oferecer autonomia aos usuários para manter seus dados atualizados e personalizar sua identificação dentro da rede social, contribuindo para uma experiência de uso mais acessível, inclusiva e organizada.

A funcionalidade de edição do perfil disponibiliza os campos **Nome**, **Nome de Usuário (@)**, **Localização** **Bio**, **Foto de Perfil** e **Foto de Capa**. O campo Nome é obrigatório e permite que o usuário informe seu nome de identificação. O campo Nome de Usuário (@) também é obrigatório e representa o identificador utilizado na plataforma, devendo ser único para evitar conflitos entre contas. Já o campo Bio é opcional e permite que o usuário apresente informações adicionais sobre si mesmo. O sistema deve validar os dados antes de salvar as alterações, impedindo o envio de informações obrigatórias vazias e a utilização de nomes de usuário já existentes.

Além das informações do perfil, o usuário deverá poder visualizar suas próprias publicações em uma seção específica do perfil. Em cada publicação de sua autoria, deverão ser disponibilizadas as opções de edição e exclusão, quando aplicáveis. Essas opções deverão utilizar as funcionalidades e regras estabelecidas no **RF-006 — Criação e Publicação de Postagens**, sem duplicar a implementação dessas operações no RF-007.

O perfil também deverá apresentar uma seção destinada à visualização das publicações repostadas pelo usuário. Essa seção permitirá consultar conteúdos originalmente publicados por outros usuários. A visualização ou o repost de uma publicação não concede permissão para editar ou excluir o conteúdo original de terceiros. Quando disponível, a opção de desfazer repost deverá remover somente o repost realizado pelo usuário, preservando a publicação original.

Após o envio das alterações do perfil, o sistema deverá verificar os dados informados, aplicar as regras de validação e persistir as informações válidas no banco de dados. ✅ Quando a operação for concluída com sucesso, o perfil deverá apresentar os dados atualizados. Caso alguma informação seja inválida ou ocorra uma falha durante o processamento, o sistema deverá informar o usuário de maneira clara, preservando os dados anteriormente armazenados e permitindo a correção dos campos necessários. ⚠️ As seções de publicações próprias e repostadas também deverão refletir as alterações realizadas com sucesso nas respectivas funcionalidades.

### 🎯 2.2 Benefícios para o Negócio

- 👤 **Personalização da experiência:** permite que os usuários mantenham seus perfis atualizados e expressem sua identidade na plataforma.
- 🔎 **Melhoria na identificação dos usuários:** nomes de usuário únicos facilitam a distinção entre contas e reduzem ambiguidades.
- 🤝 **Maior engajamento:** perfis personalizados podem incentivar a participação e fortalecer as interações entre os membros da comunidade.
- 🛡️ **Integridade das informações:** as validações evitam o armazenamento de dados obrigatórios incompletos ou identificadores duplicados.
- ♿ **Fortalecimento da acessibilidade:** uma interface organizada, com campos claros e mensagens compreensíveis, contribui para uma experiência mais inclusiva.
- 💾 **Confiabilidade dos dados:** a persistência correta das alterações garante que as informações atualizadas permaneçam disponíveis nas consultas posteriores.
- 📝 **Organização das publicações:** permite que o usuário consulte as próprias publicações diretamente no perfil e acesse as opções de gerenciamento correspondentes.
- 🔁 **Consulta de publicações repostadas:** facilita o acesso aos conteúdos de outros usuários que foram repostados.
- 🔐 **Proteção das publicações:** garante que as opções de edição e exclusão sejam utilizadas conforme a autoria e as permissões estabelecidas no RF-006.

### 👥 2.3 Atores

#### 👤 1. Usuário Cadastrado

- **🎭 Papel:** visualizar e atualizar as informações do próprio perfil, consultar suas publicações e visualizar os posts repostados.
- **🔐 Permissões:** consultar e editar os dados permitidos de sua própria conta, além de acessar as opções de edição e exclusão de suas publicações conforme o RF-006.
- **🖥️ Acesso:** página de perfil, formulário de edição, seção de publicações próprias e seção de publicações repostadas.
- **🚫 Restrições:** não poderá modificar perfis de outros usuários, editar ou excluir publicações de terceiros, nem excluir a própria conta por meio deste requisito.

##### 📊 Permissões CRUD — Usuário Cadastrado

| Operação      | Permissão | Descrição                                                                                                                                                                                                                   |
| ------------- | :-------: | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 🟢 **Create** |     ❌     | Não se aplica. A criação da conta pertence ao RF-002 — Cadastro de Usuários. A criação de publicações pertence ao RF-006.                                                                                                   |
| 🔵 **Read**   |     ✅     | Pode visualizar as informações do próprio perfil, suas publicações e os posts repostados.                                                                                                                                   |
| 🟡 **Update** |     ✅     | Pode editar o próprio Nome, Nome de Usuário (@), Bio, Foto de Perfil, Foto da Capa e Localização. Para editar publicações próprias, utiliza a opção correspondente prevista no RF-006.                                      |
| 🔴 **Delete** |     ❌     | A exclusão da conta não faz parte do escopo deste requisito. A exclusão de publicações próprias é disponibilizada por meio das funcionalidades definidas no RF-006, não sendo implementada de forma independente no RF-007. |

#### ⚙️ 2. Sistema Librando

- **🎭 Papel:** processar as solicitações de consulta e atualização do perfil, validar as informações e garantir que as alterações sejam armazenadas corretamente. Também deverá disponibilizar as publicações próprias e repostadas para visualização.
- **🛡️ Responsabilidade:** verificar a autenticação, aplicar as regras de negócio, identificar a autoria das publicações e impedir operações não autorizadas.
- **💾 Acesso:** serviços internos da aplicação, mecanismos de validação, camada de persistência de dados e funcionalidades de publicações relacionadas ao RF-006.
- **🚫 Restrições:** não deverá permitir alterações que violem as permissões definidas ou as regras de integridade, nem permitir que a visualização ou o repost de uma publicação conceda autorização para modificar o conteúdo original de terceiros.

##### 📊 Permissões CRUD — Sistema Librando

| Operação      | Permissão | Descrição                                                                                                                                                                                                                                  |
| ------------- | :-------: | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| 🟢 **Create** |     ❌     | Não se aplica à edição do perfil; a criação da conta é tratada pelo RF-002 e a criação de publicações pelo RF-006.                                                                                                                         |
| 🔵 **Read**   |     ✅     | Recupera os dados necessários para exibir o perfil autorizado, as publicações próprias e os posts repostados.                                                                                                                              |
| 🟡 **Update** |     ✅     | Processa e persiste as alterações válidas solicitadas pelo usuário autorizado. As solicitações de edição de publicações seguem o mecanismo definido no RF-006.                                                                             |
| 🔴 **Delete** |     ❌     | A exclusão do perfil não faz parte deste requisito. A exclusão de publicações é processada conforme o RF-006. A remoção de um repost, quando disponível, deverá remover somente a associação do repost, preservando a publicação original. |

### ✅ 2.4 Validações Necessárias

1. 🔐 **Autenticação obrigatória:** somente usuários autenticados poderão acessar e editar seus próprios perfis.
2. ✍️ **Nome obrigatório:** o campo não poderá estar vazio ou conter apenas espaços em branco.
3. 🏷️ **Nome de Usuário (@) obrigatório:** o identificador deverá ser informado e não poderá conter apenas espaços em branco.
4. 🔎 **Unicidade do nome de usuário:** o sistema deverá impedir que dois usuários diferentes utilizem o mesmo identificador, desconsiderando o próprio registro durante a edição.
5. 🔤 **Formato do nome de usuário:** o identificador deverá respeitar o padrão de caracteres definido para a plataforma.
6. 💬 **Bio opcional:** o campo poderá permanecer vazio sem impedir a atualização do perfil.
7. 📏 **Limite de caracteres:** os campos deverão respeitar os limites definidos na implementação e no modelo do banco de dados.
8. 🛡️ **Proteção contra alterações não autorizadas:** o sistema deverá verificar se o perfil pertence ao usuário autenticado, impedindo a edição de perfis de terceiros sem autorização.
9. 💾 **Persistência dos dados:** as alterações somente deverão ser consideradas concluídas após a confirmação de que foram armazenadas corretamente.
10. ⚠️ **Tratamento de erros:** em caso de dados inválidos, identificador duplicado ou falha na persistência, o sistema deverá apresentar uma mensagem clara e permitir uma nova tentativa.
11. 🔒 **Proteção dos dados:** a atualização do perfil não deverá alterar indevidamente informações internas ou sensíveis da conta que não pertençam ao escopo deste requisito.
12. ♿ **Acessibilidade da interface:** os campos, mensagens de erro e confirmações deverão ser apresentados de maneira clara e compreensível, considerando as necessidades dos usuários do Librando.
13. 📝 **Consulta de publicações próprias:** o sistema deverá apresentar as publicações de autoria do usuário na seção correspondente do perfil.
14. ✏️ **Opções de gerenciamento:** as opções de edição e exclusão deverão ser disponibilizadas nas publicações próprias conforme as regras e funcionalidades do RF-006.
15. 🔁 **Consulta de reposts:** o sistema deverá apresentar as publicações repostadas pelo usuário em uma seção específica, distinguindo-as das publicações de sua própria autoria.
16. 🚫 **Proteção de publicações de terceiros:** o sistema deverá impedir a edição ou exclusão de publicações de outros usuários por meio das opções disponibilizadas no perfil.
17. ↩️ **Remoção de repost:** quando disponível, a operação deverá remover somente a associação do repost do usuário autenticado, sem excluir ou modificar a publicação original.

## 🔄 3. Casos de Uso e Requisitos Não Funcionais

### 📌 3.1 Identificação do Caso de Uso

| Campo                        | Descrição                                                                                                                                                                                                                                |
| ---------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 🆔 **ID**                    | UC-007                                                                                                                                                                                                                                   |
| 📋 **Requisito relacionado** | RF-007 — Perfil de Usuário                                                                                                                                                                                                               |
| 👤 **Ator principal**        | Usuário Cadastrado                                                                                                                                                                                                                       |
| ⚙️ **Ator secundário**       | Sistema Librando                                                                                                                                                                                                                         |
| 🎯 **Objetivo**              | Permitir que o usuário visualize e atualize as informações do próprio perfil, incluindo nome, nome de usuário, biografia, localização, foto de perfil e foto de capa, além de consultar suas publicações próprias e os posts repostados. |
| 🔗 **Relacionamento**        | Funcionalidade de visualização e edição do perfil da rede social Librando, integrada ao RF-006 — Criação e Publicação de Postagens para as opções de gerenciamento de publicações próprias.                                              |

### 🔐 3.2 Pré-condições

- O usuário deve possuir uma conta cadastrada no Librando.
- O usuário deve estar autenticado na plataforma.
- O sistema deve estar disponível para receber solicitações.
- O perfil do usuário deve existir no banco de dados.
- O usuário deve possuir acesso à página de perfil e à funcionalidade de edição.
- Para visualizar as publicações próprias e repostadas, deverão existir dados associados ao usuário ou o sistema deverá apresentar uma mensagem adequada quando não houver publicações.
- As opções de edição e exclusão de publicações deverão respeitar as funcionalidades e regras estabelecidas no RF-006.

### 🚀 3.3 Fluxo Principal

1. 👤 O usuário acessa sua conta no Librando.
2. 🖥️ O sistema apresenta a interface principal da plataforma.
3. 🔎 O usuário acessa a página do próprio perfil.
4. 📄 O sistema recupera e exibe as informações atuais do perfil, incluindo nome, nome de usuário, biografia, foto de perfil e foto de capa, localização.
5. ✏️ O usuário seleciona a opção de editar perfil.
6. 📝 O sistema apresenta o formulário de edição preenchido com os dados atuais.
7. ⌨️ O usuário altera os campos desejados, podendo modificar o nome, o nome de usuário, a biografia, localização e as imagens do perfil.
8. 💾 O usuário solicita o salvamento das alterações.
9. 🛡️ O sistema verifica a autenticação do usuário e valida os dados informados, incluindo a obrigatoriedade dos campos Nome e Nome de Usuário (@).
10. 🔎 O sistema verifica se o nome de usuário informado está disponível, desconsiderando o próprio registro do usuário.
11. 🖼️ Caso sejam enviadas novas imagens, o sistema valida os arquivos conforme os formatos e limites permitidos.
12. 💾 O sistema persiste as alterações válidas no banco de dados e atualiza as referências das imagens, conforme a arquitetura utilizada.
13. ✅ O sistema confirma que as alterações foram salvas com sucesso.
14. 👁️ O sistema apresenta o perfil atualizado com as novas informações e imagens.
15. 📝 O usuário acessa a seção de publicações próprias em seu perfil.
16. 📄 O sistema recupera e exibe as publicações criadas pelo usuário, apresentando uma mensagem adequada caso não existam publicações.
17. 🔘 O sistema disponibiliza, em cada publicação própria, as opções de edição e exclusão previstas no RF-006.
18. ✏️ Caso deseje editar uma publicação, o usuário seleciona a opção de edição disponibilizada no próprio post.
19. 🛡️ O sistema encaminha a solicitação para a funcionalidade correspondente do RF-006, que deverá validar a autoria e a autorização para editar a publicação.
20. 💾 Após a conclusão da edição pelo mecanismo do RF-006, o sistema atualiza a publicação apresentada no perfil.
21. 🗑️ Caso deseje excluir uma publicação própria, o usuário seleciona a opção de exclusão disponibilizada no próprio post.
22. ⚠️ O sistema responsável pelo RF-006 solicita a confirmação e processa a exclusão conforme as regras estabelecidas para a funcionalidade.
23. 🔄 Após a conclusão da exclusão, o sistema atualiza a seção de publicações próprias.
24. 🔁 O usuário acessa a seção de publicações repostadas.
25. 📄 O sistema recupera e apresenta os posts repostados pelo usuário, distinguindo-os das publicações de sua própria autoria.
26. ↩️ Caso a funcionalidade esteja disponível, o usuário seleciona a opção de desfazer um repost.
27. 🛡️ O sistema verifica se o repost está associado ao usuário autenticado.
28. 💾 O sistema remove a associação do repost, preservando a publicação original de outro usuário.
29. ✅ O sistema atualiza a seção de reposts e apresenta o resultado da operação.

### 🔀 3.4 Fluxos Alternativos

#### ⚠️ FA-01 — Campos Obrigatórios Não Preenchidos

1. O usuário tenta salvar o perfil sem preencher o campo Nome ou Nome de Usuário (@).
2. O sistema identifica o campo obrigatório vazio ou preenchido apenas com espaços em branco.
3. O sistema apresenta uma mensagem informando quais campos precisam ser corrigidos.
4. O usuário preenche os campos obrigatórios.
5. O fluxo retorna à etapa de validação do fluxo principal.

**Resultado:** as alterações não são concluídas até que os campos obrigatórios sejam válidos.

#### 🏷️ FA-02 — Nome de Usuário Já Existente

1. O usuário informa um nome de usuário que já pertence a outra conta.
2. O sistema verifica a existência de outro registro com o mesmo identificador.
3. O sistema informa que o nome de usuário está indisponível.
4. O usuário informa um identificador diferente.
5. O sistema realiza novamente a validação de unicidade.

**Resultado:** o perfil somente poderá ser atualizado quando o nome de usuário atender às regras definidas.

#### 🖼️ FA-03 — Imagem Inválida ou Acima do Limite Permitido

1. O usuário seleciona uma foto de perfil ou de capa.
2. O sistema verifica o formato e o tamanho do arquivo.
3. O sistema identifica que a imagem não atende aos critérios permitidos.
4. O sistema informa o motivo da rejeição e solicita a seleção de outro arquivo.
5. O usuário seleciona uma imagem válida.

**Resultado:** a imagem inválida não deverá substituir a imagem atualmente associada ao perfil.

#### 🌐 FA-04 — Falha ao Salvar as Alterações

1. O usuário solicita o salvamento do perfil.
2. O sistema inicia o processamento das alterações.
3. Ocorre uma falha de comunicação, processamento ou persistência dos dados.
4. O sistema informa que não foi possível concluir a operação.
5. O usuário poderá tentar salvar novamente após a normalização do serviço.

**Resultado:** o sistema não deverá informar sucesso sem confirmar a conclusão da operação. As informações anteriores deverão ser preservadas sempre que possível, evitando atualizações parciais inconsistentes.

#### 🔒 FA-05 — Sessão Expirada ou Acesso Não Autorizado

1. O usuário tenta acessar ou atualizar o perfil.
2. O sistema verifica a validade da sessão e a autorização da solicitação.
3. O sistema identifica que a sessão expirou ou que o usuário não possui autorização para modificar o perfil solicitado.
4. O sistema bloqueia a operação e informa a necessidade de autenticação, quando aplicável.
5. O usuário poderá autenticar-se novamente e acessar o próprio perfil.

**Resultado:** nenhuma alteração não autorizada deverá ser realizada.

#### 📝 FA-06 — Usuário Sem Publicações Próprias

1. O usuário acessa a seção de publicações próprias.
2. O sistema consulta as publicações associadas ao usuário.
3. O sistema identifica que não existem publicações próprias para apresentar.
4. O sistema exibe uma mensagem informando que o usuário ainda não possui publicações.

**Resultado:** o perfil continua acessível e o sistema não apresenta erro apenas pela ausência de publicações.

#### ✏️ FA-07 — Tentativa de Editar Publicação de Outro Usuário

1. O usuário tenta acessar a edição de uma publicação que não criou.
2. O sistema verifica a autoria da publicação.
3. O sistema identifica que o post pertence a outra conta.
4. O sistema bloqueia a operação e informa que a edição não está autorizada.

**Resultado:** a publicação original permanece inalterada. A visualização ou o repost não concede permissão de edição.

#### 🗑️ FA-08 — Exclusão de Publicação Própria

1. O usuário seleciona a opção de excluir uma publicação própria.
2. O sistema responsável pelo RF-006 solicita a confirmação da exclusão.
3. O usuário confirma a operação.
4. O sistema verifica a autoria e processa a solicitação conforme as regras do RF-006.
5. O sistema atualiza a lista de publicações do perfil e apresenta uma confirmação.

**Resultado:** a publicação é excluída conforme as regras implementadas no RF-006.

**Alternativa:** caso o usuário cancele a confirmação, a publicação deverá permanecer disponível.

#### 🔁 FA-09 — Usuário Sem Publicações Repostadas

1. O usuário acessa a seção de publicações repostadas.
2. O sistema consulta os reposts associados à conta.
3. O sistema identifica que não existem publicações repostadas.
4. O sistema exibe uma mensagem informando que não há reposts para apresentar.

**Resultado:** a seção permanece acessível e apresenta corretamente o estado vazio.

#### ↩️ FA-10 — Falha ao Desfazer Repost

1. O usuário solicita a remoção de um repost.
2. O sistema verifica se a associação do repost pertence ao usuário autenticado.
3. Ocorre uma falha durante o processamento da solicitação.
4. O sistema informa que não foi possível concluir a operação.

**Resultado:** o sistema não deverá confirmar a remoção sem concluir a operação. A publicação original deverá permanecer preservada.

### 🏁 3.5 Pós-condições

- ✅ As informações válidas do perfil são atualizadas e persistidas.
- 👤 O perfil permanece associado à conta correta.
- 🏷️ O nome de usuário continua respeitando a regra de unicidade.
- 🖼️ As novas fotos de perfil e de capa ficam associadas ao perfil após o processamento bem-sucedido.
- 🔎 As informações atualizadas ficam disponíveis para consultas posteriores.
- 🛡️ Nenhuma alteração não autorizada é realizada.
- ⚠️ Em caso de falha, o sistema informa o problema e não apresenta a operação como concluída com sucesso.
- 📝 As publicações próprias ficam disponíveis para consulta na seção correspondente do perfil.
- ✏️ As opções de edição e exclusão são disponibilizadas nas publicações próprias conforme o RF-006.
- 🔄 As publicações editadas ou excluídas refletem o resultado da operação após o processamento pelo RF-006.
- 🔁 As publicações repostadas ficam disponíveis para consulta em uma seção específica do perfil.
- ↩️ Ao desfazer um repost, somente a associação do repost é removida, preservando a publicação original de terceiros.
- 🚫 O usuário não consegue editar ou excluir publicações de terceiros por meio das opções do perfil.

---

### ⚙️ 3.6 Requisitos Não Funcionais

| ID | Requisito | Descrição |
|---|---|---|
| ⚡ **RNF-01** | **Desempenho** | O carregamento das informações do perfil e o processamento de atualizações comuns deverão ocorrer em até 2 segundos em condições normais de operação, desconsiderando o tempo necessário para transferir arquivos de imagem grandes ou a ocorrência de problemas externos de rede. |
| 📱 **RNF-02** | **Responsividade** | A interface de perfil e o formulário de edição deverão adaptar-se a dispositivos móveis, tablets e computadores, mantendo os campos e controles acessíveis em diferentes resoluções. |
| 🌐 **RNF-03** | **Compatibilidade** | A funcionalidade deverá ser compatível com versões atuais dos principais navegadores, incluindo Google Chrome, Mozilla Firefox, Microsoft Edge e Safari. |
| ♿ **RNF-04** | **Acessibilidade** | Os campos, botões, mensagens de erro e confirmações deverão possuir identificação clara, contraste adequado e navegação acessível por teclado, considerando as necessidades de acessibilidade do público do Librando. |
| 🔒 **RNF-05** | **Segurança** | As operações de consulta e atualização deverão verificar autenticação e autorização, proteger os dados transmitidos e validar os arquivos enviados para reduzir riscos de acesso indevido e envio de conteúdo malicioso. |
| 💾 **RNF-06** | **Integridade e confiabilidade** | O sistema deverá garantir a consistência das informações do perfil, evitando que falhas durante uma atualização produzam dados incompletos ou inconsistentes. |
| 🖼️ **RNF-07** | **Processamento de imagens** | O sistema deverá processar as imagens de perfil e de capa dentro dos limites de tamanho e formatos estabelecidos, evitando o consumo excessivo de recursos. |
| 📝 **RNF-08** | **Consulta de publicações** | A seção de publicações próprias deverá apresentar os posts associados ao usuário correto, mantendo um tempo de resposta adequado em condições normais de operação. |
| 🔁 **RNF-09** | **Consulta de reposts** | A seção de publicações repostadas deverá distinguir os conteúdos repostados das publicações de autoria do usuário e preservar a identificação do autor original. |
| 🛡️ **RNF-10** | **Autorização de publicações** | As opções de edição e exclusão deverão respeitar a autoria e as permissões definidas no RF-006, com validação realizada no processamento da solicitação. |
| 💾 **RNF-11** | **Integridade dos reposts** | A remoção de um repost deverá preservar a publicação original e os dados associados a outros usuários. |

---

### 📏 3.7 Regras de Negócio

| ID | Regra de Negócio | Descrição |
|---|---|---|
| **RN-01** | Autenticação | Somente usuários autenticados poderão acessar a funcionalidade de edição do perfil. |
| **RN-02** | Propriedade do perfil | Cada usuário poderá editar apenas as informações associadas à própria conta, salvo se existir uma autorização administrativa específica definida em outro requisito. |
| **RN-03** | Nome obrigatório | O campo Nome deverá ser preenchido e não poderá conter apenas espaços em branco. |
| **RN-04** | Nome de Usuário obrigatório | O campo Nome de Usuário (@) deverá ser preenchido antes do salvamento. |
| **RN-05** | Unicidade do identificador | Cada nome de usuário deverá ser único conforme as regras de comparação adotadas pelo sistema. Durante a edição, o usuário poderá manter o próprio identificador atual. |
| **RN-06** | Biografia opcional | O campo Bio poderá permanecer vazio, desde que respeite os limites de tamanho e as regras de conteúdo definidas pela plataforma. |
| **RN-07** | Alteração de imagens | O usuário poderá alterar a foto de perfil e a foto de capa de maneira independente, sem ser obrigado a modificar os demais campos. |
| **RN-08** | Formatos permitidos | As imagens deverão utilizar formatos autorizados pela plataforma, como JPEG, PNG ou WebP, desde que esses formatos sejam efetivamente suportados pela implementação. |
| **RN-09** | Limite de tamanho | Os arquivos de imagem deverão respeitar o limite máximo definido para o envio e armazenamento. |
| **RN-10** | Confirmação de salvamento | O sistema somente deverá confirmar o sucesso da atualização depois que as alterações tiverem sido persistidas corretamente. |
| **RN-11** | Tratamento de falhas | Se uma atualização falhar, o sistema deverá informar o usuário e evitar que imagens ou informações anteriores sejam substituídas por dados inválidos. |
| **RN-12** | Proteção de dados | O usuário não poderá alterar, por meio do formulário de perfil, identificadores internos, permissões, credenciais ou outras informações que não pertençam ao escopo do RF-007. |
| **RN-13** | Atualização independente | A alteração de nome, nome de usuário, biografia, foto de perfil ou foto de capa não deverá exigir a modificação dos demais campos. |
| **RN-14** | Persistência das imagens | Após a confirmação do salvamento, as imagens atualizadas deverão permanecer disponíveis e associadas ao perfil, conforme a solução de armazenamento adotada pelo projeto. |
| **RN-15** | Exibição de publicações próprias | O perfil deverá apresentar as publicações criadas pelo usuário autenticado em uma seção própria. |
| **RN-16** | Integração com o RF-006 | As operações de criação, edição e exclusão de publicações deverão seguir as regras e os mecanismos definidos no RF-006, sem duplicação de sua implementação no RF-007. |
| **RN-17** | Edição por autoria | O usuário poderá editar somente as publicações de sua autoria, respeitando as regras de autorização do RF-006. |
| **RN-18** | Exclusão por autoria | O usuário poderá solicitar a exclusão de suas próprias publicações por meio da opção disponibilizada no post, conforme as regras do RF-006. A exclusão da conta não pertence ao RF-007. |
| **RN-19** | Exibição de reposts | O perfil deverá apresentar em seção específica os posts repostados pelo usuário, distinguindo-os das publicações próprias. |
| **RN-20** | Remoção de repost | Quando a funcionalidade estiver disponível, o usuário poderá desfazer um repost realizado por ele, removendo somente a associação do repost e preservando a publicação original. |
| **RN-21** | Proteção de publicações de terceiros | Visualizar ou repostar uma publicação não concede ao usuário permissão para editar ou excluir o conteúdo original de outro autor. |
| **RN-22** | Atualização das seções | Após a conclusão de uma operação de edição, exclusão ou remoção de repost, o sistema deverá atualizar a seção correspondente para refletir o estado atual dos dados. |
