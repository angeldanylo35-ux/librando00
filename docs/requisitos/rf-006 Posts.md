# 📝 RF-006: CRIAÇÃO E PUBLICAÇÃO DE POSTAGENS



---



## 1. METADADOS DO PROJETO E DA EQUIPE


* **NOME_DO_PROJETO:** Librando

* **DESCRICAO_BREVE:**
Sistema web desenvolvido para a plataforma Librando, uma rede social voltada à comunidade surda. Nesta etapa do projeto, foram desenvolvidas as telas de recuperação e redefinição de senha, permitindo que os usuários solicitem a recuperação de acesso e definam uma nova senha de forma segura. Foram utilizadas as tecnologias Laravel, Vue.js, Vite, Axios, PHP e MySQL.



### 1.2 Localização dos Artefatos

**LINK_REPOSITORIO_GITHUB:** https://github.com/angeldanylo35-ux/librando00

**BRANCH_PRINCIPAL:** main

**LINK_APLICACAO_DEPLOY:** Não disponível no momento.

**LINK_BANCO_DADOS:** Banco de dados utilizado no projeto, com acesso a definir conforme a configuração do ambiente.

**LINK_DEMONSTRAÇÃO:** Não disponível no momento.

**Comentário:** O projeto Librando está disponível no GitHub para consulta do código-fonte. Os links da aplicação em produção, do banco de dados e da demonstração serão informados quando estiverem configurados.

### 1.3 Escopo Fixo

REQUISITOS_FUNCIONAIS_TOTAIS: 10 Requisitos Funcionais (N = 10)

VALOR_TOTAL_DISCIPLINA: 100%

VALOR_POR_REQUISITO: 10% (100% ÷ 10)

CADA REQUISITO TEM UM DOCUMENTO ÚNICO


### 1.4 Composição da Equipe

|  ID | Nome Completo                 | Papel Primário          | Papel Secundário | E-mail / Contato                                                                                                                                    |
| :-: | :---------------------------- | :---------------------- | :--------------- | :-------------------------------------------------------------------------------------------------------------------------------------------------- |
|  1  | [André Mendes]                | Scrum Master            | Fullstack        | [[andre53774636@edu.df.senac.br](mailto:andre53774636@edu.df.senac.br)]                                                                             |
|  2  | [Eduardo Amorim]                     | Desenvolvedor Front-End | —                | [[eduardo59381426@edu.df.senac.br](mailto:eduardo59381426@edu.df.senac.br)]                                                                         |
|  3  | [Gabriel Souza / Vitor Silva] | Desenvolvedor Back-End  | —                | [[gabriel49414966@edu.df.senac.br](mailto:gabriel49414966@edu.df.senac.br) / [vitor59422706@edu.df.senac.br](mailto:vitor59422706@edu.df.senac.br)] |
|  4  | [Henrique Alves]              | DBA / Banco de Dados    | —                | [[henrique51782196@edu.df.senac.br](mailto:henrique51782196@edu.df.senac.br)]                                                                       |
|  5  | [Angel Pacheco]               | QA / SecDevOps          | —                | [[angel59381406@edu.df.senac.br](mailto:angel59381406@edu.df.senac.br)]                                                                             |
|  6  | [Angel Pacheco]               | Fullstack (opcional)    | —                | [[angel59381406@edu.df.senac.br](mailto:angel59381406@edu.df.senac.br)]                                                                             |
---

# 2. ESTRUTURA DE DIRETÓRIOS DO PROJETO

```text
librando00-main/
│
├── README.md
│
├── docs/
│   ├── api/
│   │   └── swagger.json
│   │
│   └── requisitos/
│       ├── rf-001-login.md
│       ├── rf-002-cadastrar.md
│       ├── rf-003-Esqueci-minha-senha.md
│       ├── rf-004-Tela-Inicial-Uuário.md
│       └── rf-006 Posts.md
│
├── backend/
│   ├── app/
│   │   ├── Http/
│   │   │   └── Controllers/
│   │   │       ├── Controller.php
│   │   │       ├── api/
│   │   │       │   ├── AuthController.php
│   │   │       │   ├── PasswordResetController.php
│   │   │       │   └── PostController.php
│   │   │       └── auth/
│   │   │           └── PasswordResetController.php
│   │   │
│   │   ├── Mail/
│   │   │   ├── RecuperacaoSenha.php
│   │   │   └── VerificacaoCadastro.php
│   │   │
│   │   ├── Models/
│   │   │   ├── CadastroPendente.php
│   │   │   ├── PasswordResetCode.php
│   │   │   ├── Post.php
│   │   │   ├── RecuperacaoSenha.php
│   │   │   ├── User.php
│   │   │   ├── Usuario.php
│   │   │   ├── VerificacaoEmail.php
│   │   │   └── enqueteopcao.php
│   │   │
│   │   ├── Notifications/
│   │   │   ├── PasswordChangedNotification.php
│   │   │   └── ResetCodeNotification.php
│   │   │
│   │   └── Providers/
│   │       └── AppServiceProvider.php
│   │
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   │   ├── factories/
│   │   │   └── UserFactory.php
│   │   │
│   │   ├── migrations/
│   │   │   ├── 0001_01_01_000000_create_users_table.php
│   │   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   │   ├── 2025_01_01_000000_create_password_reset_codes_table.php
│   │   │   ├── 2026_09_06_021505_create_usuarios_table.php
│   │   │   ├── 2026_09_06_024645_create_personal_access_tokens_table.php
│   │   │   ├── 2026_09_13_145553_create_verificacoes_email_table.php
│   │   │   ├── 2026_09_13_150557_create_cadastros_pendentes_table.php
│   │   │   ├── 2026_09_13_205428_create_recuperacao_senhas_table.php
│   │   │   ├── 2026_10_12_020211_create_posts_table.php
│   │   │   ├── 2026_10_12_020212_create_enquete_opcoes_table.php
│   │   │   └── migrations/
│   │   │       └── (cópias de migrations)
│   │   │
│   │   └── seeders/
│   │       ├── DatabaseSeeder.php
│   │       └── UsuarioSeeder.php
│   │
│   ├── resources/
│   │   ├── css/
│   │   │   └── app.css
│   │   ├── js/
│   │   │   └── app.js
│   │   └── views/
│   │       ├── auth/
│   │       │   ├── forgot-password.blade.php
│   │       │   ├── reset-password.blade.php
│   │       │   └── verify-code.blade.php
│   │       ├── emails/
│   │       │   ├── recuperacao-senha.blade.php
│   │       │   └── verificacao-cadastro.blade.php
│   │       └── welcome.blade.php
│   │
│   ├── routes/
│   │   ├── api.php
│   │   ├── console.php
│   │   └── web.php
│   │
│   ├── tests/
│   │   ├── Feature/
│   │   │   └── ExampleTest.php
│   │   ├── Unit/
│   │   │   └── ExampleTest.php
│   │   └── TestCase.php
│   │
│   ├── public/
│   ├── storage/
│   ├── artisan
│   ├── composer.json
│   ├── composer.lock
│   ├── package.json
│   ├── phpunit.xml
│   └── vite.config.js
│
└── frontend/
    ├── .vscode/
    │   └── extensions.json
    │
    ├── public/
    │   ├── favicon.svg
    │   └── icons.svg
    │
    ├── src/
    │   ├── assets/
    │   │   ├── estetico.css
    │   │   ├── hero.png
    │   │   ├── vite.svg
    │   │   └── vue.svg
    │   │
    │   ├── components/
    │   │   └── HelloWorld.vue
    │   │
    │   ├── paginas/
    │   │   ├── Feed.vue
    │   │   ├── cadastro.vue
    │   │   ├── esqueci-senha.vue
    │   │   ├── login.vue
    │   │   ├── redefinir-senha.vue
    │   │   └── verificar-email.vue
    │   │
    │   ├── router/
    │   │   └── index.js
    │   │
    │   ├── services/
    │   │   └── api.js
    │   │
    │   ├── App.vue
    │   ├── main.js
    │   └── style.css
    │
    ├── index.html
    ├── package.json
    ├── package-lock.json
    ├── postcss.config.js
    ├── tailwind.config.js
    ├── vite.config.js
    └── README.md
```

## Localização dos Arquivos

- **Documentação dos requisitos:** `docs/requisitos/`
- **Documentação da API:** `docs/api/swagger.json`
- **Login:** `frontend/src/paginas/login.vue`
- **Cadastro:** `frontend/src/paginas/cadastro.vue`
- **Verificação de e-mail:** `frontend/src/paginas/verificar-email.vue`
- **Recuperação de senha:** `frontend/src/paginas/esqueci-senha.vue` e `frontend/src/paginas/redefinir-senha.vue`
- **Feed de publicações:** `frontend/src/paginas/Feed.vue`
- **Estilos da aplicação:** `frontend/src/assets/estetico.css` e `frontend/src/style.css`
- **Rotas do front-end:** `frontend/src/router/index.js`
- **Comunicação com a API:** `frontend/src/services/api.js`
- **Controlador de autenticação:** `backend/app/Http/Controllers/api/AuthController.php`
- **Controlador de publicações:** `backend/app/Http/Controllers/api/PostController.php`
- **Controlador de recuperação de senha:** `backend/app/Http/Controllers/api/PasswordResetController.php`
- **Modelos do banco de dados:** `backend/app/Models/`
- **Migrações do banco de dados:** `backend/database/migrations/`
- **Dados iniciais:** `backend/database/seeders/`
- **Rotas da API:** `backend/routes/api.php`
- **Testes:** `backend/tests/`
- **Guia geral:** `README.md`

