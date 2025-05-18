# Moeda do $aber

## Acesse nosso projeto no Figma [AQUI](https://www.figma.com/design/jNSQsr5dvKEtLoyroQcsGW/Moeda-do-Saber?node-id=0-1&t=T8CuNvRCV9i2Nl0Y-1)

## Contribuições da Equipe

- **GABRIEL MATSUZAKI** – Banco de Dados em SQL Server;  
- **KAIO HENRIQUE POSTAL DE ALMEIDA** – API em PHP com Laravel e configuração do Docker;  
- **RHAYSSAM HAMZE VITTI** – Telas, Design, UX UI, Figma, Readme;
- **EDUARDO MENDES ALBUQUERQUE** e **DAYANE CRISTINE MIRANDA DE MEIRELES** – Front-End com HTML5 e CSS3;
- **DAYANE CRISTINE MIRANDA DE MEIRELES** - Trabalho escrito;
- **RODRIGO HENRIQUE CORDEIRO** – Team Lead, consumir os Endpoints no Front-End com JavaScript e revisão técnica.

## Telas

### 1 - Tela de Login
![Tela de Login](frontend/Figma/1-Login.png)

### 2 - Tela de Registro
![Tela de Registro](frontend/Figma/2-CriarConta.png)

### 3 - Tela de Gerenciamento (Sem Dados)
![Tela de Gerenciamento](frontend/Figma/3-Gerenciamento.png)

### 4 - Tela de Criação de Plano de Aula
![Tela de Criação de Plano de Aula](frontend/Figma/4-CriarPlanoDeAula.png)

### 5 - Tela de Gerenciamento (Com Dados)
![Tela de Gerenciamento](frontend/Figma/5-Gerenciamento.png)

## Tecnologias
- Banco de Dados: **SQL Server**
- Back-End: **PHP com Laravel**
- Front-End: **HTML5, CSS3 e JavaScript**
- Docker: **container para Servidor Web, PHP e Banco de Dados.**

## Vídeo mostrando funcionamento do projeto

https://github.com/user-attachments/assets/b5255a15-2b68-47ec-914c-00be04a345d2

## Como executar o projeto
1. Subir os containeres no Docker com o comando: "**docker compose up -d**"
2. Iniciar a API em PHP com Laravel usando o comando: "**docker exec -it faculdade_php bash**"
   - Instalar dependencias: `composer install`  
   - Em seguida, copiar o arquivo `.env.example` para o `.env` e alterar as configurações de banco para conectar ao seu SQL.
   - Gerar as chaves do artisan:  `php artisan key:generate`  
3. No SQL Server executar o script **backend\database\script.sql**
4. No VS Code, instalar o **LiverServer** e ativar seu funcionamento para acessar a tela inicial com o login.
