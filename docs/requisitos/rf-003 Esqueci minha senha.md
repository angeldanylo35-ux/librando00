# 📝 RF-003 — Esqueci minha senha

# 1. METADADOS DO PROJETO E DA EQUIPE

## 1.1 Composição da Equipe

|  ID | Nome Completo                 | Papel Primário          | Papel Secundário | E-mail / Contato                                                                                                                                    |
| :-: | :---------------------------- | :---------------------- | :--------------- | :-------------------------------------------------------------------------------------------------------------------------------------------------- |
|  1  | [André Mendes]                | Scrum Master            | Fullstack        | [[andre53774636@edu.df.senac.br](mailto:andre53774636@edu.df.senac.br)]                                                                             |
|  2  | [Eduardo Amorim]                     | Desenvolvedor Front-End | —                | [[eduardo59381426@edu.df.senac.br](mailto:eduardo59381426@edu.df.senac.br)]                                                                         |
|  3  | [Gabriel Souza / Vitor Silva] | Desenvolvedor Back-End  | —                | [[gabriel49414966@edu.df.senac.br](mailto:gabriel49414966@edu.df.senac.br) / [vitor59422706@edu.df.senac.br](mailto:vitor59422706@edu.df.senac.br)] |
|  4  | [Henrique Alves]              | DBA / Banco de Dados    | —                | [[henrique51782196@edu.df.senac.br](mailto:henrique51782196@edu.df.senac.br)]                                                                       |
|  5  | [Angel Pacheco]               | QA / SecDevOps          | —                | [[angel59381406@edu.df.senac.br](mailto:angel59381406@edu.df.senac.br)]                                                                             |
|  6  | [Angel Pacheco]               | Fullstack (opcional)    | —                | [[angel59381406@edu.df.senac.br](mailto:angel59381406@edu.df.senac.br)]                                                                             |

## 1.2 Identificação

* **NOME_DO_PROJETO:** Librando

* **DESCRICAO_BREVE:**
  Sistema web desenvolvido para a plataforma Librando, uma rede social voltada à comunidade surda. Nesta etapa do projeto, foi desenvolvida a tela de login com autenticação de usuários utilizando HTML, CSS, PHP e MySQL.

## 1.3 Localização dos Artefatos

* **LINK_REPOSITORIO_GITHUB:** `(https://github.com/angeldanylo35-ux/librando00/)`
* **BRANCH_PRINCIPAL:** `main`
* **LINK_APLICACAO_DEPLOY:** Aplicação executada localmente por meio do XAMPP.
* **LINK_BANCO_DADOS:** Banco de dados MySQL local.
* **LINK_API_SWAGGER:** Não se aplica nesta etapa do projeto.
* **LINK_DEMONSTRAÇÃO:** Aplicação executada localmente em `[(http://localhost:5173/cadastro)]`

---

## 🔎 1. Identificação do Requisito

| 📌 Campo | 📄 Informação |
|---|---|
| **🆔 ID** | RF-003 |
| **📋 Título** | Recuperação e Redefinição de Senha |
| **📂 Tipo** | Requisito Funcional |
| **🚨 Prioridade** | ALTA |
| **⚙️ Complexidade** | ALTA |
| **📊 Status** | EM DESENVOLVIMENTO |
| **📅 Data de Criação** | 10/09/2026 |
| **🔄 Última Atualização** | 10/09/2026 |

### 📖 Descrição

O sistema deve permitir que usuários cadastrados recuperem e redefinam sua senha por meio da opção **"Esqueci minha senha"**, disponível na tela de login.

Ao selecionar essa opção, o usuário deverá ser direcionado para uma tela na qual deverá informar o e-mail cadastrado. O sistema deverá validar o e-mail informado e, caso seja válido, encaminhar um código de recuperação para o endereço de e-mail cadastrado.

Após receber o código, o usuário deverá informá-lo em uma segunda tela para que o sistema realize a validação. Caso o código esteja correto, o usuário poderá cadastrar uma nova senha e confirmar a senha informada.

O sistema deverá verificar se as senhas são iguais antes de concluir a alteração. Quando o processo for realizado com sucesso, deverá apresentar uma confirmação visual, como **"Senha redefinida com sucesso!"**, e direcionar o usuário para a tela principal da plataforma.

Caso ocorra algum problema durante o processo, o sistema deverá apresentar mensagens de erro claras ao usuário, como **"Código inexistente"**, **"Senhas não coincidem"** ou mensagens correspondentes à situação encontrada.

---