**Aplicação funcional:** o front-end está em `frontend/` e o back-end em `backend/`. A publicação e a integração com o banco de dados dependem da configuração do ambiente de execução.




---

## 🎯 1. IDENTIFICAÇÃO DO REQUISITO 



### 🎯 Objetivo



Identificar claramente o requisito responsável pela criação e publicação de postagens na plataforma Librando, apresentando seu tipo, prioridade, complexidade e situação atual.

### 📋 Identificação do Requisito

| 🔢 | 🏷️ Informação | 📄 Descrição |
|---:|---|---|
| 1️⃣ | 🆔 **ID** | RF-006 |
| 2️⃣ | 📝 **Título** | Criação e Publicação de Postagens |
| 3️⃣ | ⚙️ **Tipo** | Requisito Funcional |
| 4️⃣ | 🚨 **Prioridade** | ALTA |
| 5️⃣ | 📊 **Complexidade** | MÉDIA/ALTA (estimado 8 Story Points) |
| 6️⃣ | 🔄 **Status** | EM DESENVOLVIMENTO |
| 7️⃣ | 📅 **Data de Criação** | 07/10/2026 |
| 8️⃣ | 🔄 **Última Atualização** | 13/10/2026 |

### 📌 Breve Descrição



O sistema deve permitir que usuários cadastrados criem e publiquem conteúdos na rede social Librando, utilizando diferentes formatos de mídia, como **texto, imagens, GIFs e vídeos de até 50 MB por arquivo**. 📝🖼️🎞️🎥📊



A funcionalidade deve priorizar a **comunicação visual** e proporcionar uma experiência simples e acessível para a comunidade surda, de acordo com a proposta da plataforma. 🤟♿



O usuário poderá criar uma publicação, selecionar o tipo de conteúdo, publicar ou cancelar a operação. 👤📱



---



## 📋 2. DESCRIÇÃO E ATORES



### 🎯 Objetivo



Descrever claramente o requisito de criação e publicação de postagens, apresentando seu objetivo dentro da plataforma Librando, seus benefícios e todos os atores envolvidos na execução da funcionalidade. 👥



### 📝 Descrição Detalhada



O requisito existe para permitir que os usuários cadastrados da plataforma Librando possam criar e compartilhar conteúdos com a comunidade. 🌐



A funcionalidade permitirá a criação de diferentes tipos de publicações, possibilitando que o usuário escolha o formato mais adequado para transmitir sua informação. 📝🖼️🎥



Entre os principais benefícios estão:



🤟 **Facilitar a comunicação visual** entre os usuários da plataforma.
2. 📱 **Permitir o compartilhamento de diferentes formatos de conteúdo**, como textos, imagens, GIFs e vídeos.

3. 💬 **Estimular a interação e participação da comunidade** dentro da rede social.

4. 📰 **Centralizar os conteúdos produzidos pelos usuários** no feed da plataforma.

5. ♿ **Contribuir para a proposta de acessibilidade da Librando**, priorizando recursos adequados à comunidade surda.



### 🌐 Contexto do Negócio



A Librando é uma rede social voltada para a **comunidade surda e para a acessibilidade**, tendo como foco a comunicação visual e a interação entre seus usuários. 🤟♿



Nesse contexto, a criação e publicação de postagens é uma funcionalidade essencial para permitir que os usuários compartilhem informações, opiniões, mídias e outros conteúdos com os demais participantes da plataforma. 💬🖼️🎥



A funcionalidade deve proporcionar uma experiência **simples, acessível e adequada à proposta da rede social**. 💻📱



### 👥 Atores do Sistema



#### 1. 👤 USUÁRIO CADASTRADO — Ator Principal



**🎭 Papel:**  

Utilizar a funcionalidade de criação e publicação de postagens.



**📌 Responsabilidade:**  

Criar o conteúdo, selecionar o formato da publicação, inserir as informações necessárias, visualizar a publicação antes do envio e confirmar ou cancelar sua publicação.



**🔐 Permissões CRUD:**




| 🔧 Operação | Permissão | 📌 Descrição |
|---|:---:|---|
| **CREATE** | ✅ | Criar novas publicações. |
| **READ** | ✅ | Visualizar publicações disponíveis no feed. |
| **UPDATE** | ❌ | Não contemplado neste requisito. |
| **DELETE** | ❌ | Não contemplado neste requisito. |



---



#### 2. ⚙️ SISTEMA — Ator Automático



**🎭 Papel:**  

Processar e controlar automaticamente o fluxo de criação e publicação das postagens.



**📌 Responsabilidade:**

🔎 Validar os dados enviados pelo usuário.

📁 Processar os arquivos enviados.

✔️ Verificar os dados necessários para a publicação.

💾 Registrar a publicação.

📰 Disponibilizar o conteúdo no feed após a publicação.

⚠️ Informar o usuário sobre erros ou problemas durante o processo.

**🔐 Permissões CRUD:**


| 🔧 Operação | Permissão | 📌 Descrição |
|---|:---:|---|
| **CREATE** | ❌ | Não aplicável a ações automáticas do sistema neste requisito. |
| **READ** | ✅ | Consultar os dados necessários para processar e exibir as publicações. |
| **UPDATE** | ✅ | Atualizar o estado interno da publicação durante o processamento, quando necessário. |
| **DELETE** | ✅ | Descartar registros incompletos ou temporários gerados durante o processamento, quando necessário. |



# 🔄 3. ESPECIFICAÇÃO DE CASOS DE USO + REQUISITOS NÃO-FUNCIONAIS 



### 🎯 Objetivo



Descrever detalhadamente como o requisito de **criação e publicação de postagens** é executado na plataforma Librando, apresentando suas pré-condições, pós-condições, fluxo principal, fluxos alternativos, regras de negócio e requisitos não-funcionais.



---



## 📱 Caso de Uso (UC-006): Criar e Publicar Postagem



### 🔐 Pré-Condições



✅ Usuário cadastrado na plataforma.

✅ Usuário autenticado no sistema.

✅ Usuário possui acesso à funcionalidade de criação de postagem.

✅ Sistema disponível para receber e processar a publicação.

✅ Serviço de armazenamento disponível para arquivos de mídia, quando necessário.


---



### ✅ Pós-Condições (Sucesso)



✅ Publicação registrada no sistema.

✅ Conteúdo associado ao usuário responsável pela publicação.

✅ Publicação disponibilizada no feed.

✅ Arquivos de mídia armazenados corretamente, quando utilizados.

✅ Usuário recebe confirmação visual de que a publicação foi realizada.


---



### ❌ Pós-Condições (Falha)



❌ Publicação não é registrada no sistema.

❌ Conteúdo incompleto não é disponibilizado no feed.

⚠️ Usuário recebe uma mensagem informando o erro ocorrido.

🔄 Usuário pode corrigir os dados ou tentar realizar a publicação novamente.


---



## 🔄 Fluxo Principal



1. 👤 Usuário acessa a funcionalidade **"Criar Publicação"**.

2. 🖥️ Sistema exibe a interface de criação de postagem.

3. 📝 Usuário seleciona o tipo de conteúdo que deseja publicar.

4. ✍️ Usuário insere o conteúdo da publicação.

5. 📎 Usuário adiciona arquivos de mídia, caso necessário.

6. 🔎 Sistema valida os dados inseridos pelo usuário.

7. 👤 Usuário verifica o conteúdo da publicação.

8. 📤 Usuário seleciona a opção **"Publicar"**.

9. 🔎 Sistema realiza novamente a validação dos dados antes de concluir a publicação.

10. 📁 Sistema processa os arquivos de mídia enviados, quando existentes.

11. 💾 Sistema registra a publicação.

12. 📰 Sistema disponibiliza a publicação no feed.

13. ✅ Sistema exibe a mensagem **"Publicação realizada com sucesso!"**.

14. 👤 Usuário visualiza sua publicação no feed.

---



## ⚠️ Fluxos Alternativos



### 🔴 Fluxo Alternativo A1: Conteúdo obrigatório não preenchido



**4a.1.** Sistema identifica que o conteúdo obrigatório não foi preenchido.  

**4a.2.** Sistema impede a publicação.  

**4a.3.** Sistema exibe uma mensagem informando que o conteúdo é obrigatório.  

**4a.4.** Campo necessário é destacado para o usuário.  

**4a.5.** Usuário preenche o conteúdo necessário.  

**4a.6.** Sistema realiza novamente a validação.



---



### 📁 Fluxo Alternativo A2: Arquivo de mídia inválido



**5a.1.** Usuário seleciona um arquivo para adicionar à publicação.  

**5a.2.** Sistema verifica o arquivo enviado.  

**5a.3.** Sistema identifica que o arquivo não atende aos requisitos permitidos.  

**5a.4.** Sistema impede a utilização do arquivo na publicação.  

**5a.5.** Sistema exibe uma mensagem informando que o arquivo é inválido.  

**5a.6.** Usuário pode selecionar outro arquivo ou continuar sem a mídia.



---



### 🌐 Fluxo Alternativo A3: Falha durante a publicação



**9a.1.** Usuário confirma a publicação.  

**9a.2.** Sistema tenta processar e registrar a publicação.  

**9a.3.** Sistema identifica uma falha durante o processamento.  

**9a.4.** Sistema impede que a publicação incompleta seja disponibilizada no feed.  

**9a.5.** Sistema exibe a mensagem **"Não foi possível realizar a publicação. Tente novamente."**  

**9a.6.** Usuário pode tentar realizar a publicação novamente.



---



## 📋 Regras de Negócio (RN)


| 🆔 ID | 📌 Regra | 📝 Descrição |
|---|---|---|
| **RN-01** | Usuário Autenticado | Somente usuários cadastrados e autenticados podem criar e publicar postagens. |
| **RN-02** | Conteúdo Obrigatório | A publicação deve possuir conteúdo válido antes de ser publicada. |
| **RN-03** | Tipos de Conteúdo | O sistema deve permitir publicações nos formatos definidos pela plataforma: texto, imagem, GIF, vídeo e enquete. |
| **RN-04** | Validação de Mídia | Arquivos enviados devem ser validados antes de serem associados à publicação. |
| **RN-05** | Publicação no Feed | A publicação somente deve ser disponibilizada no feed após a conclusão do processo de publicação. |
| **RN-06** | Cancelamento | O usuário pode cancelar a criação da publicação antes de confirmá-la. |
| **RN-07** | Dados da Publicação | A publicação deve ser associada ao usuário responsável por sua criação. |
| **RN-08** | Conteúdo Incompleto | O sistema não deve disponibilizar no feed uma publicação que não tenha sido concluída corretamente. |



---



## ⚙️ Requisitos Não-Funcionais (RNF)


| 🆔 ID | 🏷️ Atributo | 📋 Requisito | 📏 Métrica | 💡 Justificativa |
|---|---|---|---|---|
| **RNF-01** | ⚡ Performance | A interface de criação de postagem deve apresentar as ações do usuário de forma rápida e responsiva. | Resposta das ações principais em até **2 segundos**, em condições normais de uso. | 🧑‍💻 Proporcionar uma experiência fluida durante a criação da publicação. |
| **RNF-02** | ♿ Acessibilidade | A funcionalidade deve possuir uma interface acessível e adequada à proposta da Librando. | Elementos da interface devem possuir identificação visual clara e permitir a utilização dos recursos de criação. | 🤟 Facilitar a utilização da plataforma pela comunidade surda. |
| **RNF-03** | 🔒 Segurança | O sistema deve permitir a criação de publicações somente por usuários autenticados. | **100%** das tentativas de publicação devem passar por validação de autenticação. | 🛡️ Impedir que usuários não autorizados publiquem conteúdos. |
| **RNF-04** | 📱 Usabilidade | A interface de criação deve apresentar os tipos de publicação e ações disponíveis de forma clara. | Usuário deve conseguir identificar as principais ações sem necessidade de conhecimento técnico. | 👍 Facilitar o uso da funcionalidade. |
| **RNF-05** | 🌐 Disponibilidade | A funcionalidade deve estar disponível enquanto o sistema estiver em funcionamento. | Disponibilidade mínima de **99%** em produção. | 🔄 Garantir que os usuários possam criar e publicar conteúdos de forma consistente. |

---

## 🎨 4. PROTÓTIPO FUNCIONAL

### 4.1 Estrutura de Arquivos Entregáveis

* **Frontend Vue:** `frontend/src/paginas/Feed.vue`
* **Backend Laravel:** `backend/app/Http/Controllers/api/PostController.php`
* **Banco de Dados (DDL):** `backend/database/migrations/2026_10_12_020211_create_posts_table.php`
* **Deploy/Aplicação:** Executado localmente via XAMPP / Vite (`http://localhost:5173/feed`)

---

### 4.2 Código-Fonte do Componente Frontend (`Feed.vue`)

```html
<template>
  <div class="max-w-2xl mx-auto p-4 bg-white rounded-lg shadow-md mt-6">
    <!-- Bloco de Criação de Postagem -->
    <form @submit.prevent="criarPostagem">
      <div class="flex items-start space-x-3">
        <div class="w-10 h-10 rounded-full bg-gray-800 text-white flex items-center justify-center font-bold">
          AD
        </div>
        <div class="flex-1">
          <textarea 
            v-model="conteudo"
            rows="3"
            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400"
            placeholder="O que quer compartilhar em Libras ou texto?"
            required
          ></textarea>
          <div v-if="erroValidacao" class="text-red-500 text-xs mt-1">O conteúdo da postagem não pode estar vazio.</div>
        </div>
      </div>

      <div class="border-t border-gray-200 my-3 pt-3 flex justify-between items-center">
        <div class="flex space-x-4">
          <label class="cursor-pointer text-gray-600 hover:text-indigo-600 flex items-center space-x-1 text-sm font-medium">
            <span>📷 Vídeo / Imagem</span>
            <input type="file" @change="tratarArquivo" class="hidden" accept="image/*,video/*">
          </label>
          <button type="button" class="text-gray-600 hover:text-indigo-600 text-sm font-medium">
            📊 Enquete
          </button>
        </div>

        <button 
          type="submit" 
          :disabled="carregando"
          class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 transition disabled:opacity-50"
        >
          {{ carregando ? 'Publicando...' : 'Publicar' }}
        </button>
      </div>
    </form>

    <div v-if="sucessoMensagem" class="mt-3 p-2 bg-green-100 text-green-700 text-sm rounded">
      ✓ Publicação realizada com sucesso!
    </div>
  </div>
</template>

<script>
import api from '@/services/api.js';

export default {
  data() {
    return {
      conteudo: '',
      arquivo: null,
      carregando: false,
      erroValidacao: false,
      sucessoMensagem: false
    };
  },
  methods: {
    tratarArquivo(event) {
      this.arquivo = event.target.files[0];
    },
    async criarPostagem() {
      if (!this.conteudo.trim()) {
        this.erroValidacao = true;
        return;
      }
      this.erroValidacao = false;
      this.carregando = true;

      try {
        const formData = new FormData();
        formData.append('conteudo', this.conteudo);
        if (this.arquivo) formData.append('arquivo', this.arquivo);

        const response = await api.post('/posts', formData);
        
        if (response.status === 201) {
          this.sucessoMensagem = true;
          this.conteudo = '';
          this.arquivo = null;
          setTimeout(() => { this.sucessoMensagem = false; }, 3000);
        }
      } catch (error) {
        alert('Erro ao realizar a postagem. Tente novamente.');
      } finally {
        this.carregando = false;
      }
    }
  }
};
</script>

```

---

### 4.3 Script DDL do Banco de Dados (`create_posts_table.php`)

```sql
-- ============================================================================
-- RF-006: Script DDL para criação da tabela de postagens no MySQL
-- ============================================================================

CREATE TABLE IF NOT EXISTS posts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario_id BIGINT UNSIGNED NOT NULL,
    conteudo TEXT NOT NULL,
    tipo_midia VARCHAR(50) NULL,
    arquivo_url VARCHAR(255) NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'ATIVO',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT fk_posts_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Índices de performance
CREATE INDEX idx_posts_usuario_id ON posts(usuario_id);
CREATE INDEX idx_posts_created_at ON posts(created_at);

```

---

### 4.4 Comprovium de Telas e Estados (Mockups Textuais)

**1. Estado Vazio (Inicial):**

```text
┌─────────────────────────────────────────────────────────────┐
│ (AD) O que quer compartilhar em Libras ou texto?            │
│ ─────────────────────────────────────────────────────────── │
│ [📷 Vídeo / Imagem]                                         │
│ ┌───────────┐                                               │
│ │ Publicar  │                                               │
│ └───────────┘                                               │
└─────────────────────────────────────────────────────────────┘

```

**2. Estado Preenchido / Sucesso:**

```text
┌─────────────────────────────────────────────────────────────┐
│ (AD) Olá pessoal! Vejam este sinal em Libras!          ✅   │
│ ─────────────────────────────────────────────────────────── │
│ [📷 video_sinal.mp4    ✅]                                 │
│ ✓ Publicação realizada com sucesso!                         │
└─────────────────────────────────────────────────────────────┘

```

**3. Estado de Erro (Conteúdo Vazio):**

```text
┌─────────────────────────────────────────────────────────────┐
│ (AD)                                                     ❌ │
│ O conteúdo da postagem não pode estar vazio.                │
└─────────────────────────────────────────────────────────────┘

```

---

## 🏗️ 5. ARQUITETURA E ADR

### Diagrama de Componentes

```text
┌──────────────────────────────────────┐
│       Frontend (SPA / Vite)          │
│ Vue.js 3 + Tailwind CSS              │
│ • Feed.vue (Painel de Postagens)     │
│ • api.js (Axios HTTP Client)         │
│ • Hospedado localmente (Vite Server) │
└──────────────────┬───────────────────┘
                   │ HTTPS / CORS + Bearer Token
                   ▼
┌──────────────────────────────────────┐
│        API REST Backend (Laravel)    │
│ PHP 8.2 + Laravel 12                 │
│ • POST /api/posts (criação de post)  │
│ • GET /api/posts (listagem do feed)  │
│ • Middleware de Autenticação (Sanctum│
│ • Validação de Dados e Mídia         │
│ • Hospedado localmente (XAMPP / PHP) │
└──────────────────┬───────────────────┘
                   │ Transação ACID (Eloquent ORM)
                   ▼
┌──────────────────────────────────────┐
│           Banco de Dados             │
│                MySQL                 │
│ • Tabela: `posts`                    │
│ • Tabela: `usuarios`                 │
│ • Chaves Estrangeiras (FK)           │
│ • Índices (usuario_id, created_at)   │
└──────────────────────────────────────┘

```

---

### Architecture Decision Records (ADRs)

#### ADR-001: MySQL como Banco de Dados Relacional

* **Status:** ACEITO
* **Contexto:** Os dados das postagens e sua associação com os usuários requerem integridade referencial rigorosa e suporte a consultas relacionais eficientes para a construção do feed.
* **Decisão:** Utilizar o MySQL gerenciado pelo Eloquent ORM do Laravel.
* **Alternativas:** MongoDB (menos estruturado para relações diretas de feed), PostgreSQL (igualmente viável, mas o MySQL já padroniza o ecossistema do projeto).
* **Consequências:** ✅ Excelente integração com o Laravel via Migrations e Eloquent, ✅ Suporte a transações e chaves estrangeiras, ⚠️ Requer manutenção de índices para performance no feed.

#### ADR-002: Vue.js 3 com Arquitetura de Componentes para o Feed

* **Status:** ACEITO
* **Contexto:** A criação de postagens exige interatividade dinâmica em tempo real (como pré-visualização de mídia e atualização instantânea do feed).
* **Decisão:** Adotar Vue.js 3 com Single File Components (`Feed.vue`) e estilização utilitária via Tailwind CSS.
* **Alternativas:** Blade templates tradicionais do Laravel (menor interatividade dinâmica), React (curva de adaptação da equipe).
* **Consequências:** ✅ Experiência de usuário fluida e reativa, ✅ Organização modular do código frontend, ⚠️ Necessidade de build via Vite.

#### ADR-003: Validação Dual (Frontend Vue + Backend Laravel)

* **Status:** ACEITO
* **Contexto:** Garantir a consistência dos dados de texto e o bloqueio de arquivos maliciosos ou fora do formato permitido tanto na interface quanto na API.
* **Decisão:** Implementar validações visuais no componente Vue e validações rígidas de regras de negócio no `PostController` do Laravel.
* **Alternativas:** Validar apenas no backend (gera atraso na resposta de erro para o usuário) ou apenas no frontend (inseguro contra requisições diretas).
* **Consequências:** ✅ Segurança robusta e feedback visual imediato para a comunidade surda, ✅ Prevenção contra dados corrompidos no banco, ⚠️ Duplicação lógica de regras de validação.

#### ADR-004: Upload e Armazenamento Controlado de Mídias

* **Status:** ACEITO
* **Contexto:** O requisito prevê o suporte a diferentes formatos visuais (imagens, GIFs e vídeos), essenciais para a comunicação da comunidade surda.
* **Decisão:** Processar os arquivos enviados via requisição `FormData` com Axios, armazenando-os de forma segura no servidor backend e registrando o caminho na tabela de posts.
* **Alternativas:** Armazenar imagens em formato Base64 diretamente no banco de dados (inviável por impactar a performance e estourar o limite de tamanho das colunas).
* **Consequências:** ✅ Alta performance do banco de dados salvando apenas caminhos/URLs, ✅ Suporte eficiente a arquivos multimídia, ⚠️ Necessidade de gerenciar diretórios públicos de armazenamento no servidor.

---

### Tecnologias Escolhidas

| Camada | Tecnologia | Versão | Justificativa |
| --- | --- | --- | --- |
| **Frontend** | Vue.js | 3.x | Reatividade e componentização moderna |
| **Estilização** | Tailwind CSS | 3.x | Agilidade na criação de layouts responsivos |
| **Comunicação** | Axios | 1.x | Requisições HTTP assíncronas padronizadas |
| **Backend** | PHP / Laravel | 8.2 / 12 | Produtividade, segurança e robustez de API REST |
| **Banco de Dados** | MySQL | 8.0+ | Confiabilidade, suporte relacional e transacional |
| **Build Tool** | Vite | 5.x | Empacotamento rápido e otimizado para desenvolvimento |

---

## 🔒 6. VALIDAÇÃO DE SEGURANÇA OWASP

### A01: Broken Access Control

* **Vulnerabilidade:** Usuários não autenticados tentarem criar, editar ou publicar conteúdos diretamente via requisições à API sem validação de sessão.
* **Implementação:**
Utilização de Middlewares de autenticação no Laravel (`auth:sanctum`) para proteger as rotas de postagem:
```php
// backend/routes/api.php
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/posts', [PostController::class, 'store']);
});

```


* **Teste:**
```bash
# Sem token de autenticação → Retorna HTTP 401 Unauthorized
curl -X POST http://localhost:8000/api/posts -d "conteudo=Teste"

# Com token válido → Retorna HTTP 201 Created
curl -X POST http://localhost:8000/api/posts \
  -H "Authorization: Bearer SEU_TOKEN_VALIDO" \
  -d "conteudo=Olá comunidade surda!"

```



---

### A03: Injection (SQL Injection)

* **Vulnerabilidade:** Injeção de comandos SQL maliciosos através do campo de texto ou arquivos enviados na criação da postagem.
* **Implementação:**
O Laravel protege nativamente contra SQL Injection utilizando o Eloquent ORM e o Query Builder, que empregam *Prepared Statements* por padrão:
```php
// ❌ NUNCA FAÇA ISSO (Concatenação direta):
// DB::raw("SELECT * FROM posts WHERE conteudo = '" . $request->conteudo . "'");

// ✅ SEMPRE FAÇA ISSO (Eloquent ORM / Prepared Statements):
$post = Post::create([
    'usuario_id' => $request->user()->id,
    'conteudo' => $request->input('conteudo'),
    'tipo_midia' => $request->input('tipo_midia')
]);

```


* **Teste:**
```javascript
// Tentativa de injetar SQL malicioso no conteúdo
const payload = "Post de teste'; DROP TABLE posts; --";
// Resultado: O banco de dados trata o payload inteiramente como uma string literal, preservando a integridade das tabelas.

```



---

### A05: Broken Authentication

* **Vulnerabilidade:** Sessões de usuários comprometidas ou tokens de acesso previsíveis que permitam falsificação de identidade ao publicar conteúdos.
* **Implementação:**
Emissão de tokens seguros utilizando o Laravel Sanctum com criptografia robusta e validação rigorosa de credenciais com Hash (`Bcrypt`):
```php
// Verificação de autenticidade da sessão/token na API de posts
public function store(Request $request) {
    $user = $request->user(); // Garante que o usuário autenticado é recuperado com segurança
    if (!$user) {
        return response()->json(['error' => 'Acesso negado'], 403);
    }
    // Prossegue com a criação do post...
}

```


* **Teste:**
```bash
# Testar envio com token adulterado/expirado
curl -X POST http://localhost:8000/api/posts \
  -H "Authorization: Bearer token_falso_123"
# Resultado esperado: HTTP 401 Unauthorized / Token inválido.

```



---

### A07: Cross-Site Scripting (XSS)

* **Vulnerabilidade:** Injeção de scripts maliciosos em JavaScript (`<script>alert('XSS')</script>`) dentro do campo de texto das postagens, executando códigos no navegador de outros usuários ao carregarem o feed.
* **Implementação:**
O framework Front-end Vue.js realiza o escape automático de dados ao utilizar a interpolação padrão (`{{ }}`), impedindo a execução direta de scripts HTML/JS injetados:
```html
<!-- ✅ SEGURO: O Vue.js converte tags HTML em texto puro automaticamente -->
<p>{{ post.conteudo }}</p>

<!-- ❌ EVITAR v-html com dados não sanitizados de usuários -->
<!-- <div v-html="post.conteudo"></div> -->

```


* **Teste:**
```html
<!-- Entrada inserida pelo usuário malicioso -->
<script>alert('XSS Attack');</script>

<!-- Resultado na tela do Feed: O Vue renderiza de forma segura como texto plano na página, exibindo a string na tela sem disparar o script de alerta. -->

```
