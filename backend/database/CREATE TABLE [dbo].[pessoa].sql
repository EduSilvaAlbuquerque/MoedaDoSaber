USE [dbo.moeda_do_saber]
GO

/****** Object:  Table [dbo].[pessoa]    Script Date: 08/05/2025 08:01:41 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[pessoa](
	[ID] [int] NOT NULL,
	[Nome] [nvarchar](100) NOT NULL,
	[Matricula] [nvarchar](50) NOT NULL,
	[DataCadastro] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO


