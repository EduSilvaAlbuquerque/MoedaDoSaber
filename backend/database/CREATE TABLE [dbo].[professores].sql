USE [dbo.moeda_do_saber]
GO

/****** Object:  Table [dbo].[professores]    Script Date: 08/05/2025 08:02:51 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[professores](
	[ID] [int] NOT NULL,
	[Disciplina] [nvarchar](100) NOT NULL,
	[Turma] [nvarchar](50) NOT NULL,
	[DataNascimento] [date] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[professores]  WITH CHECK ADD FOREIGN KEY([ID])
REFERENCES [dbo].[pessoa] ([ID])
GO


