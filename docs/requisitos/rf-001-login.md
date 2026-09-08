# RF-001 — Autenticação de Usuário

## 1. Identificação

**ID:** RF-001  
**Título:** Autenticação de Usuário  
**Tipo:** Requisito Funcional  
**Prioridade:** Alta  

## 2. Descrição

O sistema deve permitir que usuários previamente cadastrados realizem
login utilizando e-mail e senha.

## 3. Atores

- Usuário cadastrado

## 4. Pré-condições

- O usuário deve estar previamente cadastrado no sistema.
- O usuário deve possuir e-mail e senha válidos.

## 5. Fluxo Principal

1. O usuário acessa a página de login.
2. O sistema apresenta os campos de e-mail e senha.
3. O usuário informa seu e-mail.
4. O usuário informa sua senha.
5. O usuário seleciona a opção "Entrar".
6. O sistema consulta o usuário pelo e-mail informado.
7. O sistema verifica a senha informada.
8. Caso as credenciais sejam válidas, o sistema informa que o login foi efetuado com sucesso.

## 6. Fluxos Alternativos

### 6.1 — E-mail ou senha inválidos

1. O usuário informa credenciais incorretas.
2. O sistema não realiza a autenticação.
3. O sistema apresenta a mensagem:
   **"E-mail ou senha inválidos."**

### 6.2 — Campos não preenchidos

1. O usuário tenta realizar o login sem preencher um dos campos.
2. O sistema informa que todos os campos devem ser preenchidos.

## 7. Regras de Negócio

- O e-mail deve corresponder a um usuário cadastrado.
- A senha deve ser verificada utilizando o hash armazenado no banco de dados.
- A senha não deve ser armazenada em texto puro.
- O sistema não deve informar se apenas o e-mail ou apenas a senha está incorreto.

## 8. Critérios de Aceitação

- [ ] O usuário consegue informar seu e-mail.
- [ ] O usuário consegue informar sua senha.
- [ ] O sistema consulta o usuário no banco de dados.
- [ ] O sistema verifica a senha utilizando seu hash.
- [ ] Com credenciais válidas, deve ser exibida a mensagem "Login efetuado com sucesso!".
- [ ] Com credenciais inválidas, deve ser exibida a mensagem "E-mail ou senha inválidos.".
- [ ] O sistema não deve armazenar senhas em texto puro.

## 9. Tecnologias

- Front-end: HTML e CSS
- Back-end: PHP
- Banco de dados: MySQL
