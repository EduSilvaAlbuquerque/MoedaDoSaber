USE [dbo.moeda_do_saber]
GO

/****** Object:  Table [dbo].[pessoa_juridica]    Script Date: 08/05/2025 08:02:30 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[pessoa_juridica](
	[ID] [int] NOT NULL,
	[Nome] [nvarchar](100) NULL,
	[Matricula] [nvarchar](50) NULL,
	[DataCadastro] [date] NULL,
	[NomeRazaoSocial] [nvarchar](100) NULL,
	[CNPJ] [nvarchar](20) NULL,
	[DataAbertura] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO


