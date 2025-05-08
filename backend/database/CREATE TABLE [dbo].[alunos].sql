USE [dbo.moeda_do_saber]
GO

/****** Object:  Table [dbo].[alunos]    Script Date: 08/05/2025 07:55:54 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[alunos](
	[ID] [int] NOT NULL,
	[Nome] [nvarchar](100) NULL,
	[Matricula] [nvarchar](50) NULL,
	[DataCadastro] [date] NULL,
	[CPF] [nvarchar](20) NULL,
	[DataNascimento] [date] NULL,
	[Turma] [nvarchar](10) NULL,
PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO