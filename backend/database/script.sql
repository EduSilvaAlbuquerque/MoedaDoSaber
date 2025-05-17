create database moeda_do_saber

use moeda_do_saber

CREATE TABLE dbo.pessoa
(
    id            int           NOT NULL IDENTITY (1,1) PRIMARY KEY,
    nome          nvarchar(100) NOT NULL,
    data_cadastro datetime      NOT NULL,
    email         nvarchar(100) NULL,
    senha         nvarchar(100) NULL,
    fone          nvarchar(20)  NULL
)

CREATE TABLE dbo.professor
(
    id              int           NOT NULL IDENTITY (1,1) PRIMARY KEY,
    id_pessoa       int           NOT NULL,
    nome            nvarchar(100) NULL,
    cpf             nvarchar(20)  NULL,
    data_nascimento date          NULL,
    CONSTRAINT FK_professor_pessoa FOREIGN KEY (id_pessoa) REFERENCES dbo.pessoa (id)
)

CREATE TABLE dbo.plano_aula
(
    id                   int           NOT NULL IDENTITY (1,1) PRIMARY KEY,
    id_professor         int           NOT NULL,
    titulo               nvarchar(100) NULL,
    objetivo             nvarchar(250) NULL,
    metodologia          nvarchar(250) NULL,
	conteudo			 nvarchar(250) NULL,
    recursos_necessarios nvarchar(250) NULL,
    criterios_avaliacao  nvarchar(250) NULL,
    inicio_cronograma    date          NULL,
    fim_cronograma       date          NULL,
    CONSTRAINT FK_plano_aula_professor FOREIGN KEY (id_professor) REFERENCES dbo.professor (id),
)

CREATE TABLE personal_access_tokens
(
    id             INT IDENTITY (1,1) PRIMARY KEY,
    tokenable_id   INT,
    tokenable_type NVARCHAR(255),
    name           NVARCHAR(255),
    token          NVARCHAR(64) UNIQUE,
    abilities      NVARCHAR(MAX),
    last_used_at   DATETIME,
    expires_at     DATETIME,
    created_at     DATETIME DEFAULT GETDATE(),
    updated_at     DATETIME DEFAULT GETDATE()
);
