USE [dbo.moeda_do_saber]
GO

INSERT INTO [dbo].[professores]
           ([ID]
           ,[Disciplina]
           ,[Turma]
           ,[DataNascimento])
     VALUES
           (<ID, int,>
           ,<Disciplina, nvarchar(100),>
           ,<Turma, nvarchar(50),>
           ,<DataNascimento, date,>)
GO

